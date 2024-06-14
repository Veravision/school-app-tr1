<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Tag;

class PostController extends Controller
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
    $fetchCategories = Category::all()->where('status',1); //active and not deleted NB: add is_delete column
    $fetchTags = Tag::all()->where('status',1); //active and not deleted NB:add is_delete column
    $fetchPosts = Post::all()->where('is_delete',0); //all posts but not deleted 
        return view('pages.blog.post')->with(['allCategories'=>$fetchCategories,'allTags'=>$fetchTags,'allPosts'=>$fetchPosts]);
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
    public function show(Post $post)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Post $post)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Post $post)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Post $post)
    {
        //
    }
}
