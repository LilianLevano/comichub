<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Faq;
use Illuminate\Http\Request;

class FaqController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $faqs = Faq::paginate(10);
        return view('admin.faqs.index', compact('faqs'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = Category::all();
        return view('admin.faqs.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'question'    => ['required', 'string', 'max:255'],
            'answer'      => ['nullable', 'string'],
            'category_id' => ['required', 'exists:categories,id'],
        ]);

        Faq::create([
            'question'    => $request->question,
            'answer'      => $request->answer,
            'category_id' => $request->category_id,
            'user_id'     => auth()->id(),
        ]);

        return redirect()->route('admin.faqs.index')->with('success','FAQ created successfully!');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $faq = Faq::findOrFail($id);
        $categories = Category::all();
        return view('admin.faqs.edit', compact('faq', 'categories'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
       $validate = $request->validate([
            'question'    => ['required', 'string', 'max:255'],
            'answer'      => ['nullable', 'string'],
            'category_id' => ['required', 'exists:categories,id'],
        ]);

        $faq = Faq::findOrFail($id);
        $faq->update($validate);

        return redirect()->route('admin.faqs.index')->with('success','FAQ updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $faq = Faq::findOrFail($id);
        $faq->delete();
        return redirect()->route('admin.faqs.index')->with('success','FAQ destroyed successfully!');
    }
}
