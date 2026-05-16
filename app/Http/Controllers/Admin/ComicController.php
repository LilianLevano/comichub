<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Comic;
use Illuminate\Http\Request;

class ComicController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $comics = Comic::paginate(10);
        return view('admin.comics.index', compact('comics'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = Category::all();
        return view('admin.comics.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {


        $validated = $request->validate([
            'title'       => ['required', 'string', 'max:50'],
            'description' => ['required', 'string', 'max:255'],
            'author'      => ['required', 'string'],
            'release_date'=> ['required', 'date'],
            'category_id' => ['required'],
            'image'       => ['required', 'image', 'max:2048'],
        ]);

        $validated['user_id'] = auth()->id();
        $path = $request->file('image')->store('covers', 'public');

        $validated['image_path'] = $path;
        Comic::create($validated);
        return redirect()->route('admin.comics.index');

    }


    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $comic = Comic::findOrFail($id);
        $categories = Category::all();
        return view('admin.comics.edit', compact('comic', 'categories'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'title'       => ['required', 'string', 'max:50'],
            'description' => ['required', 'string', 'max:255'],
            'author'      => ['required', 'string'],
            'release_date'=> ['required', 'date'],
            'category_id' => ['required'],
            'image'       => ['required', 'image', 'max:2048'],

        ]);


        $validated['user_id'] = auth()->id();
        $path = $request->file('image')->store('covers', 'public');

        $comic = Comic::findOrFail($id);

        $validated['image_path'] = $path;
        $comic->update($validated);
        return redirect()->route('admin.comics.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $comic = Comic::findOrFail($id);
        $comic->delete();
        return redirect()->route('admin.comics.index');
    }
}
