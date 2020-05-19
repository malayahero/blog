<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
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

    }
    public function postEditPost($id){

    }

    public function deletePost($id){

    }

    public function comments(){
        return view('admin.comments');    	
    }

    public function user(){
        return view('admin.users');    	
    }
}
