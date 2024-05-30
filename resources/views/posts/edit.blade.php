@extends('layouts.app')

@section('content')
<div class="container py-5">
    <div class="row justify-content-center">
        <div class="col-lg-8">
            <div class="bg-white rounded-lg shadow-sm p-5">
                <h3 class="mb-4">Éditer un post</h3>

                @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
                @endif

                <form action="{{ route('posts.update', $post->id) }}" method="post">
                    @csrf
                    @method('PATCH')

                    <div class="mb-4">
                        <label for="content" class="form-label">Commentaires</label>
                        <textarea class="form-control" name="content" id="content" rows="4" placeholder="Votre message ici...">{{ $post->content }}</textarea>
                    </div>

                    <div class="mb-4">
                        <label for="image" class="form-label">Image</label>
                        <input type="text" name="image" id="image" class="form-control" value="{{ $post->image }}">
                    </div>

                    <div class="mb-4">
                        <label for="tags" class="form-label">Tags</label>
                        <input type="text" name="tags" id="tags" class="form-control" value="{{ $post->tags }}">
                    </div>

                    <div class="d-grid">
                        <button type="submit" class="btn btn-primary rounded-pill shadow-sm">Mettre à jour</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection