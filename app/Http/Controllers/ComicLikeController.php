<?php

namespace App\Http\Controllers;

use App\Models\Comic;
use Illuminate\Http\Request;

class ComicLikeController extends Controller
{
    public function store(Comic $comic)
    {
        auth()->user()->likedComics()->attach($comic->id);
        return back();
    }

    public function destroy(Comic $comic)
    {
        auth()->user()->likedComics()->detach($comic->id);
        return back();
    }
}
