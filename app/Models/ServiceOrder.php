<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class ServiceOrder extends Model
{
    protected $guarded = [];

    protected $casts = [
        'opened_at' => 'datetime',
        'due_at' => 'datetime',
        'resolved_at' => 'datetime',
    ];

    public function customer(): BelongsTo
    {
        return $this->belongsTo(Customer::class);
    }

    public function sla(): BelongsTo
    {
        return $this->belongsTo(SLA::class);
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    protected static function booted()
    {
        static::creating(function ($serviceOrder) {
            if ($serviceOrder->sla_id && !$serviceOrder->due_at) {
                $sla = SLA::find($serviceOrder->sla_id);
                if ($sla) {
                    $serviceOrder->due_at = Carbon::now()->addHours($sla->resolution_time_hours);
                }
            }
        });
        
        static::updating(function ($serviceOrder) {
             if ($serviceOrder->sla_id && $serviceOrder->isDirty('sla_id')) {
                $sla = SLA::find($serviceOrder->sla_id);
                if ($sla) {
                    // Recalculate based on opened_at if SLA changes
                    $serviceOrder->due_at = $serviceOrder->opened_at->copy()->addHours($sla->resolution_time_hours);
                }
             }
        });
    }
}
