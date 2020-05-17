<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Http\Requests\CreatePost;
use App\Post;
use App\Comment;
use App\User;
use Carbon\Carbon;
class AuthorController extends Controller
{
    //
	public function __construct(){
		$this->middleware('checkRole:author');
	}
    
    public function dashboard(){
        $posts = Post::where('user_id',Auth::id())->pluck('id')->toArray();
        $allComments = Comment::whereIn('post_id', $posts)->get();
        $todayComments = $allComments->where('created_at','>=',\Carbon\Carbon::today())->count();

        return view('author.dashboard',compact('allComments','todayComments'));
    }
    public function posts(){
        return view('author.posts');
    }

    public function comments(){
        return view('author.comments');    	
    }
    public function newPost(){
        return view('author.newPost');
    }
    public function createPost(createPost $request){
        $post = new Post();
        $post->title = $request['title'];
        $post->content = $request['content'];
        $post->user_id = Auth::id();
        $post->save();
        return back()->with('success','Post Is Successfully created');
    }
}
