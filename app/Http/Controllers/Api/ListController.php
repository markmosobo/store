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
use Carbon\Carbon;

class ListController extends Controller
{
    // public function __construct()
    // {
    //     $this->middleware('auth:api');
    // } 

    public function index()
    {
        $restocked = RestockProduct::with('product','supplier','user')->whereDay('created_at', now()->day)->get();
        $allrestocked = RestockProduct::with('product','supplier','user')->get();
        $restockedtoday = RestockProduct::with('product','supplier','user')->whereDay('created_at', now()->day)->get();
        $products = Product::with('supplier','category','user')->get();

        $todaypurchases = Purchase::with('product','user')->whereDay('created_at', now()->day)->get();
        $weekpurchases = Purchase::select("*")->with('product','user')->whereBetween('created_at',
         [Carbon::now()->startOfWeek(), Carbon::now()->endOfWeek()])->get();
        $monthpurchases = Purchase::with('product','user')->whereMonth('created_at', Carbon::now()->month)->get();
        $yearpurchases = Purchase::select("*")->with('product','user')->whereBetween('created_at',
        [Carbon::now()->startOfYear(), Carbon::now()->endOfYear()])->get();
        $quarterlypurchases = Purchase::select("*")->with('product','user')->whereBetween('created_at',
        [Carbon::now()->startOfQuarter(), Carbon::now()->endOfDay()])->get();
        $lastyearpurchases = Purchase::select("*")->with('product','user')->whereBetween('created_at',
        [Carbon::now()->subYear()->startOfYear(), Carbon::now()->subYear()->endOfYear()])->get();
        $allpurchases = Purchase::select("*")->with('product','user')->get();
        $twentyfourhourpurchases = Purchase::select("*")->with('product','user')->whereBetween('created_at',
        [Carbon::now()->subHours(24), Carbon::now()->endOfDay()])->get();
        $yesterdaypurchases = Purchase::select("*")->with('product','user')->whereBetween('created_at',
        [Carbon::now()->subDay()->startOfDay(), Carbon::now()->subDay()->endOfDay()])->get();
        $lastsevendayspurchases = Purchase::select("*")->with('product','user')->whereBetween('created_at',
        [Carbon::now()->subDays(7)->startOfDay(), Carbon::now()->endOfDay()])->get();
        $lastthirtydayspurchases = Purchase::select("*")->with('product','user')->whereBetween('created_at',
        [Carbon::now()->subDays(29)->startOfDay(), Carbon::now()->endOfDay()])->get();
        $lastninetydayspurchases = Purchase::select("*")->with('product','user')->whereBetween('created_at',
        [Carbon::now()->subDays(89)->startOfDay(), Carbon::now()->endOfDay()])->get();
        $lastmonthpurchases = Purchase::select("*")->with('product','user')->whereBetween('created_at',
        [Carbon::now()->subMonth()->startOfMonth(), Carbon::now()->subMonth()->endOfMonth()])->get();
        $lastyearpurchases = Purchase::select("*")->with('product','user')->whereBetween('created_at',
        [Carbon::now()->subYear()->startOfYear(), Carbon::now()->subYear()->endOfYear()])->get();

        $todayrevenue = Purchase::whereDay('created_at', now()->day)->sum('amount_paid');
        $todayprojectedrevenue = Purchase::whereDay('created_at', now()->day)->sum('amount_payable');
        $yesterdayrevenue = Purchase::select("*")->with('product','user')->whereBetween('created_at',
        [Carbon::now()->subDay()->startOfDay(), Carbon::now()->subDay()->endOfDay()])->sum('amount_paid');
        $twentyfourhourrevenue = Purchase::select("*")->with('product','user')->whereBetween('created_at',
        [Carbon::now()->subHours(24), Carbon::now()->endOfDay()])->sum('amount_paid');
        $twentyfourhourprojectedrevenue = Purchase::select("*")->with('product','user')->whereBetween('created_at',
        [Carbon::now()->subHours(24), Carbon::now()->endOfDay()])->sum('amount_payable');
        $yesterdayrevenue = Purchase::select("*")->with('product','user')->whereBetween('created_at',
        [Carbon::now()->subDay()->startOfDay(), Carbon::now()->subDay()->endOfDay()])->sum('amount_paid');
        $yesterdayprojectedrevenue = Purchase::select("*")->with('product','user')->whereBetween('created_at',
        [Carbon::now()->subDay()->startOfDay(), Carbon::now()->subDay()->endOfDay()])->sum('amount_payable');
        $lastsevendaysrevenue = Purchase::select("*")->with('product','user')->whereBetween('created_at',
        [Carbon::now()->subDays(7)->startOfDay(), Carbon::now()->endOfDay()])->sum('amount_paid');
        $lastsevendaysprojectedrevenue = Purchase::select("*")->with('product','user')->whereBetween('created_at',
        [Carbon::now()->subDays(7)->startOfDay(), Carbon::now()->endOfDay()])->sum('amount_payable');
        $monthrevenue = Purchase::with('product','user')->whereMonth('created_at', Carbon::now()->month)->sum('amount_paid');
        $monthprojectedrevenue = Purchase::with('product','user')->whereMonth('created_at', Carbon::now()->month)->sum('amount_payable');
        $lastmonthrevenue = Purchase::select("*")->with('product','user')->whereBetween('created_at',
        [Carbon::now()->subMonth()->startOfMonth(), Carbon::now()->subMonth()->endOfMonth()])->sum('amount_paid');
        $lastmonthprojectedrevenue = Purchase::select("*")->with('product','user')->whereBetween('created_at',
        [Carbon::now()->subMonth()->startOfMonth(), Carbon::now()->subMonth()->endOfMonth()])->sum('amount_payable');
        $weekpurchases = Purchase::select("*")->with('product','user')->whereBetween('created_at',
         [Carbon::now()->startOfWeek(), Carbon::now()->endOfWeek()])->get();
        $weekrevenue = Purchase::select("*")->with('product','user')->whereBetween('created_at',
        [Carbon::now()->startOfWeek(), Carbon::now()->endOfWeek()])->sum('amount_paid');
        $weekprojectedrevenue = Purchase::select("*")->with('product','user')->whereBetween('created_at',
        [Carbon::now()->startOfWeek(), Carbon::now()->endOfWeek()])->sum('amount_payable');
        $lastthirtydaysrevenue = Purchase::select("*")->with('product','user')->whereBetween('created_at',
        [Carbon::now()->subDays(29)->startOfDay(), Carbon::now()->endOfDay()])->sum('amount_paid');
        $lastthirtydaysprojectedrevenue = Purchase::select("*")->with('product','user')->whereBetween('created_at',
        [Carbon::now()->subDays(29)->startOfDay(), Carbon::now()->endOfDay()])->sum('amount_payable');
        $lastninetydaysrevenue = Purchase::select("*")->with('product','user')->whereBetween('created_at',
        [Carbon::now()->subDays(89)->startOfDay(), Carbon::now()->endOfDay()])->sum('amount_paid');
        $lastninetydaysprojectedrevenue = Purchase::select("*")->with('product','user')->whereBetween('created_at',
        [Carbon::now()->subDays(89)->startOfDay(), Carbon::now()->endOfDay()])->sum('amount_payable');
        $yearrevenue = Purchase::select("*")->with('product','user')->whereBetween('created_at',
        [Carbon::now()->startOfYear(), Carbon::now()->endOfYear()])->sum('amount_paid');
        $yearprojectedrevenue = Purchase::select("*")->with('product','user')->whereBetween('created_at',
        [Carbon::now()->startOfYear(), Carbon::now()->endOfYear()])->sum('amount_payable');
        $lastyearrevenue = Purchase::select("*")->with('product','user')->whereBetween('created_at',
        [Carbon::now()->subYear()->startOfYear(), Carbon::now()->subYear()->endOfYear()])->sum('amount_paid');
        $lastyearprojectedrevenue = Purchase::select("*")->with('product','user')->whereBetween('created_at',
        [Carbon::now()->subYear()->startOfYear(), Carbon::now()->subYear()->endOfYear()])->sum('amount_payable');
        $quarterlyrevenue = Purchase::select("*")->with('product','user')->whereBetween('created_at',
        [Carbon::now()->startOfQuarter(), Carbon::now()->endOfDay()])->sum('amount_paid');
        $quarterlyprojectedrevenue = Purchase::select("*")->with('product','user')->whereBetween('created_at',
        [Carbon::now()->startOfQuarter(), Carbon::now()->endOfDay()])->sum('amount_payable');
        $allrevenue = Purchase::select("*")->with('product','user')->sum('amount_paid');
        $allprojectedrevenue = Purchase::select("*")->with('product','user')->sum('amount_payable');

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
                "restockedtoday" => $restockedtoday,
                "todaypurchases" => $todaypurchases,
                "weekpurchases" => $weekpurchases,
                "monthpurchases" => $monthpurchases,
                "yearpurchases" => $yearpurchases,
                "quarterlypurchases" => $quarterlypurchases,
                "lastyearpurchases" => $lastyearpurchases,
                "allpurchases" => $allpurchases,
                "twentyfourhourpurchases" => $twentyfourhourpurchases,
                "yesterdaypurchases" => $yesterdaypurchases,
                "lastsevendayspurchases" => $lastsevendayspurchases,
                "lastthirtydayspurchases" => $lastthirtydayspurchases,
                "lastninetydayspurchases" => $lastninetydayspurchases,
                "lastmonthpurchases" => $lastmonthpurchases,
                "lastyearpurchases" => $lastyearpurchases,
                "todayrevenue" => $todayrevenue,
                "todayprojectedrevenue" => $todayprojectedrevenue,
                "yesterdayrevenue" => $yesterdayrevenue,
                "twentyfourhourrevenue" => $twentyfourhourrevenue,
                "twentyfourhourprojectedrevenue" => $twentyfourhourprojectedrevenue,
                "yesterdayrevenue" => $yesterdayrevenue,
                "yesterdayprojectedrevenue" => $yesterdayprojectedrevenue,
                "lastsevendaysrevenue" => $lastsevendaysrevenue,
                "lastsevendaysprojectedrevenue" => $lastsevendaysprojectedrevenue,
                "weekrevenue" => $weekrevenue,
                "weekprojectedrevenue" => $weekprojectedrevenue,
                "monthrevenue" => $monthrevenue,
                "monthprojectedrevenue" => $monthprojectedrevenue,
                "lastmonthrevenue" => $lastmonthrevenue,
                "lastmonthprojectedrevenue" => $lastmonthprojectedrevenue,
                "lastthirtydaysrevenue" => $lastthirtydaysrevenue,
                "lastthirtydaysprojectedrevenue" => $lastthirtydaysprojectedrevenue,
                "lastninetydaysrevenue" => $lastninetydaysrevenue,
                "lastninetydaysprojectedrevenue" => $lastninetydaysprojectedrevenue,
                "yearrevenue" => $yearrevenue,
                "yearprojectedrevenue" => $yearprojectedrevenue,
                "lastyearrevenue" => $lastyearrevenue,
                "lastyearprojectedrevenue" => $lastyearprojectedrevenue,
                "quarterlyrevenue" => $quarterlyrevenue,
                "quarterlyprojectedrevenue" => $quarterlyprojectedrevenue,
                "allrevenue" => $allrevenue,
                "allprojectedrevenue" => $allprojectedrevenue,

                "users" => $users,
                "activities" =>$activities,
                "allactivities" =>$allactivities
            ]
            ]);
    }
}
