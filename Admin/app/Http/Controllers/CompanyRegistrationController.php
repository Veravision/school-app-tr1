<?php

namespace App\Http\Controllers;

use App\Models\CompanyRegistration;
use Illuminate\Http\Request;
use Illuminate\Support\Str;


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
        $fetchCompany = CompanyRegistration::first();
        $phoneNumberCollection = Str::of($fetchCompany->phone_number)->explode('_');
        $officeNumberCollection = Str::of($fetchCompany->office_number)->explode('_');
        $whatsappNumberCollection = Str::of($fetchCompany->whatsapp_number)->explode('_');
        $ownerPhoneNumberCollection = Str::of($fetchCompany->owner_phone_number)->explode('_');
        // dd($ownerPhoneNumberCollection);
        return view('pages.company')->with(['companyRecord'=>$fetchCompany,
        'phone_number_code'=>($fetchCompany->phone_number=="")?"":$phoneNumberCollection[0],
        'phone_number'=>($fetchCompany->phone_number=="")?"":$phoneNumberCollection[1],  
        'office_number_code'=>($fetchCompany->office_number=="")?"":$officeNumberCollection[0],
        'office_number'=>($fetchCompany->office_number=="")?"":$officeNumberCollection[1],
        'whatsapp_number_code'=>($fetchCompany->whatsapp_number=="")?"": $whatsappNumberCollection[0],
        'whatsapp_number'=>($fetchCompany->whatsapp_number=="")?"": $whatsappNumberCollection[1],
        'owner_phone_number_code'=>($fetchCompany->owner_phone_number=="")?"":$ownerPhoneNumberCollection[0],
        'owner_phone_number'=>($fetchCompany->owner_phone_number=="")?"":$ownerPhoneNumberCollection[1],
                                           ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        // dd($request);
        $request -> validate([
            'name'                  => ['required', 'max:255'],
            'abbreviation'          => ['nullable'],
            'motto'                 => ['nullable'],
            'cac_number'            => ['nullable', 'max:255'],
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
            'status'                => ['sometimes', 'numeric','min:1'],
            'filepond'              => 'nullable|image|extensions:jpeg,jpg,png,gif|min:1024|max:12288',
        ],
        [
            'name.unique' => "Company name has already been registered",
            'cac_number.unique' => "C.A.C number has already been registered",
        ]
    );

     if($request->hasFile('filepond')){
        $company_photo_path = $this->upload_file('logo/', $request->file('filepond'));
     }else{
         $company_photo_path ="";
     }
   // save record and return feedback msg
     CompanyRegistration::updateOrCreate(
        ['id' =>  1],
        [
         'name'                      =>$request->name,
         'abbreviation'              =>$request->abbreviation,
         'motto'                     =>$request->motto,
         'cac_number'                =>$request->cac_number,
         'industry'                  =>$request->industry,
         'address'                   =>$request->address,
         'country'                   =>$request->country,
         'city'                      =>$request->city,
         'zip_code'                  =>$request->zip_code,
         'phone_number'              =>$request->phone_number_code."_".$request->phone_number,
         'office_number'             =>$request->office_number_code."_".$request->office_number,
         'whatsapp_number'           =>$request->whatsapp_number_code."_".$request->whatsapp_number,
         'email'                     =>$request->email,
         'instagram_handle'          =>$request->instagram_handle,
         'facebook_page'             =>$request->facebook_page,
         'owner_first_name'          =>$request->owner_first_name,
         'owner_last_name'           =>$request->owner_last_name,
         'owner_phone_number'        =>$request->owner_phone_number_code."_".$request->owner_phone_number,
         'owner_email'               =>$request->owner_email,
         'status'                    =>(isset($request->status))? $request->status:0,  
         'photo_path'                =>$company_photo_path,
     ]);
     return back()->withInput()->with(['success' => 'Company is registered successfully!']);
        // try {
           
          
        // } catch (\Throwable $th) {
        //     //throw $th;
        //     return back()->with('error', 'Oops! A problem occured. Can not upload image.');
        // }

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
