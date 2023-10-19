<?php

namespace App\Models;

use App\Models\Traits\Filterable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use Filterable;
    use HasFactory;
    protected $fillable = ['title', 'content', 'tags', 'main_pic', 'preview_pic', 'user_id'];

    public function user(){
        return $this->belongsTo(User::class, 'user_id');
    }

    public function likes(){
        return $this->hasMany(Like::class, 'post_id');
    }

    public function  comments(){
        return $this->hasMany(Comment::class, 'post_id')->whereNull('parent_id');
    }
}
