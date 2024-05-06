<?php

namespace App\Http\Controllers;

use App\Models\CompanyRegistration;
use Illuminate\Http\Request;
use Illuminate\Validation\Rules\File;


class CompanyRegistrationController extends Controller
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
        return view('pages.company');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        // dd($request);
        $request -> validate([
            'name'                  => ['required', 'max:255', 'unique:company_registrations,name'],
            'abbreviation'          => ['nullable'],
            'motto'                 => ['nullable'],
            'cac_number'            => ['nullable', 'max:255', 'unique:company_registrations,cac_number'],
            'industry'              => ['required'],
            'address'               => ['required'],
            'country'               => ['required'],
            'city'                  => ['required'],
            'zip_code'              => ['nullable'],
            'phone_number'          => ['required'],
            'office_number'         => ['required'],
            'whatsapp_number'       => ['nullable'],
            'email'                 => ['required'],
            'instagram_handle'      => ['nullable'],
            'facebook_page'         => ['nullable'],
            'owner_first_name'      => ['required'],
            'owner_last_name'       => ['required'],
            'owner_phone_number'    => ['required'],
            'owner_email'           => ['required'],
            'status'                => ['nullable'],
           'filepond'               => ['extensions:jpg,jpeg,png','mimes:jpg,jpeg,png', 'min:1024', 'max:12288']
        ],
        [
            'name.unique' => "Company name has already been registered",
            'cac_number.unique' => "C.A.C number has already been registered",
        ]
    );


    }

    /**
     * Display the specified resource.
     */
    public function show(CompanyRegistration $companyRegistration)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(CompanyRegistration $companyRegistration)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, CompanyRegistration $companyRegistration)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(CompanyRegistration $companyRegistration)
    {
        //
    }

    protected function upload_file($destination_path='extra/', $file){
        // create a new file name
        $filename = "comp".rand(1111, 9999)."_".strtotime(now()).".".$file->extension();
        $file->move(public_path($destination_path), $filename);
        $newFilePath = asset($destination_path.$filename);

        return $newFilePath;
    }
}
