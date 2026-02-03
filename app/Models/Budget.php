<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Budget extends Model
{
    protected $guarded = [];

    protected $casts = [
        'valid_until' => 'date',
        'total_amount' => 'decimal:2',
    ];

    public function customer(): BelongsTo
    {
        return $this->belongsTo(Customer::class);
    }

    public function items(): HasMany
    {
        return $this->hasMany(BudgetItem::class);
    }

    public function getValidationTokenAttribute(): string
    {
        // Token format: B{ID}-{HASH} (e.g. B123-A1B2)
        // Hash length: 4 chars
        $hash = strtoupper(substr(md5($this->id . $this->created_at . 'MANAUS_SECRET'), 0, 4));
        return "B{$this->id}-{$hash}";
    }
}
