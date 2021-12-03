<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Resources\ProductResource;
use App\Models\Product;

class ProductController extends Controller
{
    public function sales(){
        $saleProducts = Product::with(['colors', 'sizes', 'images'])->where('sale', '>', 0)->get();
        return ProductResource::collection($saleProducts);
    }

    public function index(){
        $saleProducts = Product::with(['colors', 'sizes', 'images'])->get();
        return ProductResource::collection($saleProducts);
    }
}
