<?php

namespace App\Http\Controllers\teacher;

use App\Http\Controllers\Controller;
use App\Models\Group;
use App\Models\UserGroup;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class GroupController extends Controller
{
    function index(){
        $groups = Group::with('users')->orderBy('id','desc')->get();
        return view('teacher.group.group', compact('groups'));
    }

    function store(Request $request){

        $group = new Group();
        $group->name = $request->name;
        $group->user_id = Auth::id();
        $group->save();

        return redirect()->back();
    }
    function deleteFromGroup($userId, $groupId){
        UserGroup::where('user_id',$userId)->where('group_id',$groupId)->delete();
        return redirect()->back();
    }
    function delete($id){
        Group::where('id',$id)->delete();
        return redirect()->back();
    }
}
