<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class BlogController extends Controller
{
    public function index(Request $request)
    {
        $post = Post::query()->paginate($request->input('per_page', 8));
        return view('client.blog-post', compact('post'));
    }
    public function show()
    {
        $post = Post::query()->first();
        return view('client.blog-post', compact('post'));
    }
}
