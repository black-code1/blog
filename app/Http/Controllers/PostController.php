<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function index(){
        
       
        return view('posts', [
            //'posts' => $this->getPosts(),
            'posts' => Post::latest()->filter(request(['search']))->get(),
            'categories' => Category::all()
    
        ]);
    }

    public function show(Post $post)
    {
        // Find a post by its slug and pass it to a view called "post"

    return view(
        'post',
        [
            'post' => $post
        ]
    );
    }

   // public function getPosts()
   // {
     //   return Post::latest()->filter()->get();
        /* $posts = Post::latest();
    
        if (request('search')){
            $posts
                ->where('title', 'like', '%' . request('search') . '%')
                ->orWhere('body', 'like', '%' . request('search') . '%');
        }

        return $posts->get();*/
    //}

    
}
