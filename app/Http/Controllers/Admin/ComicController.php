<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Comic;
use App\Models\Tag;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ComicController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $comics = Comic::orderBy('created_at', 'desc')->paginate(10);
        return view('admin.comics.index', compact('comics'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = Category::all();
        $tags = Tag::all();
        return view('admin.comics.create', compact('categories', 'tags'));
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
        return redirect()->route('admin.comics.index');

    }


    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $comic = Comic::findOrFail($id);
        $categories = Category::all();
        $tags = Tag::all();
        return view('admin.comics.edit', compact('comic', 'categories', 'tags'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'title'        => ['required', 'string', 'max:50'],
            'description'  => ['required', 'string', 'max:255'],
            'author'       => ['required', 'string'],
            'release_date' => ['required', 'date'],
            'category_id'  => ['required'],
            'image'        => ['nullable', 'image', 'max:2048'],
            'tags'        => ['nullable', 'array'],
            'tags.*'      => ['exists:tags,id'],
        ]);

        $validated['user_id'] = auth()->id();

        $comic = Comic::findOrFail($id);

        if ($request->hasFile('image')) {
            if ($comic->image_path) {
                Storage::disk('public')->delete($comic->image_path); // verwijder de oude cover
            }
            $validated['image_path'] = $request->file('image')->store('covers', 'public');
        }


        $tags = $validated['tags']  ?? [];
        unset($validated['tags']);


        $comic->update($validated);
        $comic->tags()->sync($tags);
        return redirect()->route('admin.comics.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $comic = Comic::findOrFail($id);

        if ($comic->image_path) {
            Storage::disk('public')->delete($comic->image_path);
        }

        $comic->tags()->detach();

        $comic->comments()->delete();

        $comic->delete();
        return redirect()->route('admin.comics.index');
    }
}
