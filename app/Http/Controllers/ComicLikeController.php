<?php

namespace App\Http\Controllers;

use App\Models\Comic;
use Illuminate\Http\Request;

class ComicLikeController extends Controller
{
    public function store(Comic $comic)
    {
        auth()->user()->likedComics()->attach($comic->id);  // voeg een nieuwe rij in comic_user_likes met user_id en comic_id
        return back();
    }

    public function destroy(Comic $comic)
    {
        auth()->user()->likedComics()->detach($comic->id); // verwijder de rij user_id + comic_id in comic_user_likes
        return back();
    }
}
