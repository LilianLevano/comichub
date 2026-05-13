<?php

namespace App\Http\Controllers;

use App\Models\Comic;
use Illuminate\Http\Request;

class WelcomeController extends Controller
{
    public function index(){

        $comic = Comic::latest()->first();
        return view('welcome', compact('comic'));
    }
}
