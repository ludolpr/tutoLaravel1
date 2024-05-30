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
        $posts = Post::latest()->paginate(10);
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
    public function edit(string $id, post $post)
    {
        if (Auth::user()->id == $post->user_id) {
            $post = Post::findOrFail($id);
        return view('posts.edit', compact('post'));
        } else {
            return redirect()->route('home')->withErrors(['erreur' => 'Vous n\'êtes pas autorisé à modifier ce post']);
        }
        
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