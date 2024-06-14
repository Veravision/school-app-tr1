<?php

namespace App\Http\Controllers;

use App\Models\Tag;
use Illuminate\Http\Request;

class TagController extends Controller
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
        $fetchTag = Tag::all();//i want to display the most recent record
        return view('pages.blog.tag')->with(['allTags' => $fetchTag]);
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
            'content'           => ['required', 'max:500'],
            'status'            => ['nullable'],
        ]);

        $tag = new Tag;

        $tag->title       = $request->title;
        $tag->meta_title  = $request->meta_title;
        $tag->slug        = $request->slug;
        $tag->content     = $request->content;
        $tag->status      =(isset($request->status))? $request->status:0;

        $tag->save();
       // dd($tag->id);
       // var_dump($tag);
        return back()->withInput()->with(['success' => 'Tag created sucessfully.']);
    }

    /**
     * Display the specified resource.
     */
    public function show(Tag $tag)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Tag $tag)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Tag $tag)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Tag $tag)
    {
        //
    }
}
