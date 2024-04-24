<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SubMenu extends Model
{
    use HasFactory;
    protected $fillable =[
        'mid'           ,
        'mcatid'        ,
        'subm_title'    ,
        'subm_status'   ,
        'subm_position' , 
    ];
    
}
