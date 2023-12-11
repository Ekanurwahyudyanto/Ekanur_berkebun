<?php

namespace App\Http\Controllers;
use App\Models\Post;
use App\Models\users;
use Illuminate\View\View;
use Illuminate\Http\Request;

class UsersController extends Controller
{
    public function search(): View
    {
        //get posts
        $posts = Post::latest()->paginate(5);
        //render view with posts
        return view('users.index', compact('posts'));
    }
    
    public function create(): View
    {
        return view('posts.create');
    }
}
