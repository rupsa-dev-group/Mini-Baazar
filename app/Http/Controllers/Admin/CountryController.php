<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin\Country;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;

class CountryController extends Controller
{
    
    public function index()
    {
        $result['countries']=DB::table('countries')
        ->orderBy('id', 'DESC')
        ->get();
       

        return view('admin.system.country.managecountry',$result);
    }

    public function add_views($id = '')
    {

        if ($id != null) {

            $id = decrypt($id);



        }
        if ($id > 0) {
             $arr=DB::table('countries')->where(['id'=>$id])->get(); 

             $result['country']=$arr['0']->country;
             $result['image']=$arr['0']->image;
             $result['id']=$arr['0']->id;
             $result['btn'] = "Update Country";
             $result['header'] = "Update Country";
        } else {
            $result['country'] = '';
            $result['id'] = 0;
            $result['btn'] = "Add Country";
            $result['header'] = "Add Country";

        }

        return view('admin.system.country.addcountry',$result);

        
    }
    public function save(Request $request)
    {
        if ($request->post('id') > 0) {
            $request->validate([
                'image' => 'mimes:jpeg,jpg,png|max:300'
            ]);
        } else {
            $request->validate([
                'country' => 'required',
                'image' => 'required|mimes:jpeg,jpg,png|max:300'
            ]);
        }

        if ($request->post('id') > 0) {
            $model = Country::find($request->post('id'));
            $msg = "Main Country updated successfully";
        } else {
            $model = new Country();
            
            $msg = "Main Country inserted successfully";
        }

        if ($request->hasFile('image')) {
            // Check if an image already exists for this entry and delete it
            if ($request->post('id') > 0) {
                $existingImage = $model->image;
                
                if ($existingImage && File::exists(public_path('images/country/' . $existingImage))) {
                    File::delete(public_path('images/country/' . $existingImage));
                }
            }

            // Save the new image
            $imageName = time() . '.' . $request->image->extension();
            $request->image->move(public_path('images/country'), $imageName);
            $model->image = $imageName;
        }
       
        $model->country = $request->country;
        $model->save();

        $request->session()->flash('message', $msg);
        return redirect('/country');
    }

    public function status_update(Request $request){
        DB::table('countries')->where('id',$request->id)->update(array(
            'status'=>$request->status
         ));        

    }

    
    public function country_delete(Request $request)
    {
        $id = $request->id;
        
        if ($id > 0) {
            // Retrieve the existing image
            $existingImage = DB::table('countries')->where('id', $id)->value('image');
    
            // Check if the image exists and delete it
            if ($existingImage && File::exists(public_path('images/country/' . $existingImage))) {
                File::delete(public_path('images/country/' . $existingImage));
            }
    
            // Delete the category from the database
            DB::table('countries')->where('id', $id)->delete();
        }
    
       
    }
}
