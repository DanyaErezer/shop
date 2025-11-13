<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'slug',
        'description',
        'price',
        'stock',
        'image',
        'gallery',
        'category',
        'features',
        'is_active'
    ];

    protected $casts = [
        'gallery' => 'array',
        'features' => 'array',
        'is_active' => 'boolean'
    ];

    // Автоматическое создание slug при сохранении
    protected static function boot()
    {
        parent::boot();

        static::creating(function ($product) {
            if (empty($product->slug)) {
                $product->slug = Str::slug($product->name);
            }
        });

        static::updating(function ($product) {
            if ($product->isDirty('name') && empty($product->getOriginal('slug'))) {
                $product->slug = Str::slug($product->name);
            }
        });
    }

    public function getGalleryAttribute($value)
    {
        return $value ? json_decode($value, true) : [];
    }

    public function setGalleryAttribute($value)
    {
        $this->attributes['gallery'] = json_encode($value);
    }

    public function getFeaturesAttribute($value)
    {
        return $value ? json_decode($value, true) : [];
    }

    public function setFeaturesAttribute($value)
    {
        $this->attributes['features'] = json_encode($value);
    }
}
