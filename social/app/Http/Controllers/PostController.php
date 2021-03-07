<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;

class PostController extends Controller
{
    // Return View Posts
    public function index(){
        $posts = Post::paginate(5); // Return posts collection
        return view('posts.index', [
            'posts' => $posts, // Pass all posts down to index view
        ]);
    }

    // Store Post
    public function store(Request $request){
        // Validate
        $this->validate($request, [
            'body' => 'required',
        ]);
        
        auth()->user()->posts()->create($request->only('body')); // For multiple entries, use array instead of only(). Laravel will automatically add user_id

        return back(); 
    }
}
