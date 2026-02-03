<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DocumentItem extends Model
{
    use HasFactory;

    protected $fillable = [
        'document_id',
        'description',
        'quantity',
        'unit_value',
        'total_value',
    ];

    public function document()
    {
        return $this->belongsTo(Document::class);
    }
}
