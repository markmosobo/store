<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Purchase;
use App\Models\Activity;
use App\Models\User;
use App\Http\Resources\PurchaseResource;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth; 
use Illuminate\Support\Str;

use Illuminate\Http\Request;

class PurchaseController extends Controller
{
    // public function __construct()
    // {
    //     $this->middleware('auth:api');
    // } 
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

    public function myPurchases(Request $request)
    {
        $user = Auth::user(); 
        // $mytodaypurchases = Purchase::where('created_by',$user->id)->with('product','user')->whereDay('created_at', now()->day)->get();
        // $myyesterdaypurchases = Purchase::where('created_by',$user->id)->select("*")->with('product','user')->where('created_by',$id)->whereBetween('created_at',
        // [Carbon::now()->subDay()->startOfDay(), Carbon::now()->subDay()->endOfDay()])->get();

        return response()->json([
            "lists" => [
            'status' => 200,
            'message' => 'success',
            'mytodaypurchases' => $user,
            // 'myyesterdaypurchases' => $myyesterdaypurchases,
            ]
        ]);
    }

    public function myRevenue(Request $request, $id)
    {
        $mytodayrevenue = Purchase::where('created_by','=',$id)->whereDay('created_at', now()->day)->sum('amount_paid');
        $myyesterdayrevenue = Purchase::select("*")->with('product','user')->where('created_by',$id)->whereBetween('created_at',
        [Carbon::now()->subDay()->startOfDay(), Carbon::now()->subDay()->endOfDay()])->sum('amount_paid');

        return response()->json([
            "lists" => [
            'status' => 200,
            'message' => 'success',
            'mytodayrevenue' => $mytodayrevenue,
            'myyesterdayrevenue' => $myyesterdayrevenue,
            ]
        ]);
    }

    public function userPurchases(Request $request, $id)
    {
        // $user = Auth::user(); 
        $usertodaypurchases = Purchase::where('created_by',$id)->with('product','user')->whereDay('created_at', now()->day)->get();
        $useryesterdaypurchases = Purchase::where('created_by',$id)->select("*")->with('product','user')->where('created_by',$id)->whereBetween('created_at',
        [Carbon::now()->subDay()->startOfDay(), Carbon::now()->subDay()->endOfDay()])->get();

        return response()->json([
            "lists" => [
            'status' => 200,
            'message' => 'success',
            'usertodaypurchases' => $usertodaypurchases,
            'useryesterdaypurchases' => $useryesterdaypurchases,
            ]
        ]);
    }

    public function userRevenue(Request $request, $id)
    {
        $usertodayrevenue = Purchase::where('created_by',$id)->whereDay('created_at', now()->day)->sum('amount_paid');
        $useryesterdayrevenue = Purchase::select("*")->with('product','user')->where('created_by',$id)->whereBetween('created_at',
        [Carbon::now()->subDay()->startOfDay(), Carbon::now()->subDay()->endOfDay()])->sum('amount_paid');

        return response()->json([
            "lists" => [
            'status' => 200,
            'message' => 'success',
            'usertodayrevenue' => $usertodayrevenue,
            'useryesterdayrevenue' => $useryesterdayrevenue,
            ]
        ]);
    }
}
