<?php

namespace App\Http\Controllers;

use App\Models\Post;

class HomeController extends Controller
{
    public function index()
    {
        // Fetch all posts (you can filter only published ones if you add that later)
        $posts = Post::latest()->get();

        // Pass posts to the home view
        return view('home', ['posts' => $posts]);
    }
}
