<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasManyThrough;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Property extends Model
{
    use HasFactory;

    protected $primarykey = 'id';

    protected $fillable = [
        'name',
        'county',
        'size',
        'description',
        'image_path',
        'user_id',
        'seller_id'
        
    ];

    public function seller(): BelongsTo
    {
        return $this->belongsTo(Seller::class);
    }

    public function propertyCategory(): HasOne
    {
        return $this->hasOne(Category::class);
    }

    public function location(): HasOne
    {
        return $this->hasOne(Location::class);
    }

    public function status(): HasOne
    {
        return $this->hasOne(Status::class);
    }

    public function tags(): HasManyThrough
    {
        return $this->hasManyThrough(
            Tags::class,
            Category::class,
           
            'property_id',
            'category_id',
            
        );
    }
}
