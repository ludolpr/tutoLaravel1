@extends('post')
@section('content')
<div class="container py-5">
    <div class="row">
        <div class="col-lg-10 mx-auto">
            <div class="bg-white rounded-lg shadow-sm p-5">
                <div class="tab-content">
                    <div id="nav-tab-card" class="vh-100 tab-pane fade show active">
                        <h3>Liste des posts</h3>
                        @if(session()->get('success'))
                        <div class="alert alert-success">
                            {{ session()->get('success') }}
                        </div><br />
                        @endif
                        <!-- Tableau -->
                        <table class="table">
                            @foreach($posts as $post)
                            <tbody class="">

                                <div class="card mb-3">
                                    <div class="card-body">
                                        <div class="form-floating mb-3">
                                            <textarea class="form-control" name="content" placeholder="votre message ici..." id="floatingTextarea2" style="height: 100px"></textarea>
                                            <label for="floatingTextarea2">{{$post->content}}</label>
                                        </div>
                                        <div class="form-group mb-3">
                                            <div class="mb-3">
                                                <label>{{$post->image}}</label>
                                            </div>
                                            <div class="mb-3 w-25">
                                                <img src="../../images/user.png" class="img-fluid" name="image" alt="...">
                                            </div>
                                        </div>
                                        <div class="form-group mb-3">
                                            <label>{{$post->tags}}</label>
                                            <input type="text" name="tags" class="form-control">
                                        </div>
                                        <div class="mb-3">
                                            <a href="{{ route('posts.edit', $post->id)}}" class="btn btn-primary">Éditer</a>
                                        </div>
                                        <form action="{{ route('posts.destroy', $post->id)}}" method="POST" style="display: inline-block">
                                            @csrf
                                            @method('DELETE')
                                            <button class="btn btn-danger btn-sm mb-5" type="submit">Supprimer</button>
                                        </form>
                                    </div>
                                </div>


                            </tbody>
                            @endforeach
                        </table>
                        <!-- Fin du Tableau -->
                    </div>
                </div>
            </div>
        </div>
    </div>
    @endsection