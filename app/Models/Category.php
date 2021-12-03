<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    public function sub_categories() {
        return $this->hasMany(SubCategory::class);
    }

    public function countProduct() {
        $result = 0;
        foreach($this->sub_categories as $subCate){
            $result += count($subCate->products);
        }
        return $result;
    }
}
