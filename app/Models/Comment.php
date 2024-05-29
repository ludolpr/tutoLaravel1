<?php

namespace App\Models;

use App\Models\Post;
use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Comment extends Model
{
    use HasFactory;
    protected $fillable = ['id', 'content', 'image', 'tags', 'user_id', 'post_id'];

    // nom de la fonction au singulier car 1 seul message en relation
    // cardinalité 1,1
    public function post()
    {
        return $this->belongsTo(Post::class);
}
    // idem
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}