<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comic extends Model
{
    use HasFactory;

    protected $fillable = ['title', 'description', 'author', 'user_id', 'release_date', 'image_path', 'category_id'];

    public function category(){
        return $this->belongsTo(Category::class, 'category_id', 'id');
    }

    public function user(){
        return $this->belongsTo(User::class, 'user_id', 'id');
    }

    public function comments() {
        return $this->hasMany(Comment::class, 'comic_id', 'id');
    }

    public function tags()
    {
        return $this->belongsToMany(Tag::class, 'comic_tag', 'comic_id', 'tag_id');
    }

}
