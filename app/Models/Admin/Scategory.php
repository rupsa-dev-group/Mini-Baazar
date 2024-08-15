<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Scategory extends Model
{
    use HasFactory;
    protected $fillable=[
        's_name',
        's_slug',
        'status',
        
        
    ];
}
