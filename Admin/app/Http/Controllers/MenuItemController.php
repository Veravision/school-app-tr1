<?php

namespace App\Http\Controllers;

use App\Models\MenuItem;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class MenuItemController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $fetchMenu = MenuItem::where('is_delete','0')->orderBy('menu_position')->get();
        return view('pages.menu-items')->with(['allMenu' => $fetchMenu]);
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
            "menu_title"    => ['required', 'max:255', 'unique:menu_items,menu_title'],
            "menu_route"    => ['required', 'max:255'],
            "menu_slug"     => ['required', 'max:255'],
            "menu_position" => ['nullable'],
            "menu_status"   => ['required'],
        ]);

        $menu = new MenuItem;

        $menu->menu_title       = $request->menu_title;
        $menu->menu_route       = $request->menu_route;
        $menu->menu_slug        = $request->menu_slug;
        $menu->menu_position    = $request->menu_position;
        $menu->menu_status      = $request->menu_status;

        $menu->save();
        // dd($request);
       // var_dump($menu);
        return back()->withInput()->with(['success' => 'Great! Menu item added sucessfully.']);
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        //
        $id=decrypt($id);
        $fetchMenuItem=MenuItem::where("id",$id)->where('is_delete','0')->first();///////////////////////////
        $fetchMenu = MenuItem::where('is_delete','0')->orderBy('menu_position')->get();/////////////////////

        return view('pages.sub-menu')->with(["menuItem"=>$fetchMenuItem, "allMenu"=>$fetchMenu]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(MenuItem $menueItem)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request)
    {
        //
        $validator = Validator::make($request->all(), [
            "menu_title"    => ['required', 'max:255', 'unique:menu_items,menu_title,'.$request->menu_id.',id'],
            "menu_route"    => ['required', 'max:255'],
            "menu_slug"     => ['required', 'max:255'],
            "menu_position" => ['nullable'],
            "menu_status"   => ['required'],
        ]);

        if($validator->fails()){
            return response()->json([
                'status'=> 422,
                'error'=> $validator->messages()
            ]);
        }
        $menu = MenuItem::find($request->menu_id);

        $menu->menu_title       = $request->menu_title;
        $menu->menu_route       = $request->menu_route;
        $menu->menu_slug        = $request->menu_slug;
        $menu->menu_position    = $request->menu_position;
        $menu->menu_status      = $request->menu_status;

        $menu->save();
        return response()->json([
            'status'=> 200,
            'message'=> "Record updated successfully.",
            'menu' => $menu,    
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(String $id)
    {
        //
        $menuItem = MenuItem::find($id);
        $menuItem->is_delete = "1";
        $menuItem->save();
        if ($menuItem->save() == true){
            return back()->with(['success'=>'Menu item deleted successfully.']);
        }
        else{
            return back()->with(['error'=>'Cannot delete menu item.']);
        }
    }
}
