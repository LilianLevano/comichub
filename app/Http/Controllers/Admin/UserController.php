<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $users = User::orderBy('name')->paginate(10);
        return view('admin.users.index', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.users.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name'     => ['required', 'string', 'max:255'],
            'email'    => ['required', 'email', 'unique:users'],
            'password' => ['required', 'string', 'min:8'],
            'birthday' => ['required', 'date'],
            'bio'      => ['required', 'string'],
            'image'    => ['nullable', 'image', 'max:2048'],
            'is_admin' => ['nullable', 'boolean'],
        ]);

        if ($request->hasFile('image')) {
            $validated['image_path'] = $request->file('image')->store('avatars', 'public');     // image wordt opgeslagen in DB
        }

        $validated['password'] = bcrypt($validated['password']);            // encodeer de passwoord in de DB
        $validated['is_admin'] = $request->boolean('is_admin');         // request->boolean gebruiken omdat wanneer de checkbox uit is, wordt er niets gestuurd, dit zorgt ervoor dat we 1 of 0 krijgen in de DB

        User::create($validated);

        return redirect()->route('admin.users.index')->with('success','User created successfully!');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $user = User::findOrFail($id);
        return view('admin.users.edit', compact('user'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, User $user)
    {
        $validated = $request->validate([
            'name'     => ['required', 'string', 'max:255'],
            'email'    => ['required', 'email', 'unique:users,email,' . $user->id],
            'password' => ['nullable', 'string', 'min:8'],
            'birthday' => ['required', 'date'],
            'bio'      => ['required', 'string'],
            'image'    => ['nullable', 'image', 'max:2048'],
            'is_admin' => ['nullable', 'boolean'],
        ]);



        if ($request->hasFile('image')) {
            if($user->image_path){
                Storage::disk('public')->delete($user->image_path);         // als de user al een avatar had, wordt die verwijderd
            }
            $validated['image_path'] = $request->file('image')->store('avatars', 'public'); // nieuwe avatar wordt gesaved in de DB, en de path hiervan gelinkt aan de user in de DB
        }

        if ($validated['password']) {
            $validated['password'] = bcrypt($validated['password']);    // als een nieuwe passwoord werd gestuurd vervangen we die we de nieuwe geencodeerde passwoord
        } else {
            unset($validated['password']); // als de field leeg is zetten we de attribuut passwoord uit de request om de oude passwoord niet te veranderen
        }

        $validated['is_admin'] = $request->boolean('is_admin');         // zelfde principe als store

        $user->update($validated);

        return redirect()->route('admin.users.index')->with('success','User updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $user = User::findOrFail($id);
        $user->delete();
        return redirect()->route('admin.users.index')->with('success','User destroyed successfully!');
    }
}
