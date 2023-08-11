<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProfileController extends Controller
{
    function index(){
        return view('auth.profile');
    }
    function update(Request $request){
        $user = User::find(Auth::id());
        $user->phone = $request->phone;
        if ($request->hasFile('file')) {
            $file = $request->file('file');
            $fileName = time() . '_' . $file->getClientOriginalName();
            $file->storeAs('avatars', $fileName, 'public');
            $user->avatar = "avatars/$fileName";
        }else{
            $user->avatar = "";
        }
        $user->save();
        return redirect()->back();
    }
}
