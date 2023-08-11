<?php

namespace App\Http\Controllers\teacher;

use App\Http\Controllers\Controller;
use App\Models\Group;
use App\Models\User;
use App\Models\UserGroup;
use Illuminate\Http\Request;

class InviteController extends Controller
{
    function index(){
        $groups = Group::all();
        return view('teacher.invite', compact('groups'));
    }
    function store(Request $request){
        $email = $request->email;
        $user = User::where('email',$email)->first();

        $groupUser = new UserGroup();
        $groupUser->user_id =  $user->id;
        $groupUser->group_id = $request->group_id;
        $groupUser->save();

        return redirect()->back();
    }
}
