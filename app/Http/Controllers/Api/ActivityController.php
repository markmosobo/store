<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Activity;

class ActivityController extends Controller
{
    public function activities(Request $request, $id)
    {
        $activities = Activity::where('created_by',$id)->take(6)->get();
        return response()->json([
            'status' => true,
            'message' => "success",
            'activities' => $activities
        ], 200);
    }

    public function myActivity(Request $request, $id)
    {
        $activities = Activity::where('created_by',$id)->orderByDesc('created_at')->take(6)->get();
        return response()->json([
            'status' => true,
            'message' => "success",
            'activities' => $activities
        ], 200);
    }

    public function userActivity(Request $request, $id)
    {
        $activities = Activity::where('created_by',$id)->take(6)->get();
        return response()->json([
            'status' => true,
            'message' => "success",
            'activities' => $activities
        ], 200);
    }
}
