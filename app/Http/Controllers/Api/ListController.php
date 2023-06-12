<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Category;
use App\Models\Supplier;
use App\Models\RestockProduct;
use App\Models\Purchase;
use App\Models\User;
use App\Models\Activity;

class ListController extends Controller
{
    public function index()
    {
        $restocked = RestockProduct::with('product','supplier','user')->whereDay('created_at', now()->day)->get();
        $allrestocked = RestockProduct::with('product','supplier','user')->get();
        $products = Product::with('supplier','category','user')->get();
        $purchases = Purchase::with('product','user')->whereDay('created_at', now()->day)->get();
        $activities = Activity::latest()->with('user')->whereDay('created_at', now()->day)->take(6)->get();
        $allactivities = Activity::with('user')->get();
        $users = User::all();
        return response()->json([
            "lists" => [
                "products" => $products,
                "categories" => Category::all(),
                "suppliers" => Supplier::all(),
                "restocked" => $restocked,
                "allrestocked" => $allrestocked,
                "purchases" => $purchases,
                "users" => $users,
                "activities" =>$activities,
                "allactivities" =>$allactivities
            ]
            ]);
    }
}
