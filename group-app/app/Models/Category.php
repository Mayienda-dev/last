<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Category extends Model
{
    use HasFactory;

    protected $table = 'categories';

    protected $primaryKey = 'id';

    protected $fillable = [
        'rent',
        'hire',
        'price',
        'duration',
        'seller_id',
        'property_id'
    
    ];

    public function property(): BelongsTo
    {
        return $this->belongsTo(Property::class);
    }

    public function tags(): BelongsToMany
    {
        return $this->belongsToMany(Tags::class)
            ->using(CategoryTags::class)
            ->withTimeStamps();
    }
}
