<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Productoptions extends Model
{
    use HasFactory;
    protected $fillable=[
        'option_name',
        'option_type',
        'status',  
    ];
}
