<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;


class Tags extends Model
{
    use HasFactory;
    protected $fillable = ['tags'];
    
    public function categories(): BelongsToMany
    {
        return $this->belongsToMany(Category::class)
            ->using(CategoryTags::class)
            ->withTimeStamps();
    }

    protected static $tags = ['commercial', 'agricultural', 'weddings', 'concert', 'team building'];

    public static function getTags()
    {
        return self::$tags;
    }

    public static function insertTagsFromArray()
    {
        foreach (self::$tags as $tagName) {
            self::create(['tags' => $tagName]);
        }
    }
}
