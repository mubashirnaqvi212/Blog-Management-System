<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PostController extends Controller
{
    /**
     * Show all posts in the admin dashboard.
     */
    public function adminIndex()
    {
        $posts = Post::latest()->get(); // Fetch all posts ordered by latest
        return view('dashboard', compact('posts'));
    }

    /**
     * Show the form for creating a new post.
     */
    public function create()
    {
        return view('posts.create');
    }

    /**
     * Store a newly created post in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'body' => 'required|string',
            'image' => 'nullable|image|max:2048',
        ]);

        // Handle image upload if exists
        if ($request->hasFile('image')) {
            $validated['image'] = $request->file('image')->store('images', 'public');
        }

        // Associate the post with the authenticated user
        $validated['user_id'] = Auth::id();

        // Create the post
        Post::create($validated);

        return redirect()->route('dashboard')->with('success', 'Post created successfully.');
    }

    /**
     * Show the form for editing the specified post.
     */
    public function edit(string $id)
    {
        $post = Post::findOrFail($id);
        return view('posts.edit', compact('post'));
    }

    /**
     * Update the specified post in storage.
     */
    public function update(Request $request, string $id)
    {
        $post = Post::findOrFail($id);

        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'body' => 'required|string',
            'image' => 'nullable|image|max:2048',
        ]);

        // If new image uploaded, replace old one
        if ($request->hasFile('image')) {
            $validated['image'] = $request->file('image')->store('images', 'public');
        }

        $post->update($validated);

        return redirect()->route('dashboard')->with('success', 'Post updated successfully.');
    }

    /**
     * Delete the specified post from storage.
     */
    public function destroy(string $id)
    {
        $post = Post::findOrFail($id);
        $post->delete();

        return redirect()->route('dashboard')->with('success', 'Post deleted successfully.');
    }

    /**
     * Show a single post (not needed for now).
     */
    public function show(string $id)
{
    $post = Post::findOrFail($id);
    return view('posts.show', compact('post'));
}


    /**
     * Display posts to the public on homepage (optional if needed).
     */
    public function publicIndex()
    {
        $posts = Post::latest()->get();
        return view('home', compact('posts'));
    }
}
