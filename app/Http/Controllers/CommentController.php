<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Comment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CommentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // dd($request);
        $request->validate([
            'content' => 'required',
            'image' => 'required',
            'tags' => 'required',
        ]);
        Comment::create([
            'content' => $request->content,
            'image' => $request->image,
            'tags' => $request->tags,
            'user_id' => Auth::user()->id,
            'post_id' => $request->post_id
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
        $post = Comment::findOrFail($id);
        return view('comments.edit', compact('post'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $updatePost = $request->validate([
            'content' => 'required',
        ]);
        Comment::whereId($id)->update($updatePost);
        // ci-dessous erreur ?
        return redirect()->route('comments.index')
            ->with('success', 'Le produit mis à jour avec succès !');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $post = Comment::findOrFail($id);
        $post->delete();
        return redirect('/posts')->with('success', 'Produit supprimé avec succès');
    }
}
