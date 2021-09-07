<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    public $timestamps = false;
    use HasFactory;

    protected $with = ['author', 'comments'];

    public function comments(){
        return $this->hasMany(Comment::class, 'parent_id', 'id');
    }

    public function comment(){
        return $this->belongsTo(Comment::class);
    }

    public function post(){
        return $this->belongsTo(Post::class);
    }

    public function author(){
        return $this->belongsTo(User::class);
    }
}
