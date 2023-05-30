<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreProductRequest;
use App\Http\Resources\ProductResource;
use App\Models\Product;
use App\Models\RestockProduct;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $products = Product::all();
        return ProductResource::collection($products);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        if(!empty($request->image)){
            $photo_name = time().'.' . explode('/', explode(':', substr($request->image,0,strpos($request->image, ';')))[1])[1];
            \Image::make($request->image)->save(public_path('products/').$photo_name);

        }else{
            $photo_name = '';
        }
        $product = Product::create([
            'name' => $request->name,
            'category_id' => $request->category_id,
            'supplier_id' => $request->supplier_id,
            'image' => $photo_name,
            'size' => $request->size,
            'pieces' => $request->pieces,
            'buying_price' => $request->buying_price,
            'created_by' => 1
        ]);

        return response()->json([
            'status' => true,
            'message' => "Product Created successfully!",
            'product' => $product
        ], 200);
    }

    /**
     * Display the specified resource.
     */
    public function show(Request $request, $id)
    {
        $product = Product::findOrFail($id);

        return response()->json([
            'status' => true,
            'message' => "Product",
            'product' => $product
        ], 200);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Product $product)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(StoreProductRequest $request, Product $product)
    {
        $product->update($request->all());
        
        return new ProductResource($product);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Product $product)
    {
        $product->delete();

        return response(null, 204);
    }

    public function restock(Request $request, $id)
    {
        $product = Product::findOrFail($id);
        $product->update([
            'buying_price' => $request->buying_price,
            'pieces' => $request->pieces
        ]);

        $restockproduct = RestockProduct::create([
            'product_id' => $id,
            'pieces' =>$request->newpieces,
            'buying_price' => $request->buying_price,
            'supplier_id' => $request->supplier_id,
            'created_by' => 1
        ]);
    }
}
