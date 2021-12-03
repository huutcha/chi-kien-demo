<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    public function sizes() {
        return $this->hasMany(Size::class);
    }

    public function colors() {
        return $this->belongsToMany(Color::class, 'products_colors');
    }

    public function subCate() {
        return $this->belongsTo(SubCategory::class);
    }

    public function images()
    {
        return $this->morphMany(Image::class, 'imageable');
    }
}
