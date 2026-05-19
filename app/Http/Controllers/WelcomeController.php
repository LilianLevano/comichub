<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Comic;
use Illuminate\Http\Request;

class WelcomeController extends Controller
{
    public function index(){

        $comic = Comic::latest()->first();
        $teller = 1;

        $topCategories = Category::withCount('comics')
            ->orderBy('comics_count', 'desc')
            ->take(5)
            ->get();
        return view('welcome', compact('topCategories', 'teller', 'comic'));
    }
}
