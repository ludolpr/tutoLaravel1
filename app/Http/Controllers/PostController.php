<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Auth;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $posts = Post::all();
        return view('posts.index', compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('posts.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'content' => 'required',
            'image' => 'required',
            'tags' => 'required',
        ]);
        // dd($request) console log version PHP Laravel;
        Post::create([
            'content' => $request->content,
            'image' => $request->image,
            'tags' => $request->tags,
            'user_id' => Auth::user()->id
        ]);
        return redirect()->route('posts.index')
            ->with('success', 'Le produit mis à jour avec succès !');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $post = Post::findOrFail($id);
        return view('posts.edit', compact('post'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $updatePost = $request->validate([
            'content' => 'required',
            'image' => 'required',
            'tags' => 'required',
        ]);
        Post::whereId($id)->update($updatePost);
        // ci-dessous erreur ?
        return redirect()->route('posts.index')
            ->with('success', 'Le produit mis à jour avec succès !');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $post = Post::findOrFail($id);
        $post->delete();
        return redirect('/posts')->with('success', 'Produit supprimé avec succès');
    }
}
