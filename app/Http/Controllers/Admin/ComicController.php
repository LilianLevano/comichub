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

        $validated['user_id'] = auth()->id();               // neemt de ID van de user die geconnecteerd is op deze sessie om die te linken aan een comic



        if($request->hasFile('image')){
            $path = $request->file('image')->store('covers', 'public');     // neem de afbeelding uit de request, steek die in DB, genereert een unieke path naar die afbeelding
            $validated['image_path'] = $path;                                                  // initialiseer de image_path van de comic in de DB
        }else{
            $validated['image_path'] = null;
        }

        $tags = $validated['tags']  ?? [];              // neemt de geselected tags uit de request of stuurt een lege array als er geen is
        unset($validated['tags']);                      // zet die uit de request omdat Comic geen tags kolom heeft (Laraval zou dit alleen kunnen doen, maar voor zekerheid)



        $comic = Comic::create($validated);
        $comic->tags()->sync($tags);                    // sync de tags met de comics (maakt een nieuwe rij in de DB met comic_id + tag_id
        return redirect()->route('admin.comics.index')->with('success','Comic created successfully!');

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
                Storage::disk('public')->delete($comic->image_path); // als de comic al een image had, verwijder de oude image
            }
            $validated['image_path'] = $request->file('image')->store('covers', 'public'); // zelfde principe als store
        }


        $tags = $validated['tags']  ?? [];
        unset($validated['tags']);      // zelfde principe als store


        $comic->update($validated);
        $comic->tags()->sync($tags);            // zelfde principe als store
        return redirect()->route('admin.comics.index')->with('success','Comic updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $comic = Comic::findOrFail($id);

        if ($comic->image_path) {               // verwijder de image vanuit de DB
            Storage::disk('public')->delete($comic->image_path);
        }

        $comic->tags()->detach();           // verwijder de link tussen de comic en zijn tags in de DB

        $comic->comments()->delete();       // verwijder de link tussen de comic en zijn comments in de DB

        $comic->delete();                   // verwijder de comic
        return redirect()->route('admin.comics.index')->with('success','Comic destroyed successfully!');
    }
}
