<form action="{{ route('posts.search') }}">
    <input type="text" name="q" value="{{ request()->q ?? ''}}">
    <button type="submit" class="btn btn-dark"><i class="fa-solid fa-magnifying-glass"></i></button>
</form>