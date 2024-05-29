<!-- @extends('layouts.app') -->
@section('content')
<div class="container py-5">
    <div class="row">
        <div class="col-lg-12 mx-auto h-100">
            <div class="">
                <div class="tab-content">
                    <div id="nav-tab-card" class="vh-100 tab-pane fade show active">
                        <h3>Liste des posts</h3>
                        @if(session()->get('success'))
                        <div class="alert alert-success">
                            {{ session()->get('success') }}
                        </div><br />
                        @endif
                        <!-- Tableau -->
                        <div class="row">
                            @foreach($posts as $post)
                            <div class="row d-flex justify-content-center">
                                <!-- Ajout de la classe mb-4 pour espacer les cartes -->
                                <div class="card col-md-12 row">
                                    <div class="card-body">
                                        <div class="form-floating mb-3 d-flex justify-content-center">
                                            <p>{{$post->content}}</p>
                                            <p for="floatingTextarea2"></label>
                                        </div>
                                        <div class="form-group mb-3 row text-center d-flex justify-content-center ">
                                            <div class="mb-3">
                                                <label>{{$post->image}}</label>
                                            </div>
                                            <div class="mb-3 w-25">
                                                <img src="../../images/user.png" class="img-fluid" name="image" alt="...">
                                            </div>
                                        </div>
                                        <div class="form-group mb-3 d-flex justify-content-center">
                                            <label>{{$post->tags}}</label>
                                        </div>
                                        <div class="mb-3 d-flex justify-content-center">
                                            <a href="{{ route('posts.edit', $post->id)}}" class="btn btn-primary">Éditer</a>
                                        </div>
                                        <form class="d-flex justify-content-center" action="{{ route('posts.destroy', $post->id)}}" method="POST" style="display: inline-block">
                                            @csrf
                                            @method('DELETE')
                                            <button class="btn btn-danger btn-sm mb-5" type="submit">Supprimer</button>
                                        </form>

                                        <!-- comment -->
                                        <h3 class="d-flex justify-content-center">Commentaires reçus</h3>
                                        @if($post->comments->isEmpty())
                                        <p class="text-center d-flex  row">Aucun commentaire trouvé.</p>
                                        @else
                                        <div class="d-flex flex-column align-items-center col-md-12 ">
                                            <ul class="d-flex list-unstyled col-md-12">
                                                @foreach($post->comments as $comment)
                                                <!-- condition ternaire pour changer le style  -->
                                                <li class="media mb-3">
                                                    <div class="card w-75 col-md-12 mb-3">
                                                        <div class="card-body col-md-12">
                                                            <p class="card-text col-md-12">
                                                                <strong>Commentaire :</strong> {{ $comment->content }}
                                                                <br>
                                                                <strong>Image :</strong> {{ $comment->image }}
                                                                <br>
                                                                <strong>Tags :</strong> {{ $comment->tags }}
                                                            </p>
                                                        </div>
                                                        <div class="col-md-12 m-2">
                                                            <div class="m-2">
                                                                <input type="text" name="comments" placeholder="Editer un commentaire" class="mb-2">
                                                                <a href="{{ route('comments.update', $post->id) }}" class="btn btn-primary" method="post">Editer</a>
                                                            </div>
                                                            <!-- form -->
                                                            <form class="d-flex justify-content-center" action="{{ route('posts.destroy', $post->id)}}" method="POST" style="display: inline-block">
                                                                @csrf
                                                                @method('DELETE')
                                                                <button class="btn btn-dark btn-sm mb-5" type="submit">Supprimer</button>
                                                            </form>

                                                        </div>

                                                    </div>

                                                </li>

                                                @endforeach

                                            </ul>
                                        </div>

                                        @endif


                                        <form method="POST" action="{{ route('comments.store')}}">
                                            @csrf
                                            <div class="form-group mb-3">
                                                <label>commentaire :</label>
                                                <input type="string" name="content" class="form-control">
                                                <label>image :</label>

                                                <input type="string" name="image" class="form-control">
                                                <label>tag :</label>

                                                <input type="string" name="tags" class="form-control">
                                                <input type="hidden" name="post_id" value="{{$post->id}}" class="form-control">
                                            </div>

                                            <div class="mb-3 d-flex justify-content-center">
                                                <button type="submit" class="btn btn-primary rounded-pill shadow-sm">Envoyer un
                                                    commentaire</button>
                                            </div>
                                        </form>

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
</div>
@endsection