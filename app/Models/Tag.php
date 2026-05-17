<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{

    use HasFactory;

    public function comics()
    {
        return $this->belongsToMany(Comic::class, 'comic_tag', 'tag_id', 'comic_id');
    }
}
