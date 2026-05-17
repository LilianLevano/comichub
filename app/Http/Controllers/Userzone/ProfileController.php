<?php

namespace App\Http\Controllers\Userzone;
use Illuminate\Support\Facades\Storage;
use App\Http\Controllers\Controller;
use App\Http\Requests\ProfileUpdateRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;

class ProfileController extends Controller
{
    /**
     * Display the user's profile form.
     */
    public function edit(Request $request): View
    {
        return view('userzone.profile.edit', [
            'user' => $request->user(),
        ]);
    }

    /**
     * Update the user's profile information.
     */
    public function update(ProfileUpdateRequest $request): RedirectResponse
    {
        $user = $request->user();       // neem de user die geconnecteerd is op die sessie

        $user->fill($request->safe()->except('image_path'));    // geeft alle gevalideerde informatie die in rules() in ProfileUpdateRequest zijn gedefinieerd behalve image_path

        if ($user->isDirty('email')) {                         // als de mail gewijzigd werd dan verliest hij de verificatie
            $user->email_verified_at = null;
        }

        if ($request->hasFile('image_path')) {                      // controleert of een image werd gestuurd
            if ($user->image_path) {
                Storage::disk('public')->delete($user->image_path);     // als de user een oude profiel foto vervangt wordt de oude verwijderd
            }
            $user->image_path = $request->file('image_path')->store('avatars', 'public');       // slaat nieuwe foto en onthoud de path voor die user
        }

        $user->save();                          // slaat alles op in database

        return Redirect::route('profile.edit')->with('status', 'profile-updated');
    }

    /**
     * Delete the user's account.
     */
    public function destroy(Request $request): RedirectResponse
    {
        $request->validateWithBag('userDeletion', [
            'password' => ['required', 'current_password'],
        ]);

        $user = $request->user();

        Auth::logout();

        $user->delete();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return Redirect::to('/');
    }
}
