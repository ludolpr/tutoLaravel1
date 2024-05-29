@extends('post')
@section('content')
<div class="container py-5">
    <div class="row">
        <div class="col-lg-7 mx-auto">
            <div class="bg-white rounded-lg shadow-sm p-5">
                <div class="tab-content vh-100  ">
                    <div id="nav-tab-card" class="tab-pane fade show active">
                        <h3> Ajouter une publications</h3>
                        @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                        @endif
                        <!-- Formulaire -->
                        <form method="POST" action="{{ route('posts.store') }}">
                            @csrf
                            <div class="form-floating">
                                <textarea class="form-control" name="content" placeholder="votre message ici..." id="floatingTextarea2" style="height: 100px"></textarea>
                                <label for="floatingTextarea2">Publications</label>
                            </div>

                            <div class="form-group mb-3">
                                <div class="m-3">
                                    <label>Image</label>
                                </div>
                                <div class="m-3 w-25 h-25">
                                    <img src="../../images/user.png" class="img-fluid mb-2" alt="...">
                                    <input placeholder="texte ici ..." type="string" name="image" class="form-control">
                                </div>

                            </div>
                            <div class="form-group">
                                <label>Tag</label>
                                <input type="string" name="tags" class="form-control">
                            </div>
                            <button type="submit" class="btn btn-primary rounded-pill shadow-sm m-3">
                                Envoyé</button>
                        </form>
                        <!-- Fin du formulaire -->
                    </div>
                </div>
            </div>
        </div>
    </div>
    @endsection