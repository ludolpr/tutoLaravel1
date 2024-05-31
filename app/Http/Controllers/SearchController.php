<?php

namespace App\Http\Controllers;


use App\Models\Post;
use Illuminate\Http\Request;

class SearchController extends Controller
{
    public function search()
    {
        // rechercher l'input qui correspond a la clef q
        $q = request()->input('q');
        $search = Post::where('content', 'like', "%$q%")
            ->orWhere('tags', 'like', "%$q%");
        // ->paginate(6);

        // dd($search);
        return view('posts.search')->with('posts', $search);
    }
}
