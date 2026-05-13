<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\fc;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $categories = category::all();
        return view('admin.categories.index', compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(fc $fc)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(fc $fc)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, fc $fc)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(fc $fc)
    {
        //
    }
}
