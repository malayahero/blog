<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Http\Requests\UserUpdate;
use App\Http\Requests\CreatePost;
use App\Post;
use App\Comment;
use App\User;
use Carbon\Carbon;
class AdminController extends Controller
{
    //
	public function __construct(){
		$this->middleware('checkRole:admin');
	}

    public function dashboard(){
    	return view('admin.dashboard');
    }
     public function posts(){
        $posts = Post::all();
        return view('admin.posts',compact('posts'));
    }
    public function postEdit($id){
        $post = Post::where('id', $id)->first();
        return view('admin.editPost',compact('post'));
    }
    public function postEditPost(CreatePost $request,$id){
        $post = Post::where('id', $id)->first();
        $post->title = $request['title'];
        $post->content = $request['content'];
        $post->save();
        return back()->with('success','Post Is Successfully edit');
    }

    public function deletePost($id){
        $post = Post::where('id', $id)->first();
        $post->delete();
        return back();

    }

    public function comments(){
        return view('admin.comments');    	
    }

    public function user(){
        return view('admin.users');    	
    }
}
