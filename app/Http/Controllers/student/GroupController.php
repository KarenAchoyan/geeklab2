<?php

namespace App\Http\Controllers\student;

use App\Http\Controllers\Controller;
use App\Models\Lesson;
use App\Models\UserGroup;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class GroupController extends Controller
{
    function index(){
        $groups = UserGroup::with('group.lessons')->where('user_id',Auth::id())->get();
        return view('student.my-groups', compact('groups'));
    }
    function allLessons($id){
        $lessons = Lesson::with('homework')->where('group_id',$id)->cursorPaginate(1);
        return view('student.my-lessons', compact('lessons'));
    }
}
