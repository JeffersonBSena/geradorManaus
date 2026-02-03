<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Document extends Model
{
    use HasFactory;

    protected $fillable = [
        'type',
        'number',
        'date',
        'customer_name',
        'customer_identifier',
        'object',
        'subtotal',
        'discount',
        'total',
        'user_id',
    ];

    public function items()
    {
        return $this->hasMany(DocumentItem::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
