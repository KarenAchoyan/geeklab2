<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\PostRequest;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PostController extends Controller
{
    function index(){
        $posts = Post::with('user')->orderBy('id','desc')->get();
        return view('Auth.posts', compact('posts'));
    }
    function add(PostRequest $request){
        $post = new Post();
        $post->content = $request->input('content');
        $post->user_id = Auth::id();
        $post->save();

        return redirect()->back();
    }
    function delete($id){
        Post::where('id',$id)->delete();
        return redirect()->back();
    }
}
