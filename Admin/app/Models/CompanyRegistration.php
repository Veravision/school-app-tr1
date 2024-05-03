<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CompanyRegistration extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'abbreviation',
        'motto',
        'cac_number',
        'industry',
        'address',
        'country',
        'city',
        'zip_code',
        'phone_number',
        'office_number',
        'whatsapp_number',
        'email',
        'instagram_handle',
        'facebook_page',
        'owner_first_name',
        'owner_last_name',
        'owner_phone_number',
        'owner_email',
        'photo_path',
        'status',

    ];
}
