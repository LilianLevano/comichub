<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Comic;
use App\Models\Tag;
use Illuminate\Http\Request;

class ComicController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $comics = Comic::orderBy('created_at', 'desc')->paginate(10);
        return view('comics.index', compact('comics'));
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $comic = Comic::findOrFail($id);
        return view('comics.show', compact('comic'));
    }

    public function create(){
        $categories = Category::all();
        $tags = Tag::all();
        return view('comics.create', compact('categories', 'tags'));
    }

    public function store(Request $request){

        // ------- Zelfde principe als store comics voor admin maar voor ingelogde Users --------

        $validated = $request->validate([
            'title'       => ['required', 'string', 'max:50'],
            'description' => ['required', 'string', 'max:255'],
            'author'      => ['required', 'string'],
            'release_date'=> ['required', 'date'],
            'category_id' => ['required'],
            'image'       => ['image', 'max:2048'],
            'tags'        => ['nullable', 'array'],
            'tags.*'      => ['exists:tags,id'],
        ]);

        $validated['user_id'] = auth()->id();



        if($request->hasFile('image')){
            $path = $request->file('image')->store('covers', 'public');
            $validated['image_path'] = $path;
        }else{
            $validated['image_path'] = null;
        }

        $tags = $validated['tags']  ?? [];
        unset($validated['tags']);



        $comic = Comic::create($validated);
        $comic->tags()->sync($tags);
        return redirect()->route('comics.index')->with('success','Comic created successfully!');

    }


}
