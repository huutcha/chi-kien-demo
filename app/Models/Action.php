<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Action extends Model
{
    use HasFactory;
    protected $fillable = ['title', 'content', 'user_id'];

    public function images()
    {
        return $this->morphMany(Image::class, 'imageable');
    }
}
