<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sscategory extends Model
{
    use HasFactory;
    protected $fillable=[
        'ss_name',
        'ss_slug',
        'status',
        
        
    ];
}
