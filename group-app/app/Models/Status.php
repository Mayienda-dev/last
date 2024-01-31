<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Status extends Model
{
    use HasFactory;

    protected $fillable = ['property_id', 'status'];

    protected $attributes = [
        'status' => 'available'
    ];

    public function property(): BelongsTo
    {
        return $this->belongsTo(Property::class);
    }
}
