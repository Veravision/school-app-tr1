<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\SubMenu;
use App\Models\MenuItem;
use App\Models\MenuCategory;

class SubMenuCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        // $fetchAllSubMenu = SubMenu::orderBy('sub_menu_position')->get();
        // $fetchAllMenuItem = MenuItem::all(); 
        // return view('pages.sub-menu')->with(['allSubMenu'=>$fetchAllSubMenu,'allMenuItem'=>$fetchAllMenuItem]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        $fetchMenu = MenuItem::orderBy('menu_position')->get();
        $fetchAllSubMenu = SubMenu::orderBy('sub_menu_position')->get();
        return view('pages.sub-menu')->with(["allMenu"=>$fetchMenu, "allSubMenu"=>$fetchAllSubMenu]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function get_category(Request $request) {
        $fetchAllMenuCategory = MenuCategory::where('menu_id', $request->menu_id)->get();
        return response()->json([
            'status' => 200,
            'success' => 'Record fetched successfully',
            'data' => $fetchAllMenuCategory,
        ]);
    }
    public function get_category_2(Request $request) {
        $fetchAllMenuCategory = MenuCategory::where('menu_id', $request->menu_id)
                                            ->where('menu_cat_status','1')
                                            ->orderBy('menu_cat_position')
                                            ->get();
        return response()->json([
            'status' => 200,
            'success' => 'Record fetched successfully',
            'data' => $fetchAllMenuCategory,
        ]);
    }
    
    public function store(Request $request)
    {
        //
        $request->validate([
            'sub_menu_title'        =>'required|max:255|unique:sub_menus,sub_menu_title',
            'menu_item'             =>'required',
            // 'menu_category'         =>'nullable',
            'sub_menu_route'       =>'required',
            'sub_menu_slug'        =>'required',
            'sub_menu_position'    =>'nullable',
            'sub_menu_status'      =>'sometimes', 'numeric','min:1',
        ]);
        SubMenu::create([
            'sub_menu_title'        =>$request->sub_menu_title,
            'menu_id'               =>$request->menu_item,
            // 'menu_category_id'      =>$request->menu_category,
            'sub_menu_route'       =>$request->sub_menu_route,
            'sub_menu_slug'        =>$request->sub_menu_slug,
            'sub_menu_position'    =>$request->sub_menu_position,
            'sub_menu_status'      =>(isset($request->sub_menu_status))? $request->sub_menu_status:0,
        ]);
        return back()->withIpute()->with(['success'=>"Sub menu has been created successfully."]);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
        // $id=decrypt($id);
        // $fetchMenuItem=MenuItem::where("id",$id)->get();
        // $fetchMenu = MenuItem::orderBy('menu_position')->get();
        // return view('pages.sub-menu')->with(["menuItem"=>$fetchMenuItem, "allMenu"=>$fetchMenu]);
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
