<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function manageProduct(){

        return view('admin.products.manage_product');
    }


    public function addProduct(){

        return view('admin.products.add_product');
    }
}
