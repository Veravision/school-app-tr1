<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        $fetchCategory = Category::all();//i want to display the most recent record
        return view('pages.blog.category')->with(['allCategories' => $fetchCategory]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $request->validate([
            'title'             => ['required', 'max:255'],
            'meta_title'        => ['required', 'max:255'],
            'slug'              => ['required', 'max:255'],
            'content'           => ['required', 'max:1000'],
            'status'            => ['nullable'],
        ]);

        $tag = new Category;

        $tag->title       = $request->title;
        $tag->meta_title  = $request->meta_title;
        $tag->slug        = $request->slug;
        $tag->content     = $request->content;
        $tag->status      =(isset($request->status))? $request->status:0;

        $tag->save();
        // dd($request);
       // var_dump($tag);
        return back()->withInput()->with(['success' => 'Category created sucessfully.']);
    }

    /**
     * Display the specified resource.
     */
    public function show(Category $category)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Category $category)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Category $category)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Category $category)
    {
        //
    }
}