<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MenuCategory extends Model
{
    use HasFactory;
    protected $fillable = [
        'menu_id'           ,
        'menu_cat_title'    ,
        'menu_cat_status'   ,
        'menu_cat_position' ,
    ];
}
