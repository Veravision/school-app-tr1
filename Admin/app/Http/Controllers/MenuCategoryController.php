<?php

namespace App\Http\Controllers;

use App\Models\MenuCategory;
use Illuminate\Http\Request;
use App\Models\MenuItem;

class MenuCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $fetchAllMenuItem = MenuItem::all()->where('is_delete','0');
        $fetchAllMenuCategory = MenuCategory::where('is_delete','0')->orderBy('menu_cat_position')->get();

        return view('pages.menu-category')->with(['allMenuCategory' => $fetchAllMenuCategory,'allMenuItem'=>$fetchAllMenuItem]);
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
        $request -> validate([
            'menu_category_title'        => 'required|max:255',
            'menu_item'                  => 'required|max:255',
            'menu_category_position'     => 'nullable',
            'menu_category_status'       => 'nullable'
        ]);

        $menuCategory = new MenuCategory;
        $menuCategory->menu_cat_title       = $request->menu_category_title;
        $menuCategory->menu_id              = $request->menu_item;
        $menuCategory->menu_cat_position    = $request->menu_category_position;
        $menuCategory->menu_cat_status      = $request->menu_category_status;

        $menuCategory->save();
        return back()->withInput()->with(['success'=>'Great, menu category added successfully.']);
    }

    /**
     * Display the specified resource.
     */
    public function show(MenuCategory $menuCategory)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(MenuCategory $menuCategory)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request)
    {
        //
        $request -> validate([
            'menu_category_title'        => 'required|max:255',
            'menu_item'                  => 'required|max:255',
            'menu_category_position'     => 'nullable',
            'menu_category_status'       => 'nullable'
        ]);

        $menuCategory = MenuCategory::find($request->menu_category_id);
        $menuCategory->menu_cat_title       = $request->menu_category_title;
        $menuCategory->menu_id              = $request->menu_item;
        $menuCategory->menu_cat_position    = $request->menu_category_position;
        $menuCategory->menu_cat_status      = $request->menu_category_status;

        $menuCategory->save();
        return back()->withInput()->with(['success'=>'Record updated successfully.']);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        //
        // dd($id);
        $menuCategory = MenuCategory::find($id);
        $menuCategory->is_delete = "1";
        $menuCategory->save();
        if ($menuCategory->save() == true){
            // return "done";
            return back()->with(['success'=>'Menu Category deleted successfully.']);
        }
        else{
            // return "not done";
            return back()->with(['error'=>'Cannot delete menu Category.']);
        }
    }
}
