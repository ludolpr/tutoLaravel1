@extends('layouts.app')
@section('content')
<div class="container py-5">
    <div class="row">
        <div class="col-lg-12 mx-auto">
            <div class="tab-content">
                <div id="nav-tab-card" class="vh-100 tab-pane fade show active">
                    <h3 class="text-center">Liste des posts</h3>
                    @if(session()->get('success'))
                    <div class="alert alert-success">
                        {{ session()->get('success') }}
                    </div>
                    @endif
                    <!-- Tableau -->
                    <div class="row">
                        @foreach($posts as $post)
                        <div class="col-md-8 mx-auto mb-4">
                            <div class="card">
                                <div class="card-body bg-secondary text-white">
                                    <div class="mb-3 text-center">
                                        <p>{{ $post->content }}</p>
                                    </div>
                                    <div class="form-group mb-3 text-center">
                                        <div class="mb-3">
                                            <label>Nom de l'image: {{ $post->image }}</label>
                                        </div>
                                        <div class="mb-3 p-5 bg-light rounded-5">
                                            <img src="../../images/user.png" class="img-fluid rounded-5" alt="Image">
                                        </div>
                                    </div>a
                                    <div class="form-group mb-3 text-center">
                                        <label>Tags de l'image :{{ $post->tags }}</label>
                                    </div>
                                    <div class="mb-3 text-center">
                                        <a href="{{ route('posts.edit', $post->id) }}" class="btn btn-primary">Éditer</a>
                                    </div>
                                    <form action="{{ route('posts.destroy', $post->id) }}" method="POST" class="d-flex justify-content-center text-center d-inline">
                                        @csrf
                                        @method('DELETE')
                                        <button class="btn btn-danger btn-sm" type="submit">Supprimer</button>
                                    </form>
                                    <!-- Comment Section -->
                                    <h4 class="text-center mt-4">Commentaires reçus</h4>
                                    @if($post->comments->isEmpty())
                                    <p class="text-center">Aucun commentaire trouvé.</p>
                                    @else
                                    <ul class="list-unstyled">
                                        @foreach($post->comments as $comment)
                                        <li class="media mb-3">
                                            <div class="card mx-auto mb-3" style="width: 90%;">
                                                <div class="card-body">
                                                    <div class="row d-flex justify-content-center">
                                                        <p><strong>Commentaire :</strong> {{ $comment->content }}</p>
                                                        <p><strong>Image :</strong> {{ $comment->image }}</p>
                                                        <p><strong>Tags :</strong> {{ $comment->tags }}</p>
                                                    </div>

                                                    <div class="d-flex justify-content-between">
                                                        <div class="row d-flex">
                                                            <form method="POST" action="{{ route('comments.update', $comment) }}" class="m-2">
                                                                @csrf
                                                                @method('PUT')
                                                                <input type="text" name="content" class="form-control mb-2" value="{{ $comment->content }}">
                                                                <input type="text" name="image" class="form-control mb-2" value="{{ $comment->image }}">
                                                                <input type="text" name="tags" class="form-control mb-2" value="{{ $comment->tags }}">
                                                                <button type="submit" class="btn btn-primary btn-sm">
                                                                    <i class="fas fa-pen"></i>
                                                                </button>
                                                            </form>
                                                            <form action="{{ route('comments.destroy', $comment->id) }}" method="POST" class="m-2">
                                                                @csrf
                                                                @method('DELETE')
                                                                <button class="btn btn-dark btn-sm" type="submit">
                                                                    <i class="fas fa-trash"></i>
                                                                </button>
                                                            </form>
                                                        </div>

                                                    </div>
                                                </div>
                                            </div>
                                        </li>
                                        @endforeach
                                    </ul>
                                    @endif
                                    <form method="POST" action="{{ route('comments.store') }}">
                                        @csrf
                                        <div class="form-group mb-3">
                                            <label>Commentaire :</label>
                                            <input type="text" name="content" class="form-control mb-2">
                                            <label>Image :</label>
                                            <input type="text" name="image" class="form-control mb-2">
                                            <label>Tag :</label>
                                            <input type="text" name="tags" class="form-control mb-2">
                                            <input type="hidden" name="post_id" value="{{ $post->id }}" class="form-control">
                                        </div>
                                        <div class="text-center">
                                            <button type="submit" class="btn btn-primary rounded-pill shadow-sm">Envoyer
                                                un commentaire</button>
                                        </div>
                                    </form>
                                    <!-- End Comment Section -->
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>
                    <!-- Fin du Tableau -->
                </div>
            </div>
        </div>
    </div>
</div>
@endsection