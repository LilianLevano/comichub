<?php

namespace App\Http\Controllers;

use App\Mail\ContactAsked;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class ContactController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('contact.index');
    }


    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

    $validated = $request->validate([
        'question' =>['required','string', 'max:2000'],
    ]);

        Mail::to(config('mail.admin_address'))->send(new ContactAsked($validated['question']));

    return back()->with('success','Thanks for contacting us!');
    }


}
