<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index()
    {
        $categories = Category::orderBy('created_at', 'desc')->paginate(10);        // order by date, meest recente helemaal boven de lijst
        return view('admin.categories.index', compact('categories'));
    }

    public function create()
    {
        return view('admin.categories.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
        ]);

        Category::create(['name' => $request->name]);

        return redirect()->route('admin.categories.index')->with('success','Category created successfully!'); // stuurt een status mee om een flash message te tonen
    }

    public function edit($id)
    {
        $category = Category::findOrFail($id);
        return view('admin.categories.edit', compact('category'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required',
        ]);

        $category = Category::findOrFail($id);
        $category->update(['name' => $request->name]);

        return redirect()->route('admin.categories.index')->with('success','Category updated successfully!');
    }

    public function destroy($id)
    {
        $category = Category::findOrFail($id);

        $category->delete();
        return redirect()->route('admin.categories.index')->with('success','Category destroyed successfully!');
    }
}
