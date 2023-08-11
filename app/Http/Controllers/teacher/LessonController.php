<?php

namespace App\Http\Controllers\teacher;

use App\Http\Controllers\Controller;
use App\Http\Requests\LessonRequest;
use App\Models\Group;
use App\Models\Lesson;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LessonController extends Controller
{
    function index()
    {
        $groups = Group::where('user_id',Auth::id())->get();
        return  view('teacher.lesson.add', compact('groups'));
    }
    function all(){
        $lessons = Lesson::whereHas('group', function ($query) {
            $query->where('user_id', Auth::id());
        })->get();
        return view('teacher.lesson.all', compact('lessons'));
    }
    function store(LessonRequest $request){

        $title = $request->title;
        $content = $request->input('content');
        $lesson = new Lesson();

        if ($request->hasFile('file')) {
            $file = $request->file('file');
            $fileName = time() . '_' . $file->getClientOriginalName();
            $file->storeAs('uploads', $fileName, 'public');
            $lesson->file  = "uploads/$fileName";
        }else{
            $lesson->file = "";
        }

        $lesson->title = $title;
        $lesson->content =  $content;
        $lesson->group_id = $request->group_id;
        $lesson->save();

        return redirect()->back();
    }
}
