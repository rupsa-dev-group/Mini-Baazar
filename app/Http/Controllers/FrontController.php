<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\ProfileUpdateRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;
use Illuminate\Support\Facades\DB;
class FrontController extends Controller
{
    public function index(Request $request): View
    {
        $result['categories'] = DB::table('mcategories')
            ->where(['status' => 1])
            ->orderBy('id','asc')
            ->get();

            $result['manufacturer'] = DB::table('manufacturers')
            ->where(['status' => 1])
            ->orderBy('id','asc')
            ->get();
    
        $result['subcategories'] = DB::table('scategories')
            ->where(['status' => 1])
            ->get();
    
        $result['user'] = $request->user();
       
        
        return view('user.index', $result);
    }

    public function about_us(){

        return view('user.about_us');
    }
    public function delivery_information(){

        return view('user.delivery_information');
    }
    public function privacy_policy(){

        return view('user.privacy_policy');
    }
    public function terms_conditions(){

        return view('user.terms_conditions');
    }
    
    public function contact_us(){

        return view('user.contact_us');
        
    }
    
}
