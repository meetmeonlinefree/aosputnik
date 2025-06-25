<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Http\Resources\PriceResource;
use Illuminate\Http\Request;

class PriceController extends Controller
{
    public function index(Request $request)
    {
        $products = Product::all();
        return PriceResource::collection($products);
    }
}
