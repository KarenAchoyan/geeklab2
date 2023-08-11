<?php

namespace App\Http\Controllers\student;

use App\Http\Controllers\Controller;
use App\Models\Homework;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeworkController extends Controller
{
    function index(){
        $homeworks = Homework::orderBy('id','desc')->where('user_id',Auth::id())->get();
        return view('student.my-homeworks', compact('homeworks'));
    }
    function add(Request $request){
        $homework = new Homework();
        $homework->user_id = Auth::id();
        $homework->rating = 0;
        $homework->lesson_id = $request->lesson_id;
        if ($request->hasFile('file')) {
            $file = $request->file('file');
            $fileName = time() . '_' . $file->getClientOriginalName();
            $file->storeAs('uploads', $fileName, 'public');
//            $lesson->file  = "uploads/$fileName";
            $homework->file = "uploads/$fileName";
        }else{
            $homework->file = "";
        }
        $homework->save();
        return redirect()->back();
    }
}
