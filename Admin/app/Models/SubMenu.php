<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SubMenu extends Model
{
    use HasFactory;
    protected $fillable =[
        'menu_id',
        'menu_category_id',
        'sub_menu_title',
        'sub_menu_route',
        'sub_menu_slug',
        'sub_menu_status',
        'sub_menu_position', 
    ];
    
}
