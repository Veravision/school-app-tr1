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
        return view('pages.menu-items');
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
