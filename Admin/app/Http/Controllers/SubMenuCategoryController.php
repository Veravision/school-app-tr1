<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\SubMenu;
use App\Models\MenuItem;

class SubMenuCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $fetchAllSubMenu = SubMenu::orderBy('sub_menu_position')->get();
        $fetchAllMenuItem = MenuItem::all(); 
        return view('pages.sub-menu')->with(['allSubMenu'=>$fetchAllSubMenu,'allMenuItem'=>$fetchAllMenuItem]);
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
        $request->validate([
            'sub_menu_title'        =>'required|max:255|unique:sub_menus,sub_menu_title',
            'menu_item'             =>'required',
            'menu_category'         =>'nullable',
            'sub_menu__route'       =>'required',
            'sub_menu__slug'        =>'required',
            'sub_menu__position'    =>'nullable',
            'sub_menu__status'      =>'sometimes', 'numeric','min:1',
        ]);
        Submenu::create([
            'sub_menu_title'        =>$request->sub_menu_title,
            'menu_id'               =>$request->menu_item,
            'menu_category_id'      =>$request->menu_category,
            'sub_menu__route'       =>$request->sub_menu__route,
            'sub_menu__slug'        =>$request->sub_menu__slug,
            'sub_menu__position'    =>$request->sub_menu__position,
            'sub_menu__status'      =>(isset($request->sub_menu__status))? $request->sub_menu__status:0,
        ]);
        return back()->withIpute()->with(['success'=>"Sub menu has been created successfully."]);
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
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
