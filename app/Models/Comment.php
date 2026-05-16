<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    protected $fillable = ['user_id', 'comic_id', 'body'];

    public function user() {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }

    public function comic() {
        return $this->belongsTo(Comic::class, 'comic_id', 'id');
    }
}
