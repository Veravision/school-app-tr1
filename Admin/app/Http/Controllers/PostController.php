<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Tag;
use App\Models\Admin;

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
    $fetchUsers = Admin::all(); 
        return view('pages.blog.post')->with(['allCategories'=>$fetchCategories,'allTags'=>$fetchTags,'allPosts'=>$fetchPosts,'allUsers'=>$fetchUsers]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        dd($request);
        //
        // $request->validate([
        //     'title'             => ['required', 'max:255'],
        //     'editor'             => ['required', 'max:5000'],
        //     'meta_title'        => ['required', 'max:255'],
        //     'status'            => ['nullable'],
        // ]);
        
/** New Post Tab.*/
    Post::create([
        'title'           =>$request->title,
        'author_id'       =>$request->author,//from user table
        'meta_title'      =>$request->meta_title,
        'slug'            =>$request->slug,
        'summary'         =>$request->summary,
        'published'       =>$request->published,
        'published_at'    =>$request->published_,
        'type'            =>$request->type,
        'visibility'      =>$request->visibility,
    ]);
/** New Post Post Category.*/
    // Get the selected values from Category checkboxes array
    $selectedCategoryValues = $request->input('category', []);
    PostCategory::create([
        
        

    ]);
/** New Post Post Tag.*/
    // Get the selected values from Tag checkboxes array
     $selectedTagValues = $request->input('tag', []);
    PostTag::create([
       
    ]);
/** New Post Post Meta.*/
    PostMeta::create([
       
    ]);
        
        
      


        $post->meta_title  = $request->meta_title;

        $post->save();
       // dd($tag->id);
       // var_dump($tag);
        return back()->withInput()->with(['success' => 'post saved sucessfully.']);
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
