@extends('post')
@extends('layouts.app')
@section('content')
<div class="container py-5">
    <div class="row">
        <div class="col-lg-10 mx-auto">
            <div class="bg-white rounded-lg shadow-sm p-5">
                <div class="tab-content">
                    <div id="nav-tab-card" class="vh-100 tab-pane fade show active">
                        <h3>>Editer un posts</h3>
                        @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                        @endif
                        <!-- Tableau -->
                        <form action="{{ route('posts.update', $post->id) }}" method="post">
                            @csrf
                            @method('PATCH')
                            <table class="table">
                                <tbody>
                                    <div class="form-floating">
                                        <textarea class="form-control h-auto" name="content" placeholder="votre message ici..." id="" style="height: 100px">{{$post->content}}</textarea>
                                    </div>
                                    <div class="form-group">
                                        <div class="m-3">
                                            <label>{{$post->image}}</label>
                                        </div>
                                        <div class="m-3 w-25 h-25 imgPost!important">
                                            <input type="string" name="image" value="{{$post->image}}" class="form-control">
                                        </div>
                                    </div>
                                    <div class="form-group mb-3">
                                        <label>{{$post->tags}}</label>
                                        <input type="string" name="tags" value="{{$post->tags}}" class="form-control">
                                    </div>
                                    <div class="mb-3">
                                        <button type="submit" class="btn btn-primary rounded-pill shadow-sm">Mettre à
                                            jour</button>
                                    </div>
                                </tbody>
                            </table>
                        </form>

                        <!-- Fin du Tableau -->
                    </div>
                </div>
            </div>
        </div>
    </div>
    @endsection