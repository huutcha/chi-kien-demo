<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Http\Resources\CategoryResource;

class CategoryController extends Controller
{
    public function index () {
        $categoriesWithSub = Category::with('sub_categories')->get();
        return CategoryResource::collection($categoriesWithSub);
    }
}
