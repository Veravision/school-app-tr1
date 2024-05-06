<?php

namespace App\Http\Controllers;

use App\Models\MenuItem;
use Illuminate\Http\Request;

class MenuItemController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $fetchMenu = MenuItem::orderBy('menu_position')->get();
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
            "menu_slog"     => ['required', 'max:255'],
            "menu_position" => ['nullable'],
            "menu_status"   => ['required'],
        ]);

        $menu = new MenuItem;

        $menu->menu_title       = $request->menu_title;
        $menu->menu_route       = $request->menu_route;
        $menu->menu_slug        = $request->menu_slog;
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
    public function show(MenueItem $menueItem)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(MenueItem $menueItem)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, MenueItem $menueItem)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(MenueItem $menueItem)
    {
        //
    }
}
