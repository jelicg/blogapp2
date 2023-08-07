<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PostsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $posts = Post::where('isPublished', true)->get();
        return view('pages.posts', compact('posts'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        if(!Auth::check()){
            return redirect('create.posts')->withErrors('Only authenticated users can create post');
        }

        $user = Auth::user();
        
        $request->validate([
            'title' => 'required|string|min:5|max:255',
            'body' => 'required|string|min:10|max:5000'
        ]);

        Post::create([
            'title' => $request->title,
            'body' => $request->body,
            'user_id' => $user->id
        ]);

        return redirect('createpost')->with('status', 'Post successfully created.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $post = Post::findOrFail($id);
        return view('pages.post', compact('post'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }

    public function createPost()
    {
        return view('pages.createpost');
    }
}
