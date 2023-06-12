<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Purchase;
use App\Models\Activity;
use App\Http\Resources\PurchaseResource;

use Illuminate\Http\Request;

class PurchaseController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $purchases = Purchase::all();
        return PurchaseResource::collection($purchases);
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
        $purchase = Purchase::create([
            'product_id' => $request->product_id,
            'pieces' => $request->pieces,
            'amount_payable' => $request->amount_payable,
            'amount_paid' => $request->amount_paid,
            'comments' => $request->comments,
            'created_by' => $request->created_by
        ]);
        //record activity
        Activity::create([
            'description' => 'sold an existing product',
            'created_by' => $request->created_by,
            'status' => 5
        ]);

        return response()->json([
            'status' => true,
            'message' => "Purchase Created successfully!",
            'purchase' => $purchase
        ], 200);
    }

    /**
     * Display the specified resource.
     */
    public function show(Purchase $purchase)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Purchase $purchase)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Purchase $purchase)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Purchase $purchase)
    {
        //
    }

    public function salesTotal()
    {
        $total = Purchase::whereDay('created_at', now()->day)->sum('amount_paid');

        return response()->json([
            'status' => 200,
            'message' => 'success',
            'total' => $total
        ]);
    }
}
