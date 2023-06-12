<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class ProfileController extends Controller
{
    public function update(Request $request, $id)
    {
        $user = User::findOrFail($id);
        $user->update($request->all());
        return response()->json([
            'status' => true,
            'message' => "Profile Updated successfully!",
            'user' => $user
        ], 200);
    }

    public function changePassword(Request $request, $id)
    {
        $user = User::findOrFail($id);
        $pass = Hash::make($request->old_password);
        if($pass !== $user->password)
        {
            return response()->json([
                'status' =>false,
                'message' => 'Old password incorrect'
            ]);
        }else{
            if($user){
                $user->update(array('password' => Hash::make($request->new_password)));
                $user->save();
            }
        }
    }
}
