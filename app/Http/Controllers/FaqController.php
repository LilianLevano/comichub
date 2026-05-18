<?php

namespace App\Http\Controllers;

use App\Mail\FaqAsked;
use App\Models\Category;
use App\Models\Faq;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class FaqController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $faqs = Faq::with(['category', 'user'])
            ->orderBy('question')
            ->get()
            ->groupBy('category.name');

        return view('faqs.index', compact('faqs'));
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $faq = Faq::findOrFail($id);
        return view('faqs.show', compact('faq'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = Category::all();
        return view('faqs.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'question'    => ['required', 'string', 'max:255'],
            'category_id' => ['required', 'exists:categories,id'],
        ]);

        $faq = Faq::create([
            'question'    => $request->question,
            'category_id' => $request->category_id,
            'user_id'        => auth()->id(),
        ]);


        Mail::to(config('mail.admin_address'))->send(new FaqAsked($faq));

        return redirect()->route('faqs.index');
    }




}
