<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
    ];


    public function comics(){
        return $this->hasMany(Comic::class , 'category_id', 'id');
    }

    public function faqs(){
        return $this->hasMany(Faq::class, 'category_id', 'id');
    }
}
