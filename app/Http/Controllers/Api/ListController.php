<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Category;
use App\Models\Supplier;
use App\Models\RestockProduct;

class ListController extends Controller
{
    public function index()
    {
        return response()->json([
            "lists" => [
                "products" => Product::all(),
                "categories" => Category::all(),
                "suppliers" => Supplier::all(),
                "restocked" => RestockProduct::all()
            ]
            ]);
    }
}
