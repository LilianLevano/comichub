<?php

namespace App\Http\Controllers;
use App\Models\Comic;

use Illuminate\Http\Request;

class CommentController extends Controller
{
    public function store(Request $request, Comic $comic) {
        $request->validate(['body' => 'required|string|max:1000']);

        $comic->comments()->create([
            'user_id' => auth()->id(),
            'body'    => $request->body,
        ]);

        return back();
    }
}
