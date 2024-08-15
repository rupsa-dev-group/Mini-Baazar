<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;

use App\Models\Admin\Manufacturer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;

class ManufacturerController extends Controller
{
   
    public function index()
    {
        $result['manufacturer']=DB::table('manufacturers')
        ->orderBy('id', 'DESC')
        ->get();
       

        return view('admin.manufacturer.managemanufacturer',$result);
    }

    public function add_views($id = '')
    {

        if ($id != null) {

            $id = decrypt($id);



        }
        if ($id > 0) {
             $arr=DB::table('manufacturers')->where(['id'=>$id])->get(); 

             $result['brand']=$arr['0']->brand;
             $result['image']=$arr['0']->image;
             $result['id']=$arr['0']->id;
             $result['btn'] = "Update Manufacturer";
             $result['header'] = "Update  Manufacturer";
        } else {
            $result['brand'] = '';
            $result['image'] = '';
            $result['id'] = 0;
            $result['btn'] = "Add Manufacturer";
            $result['header'] = "Add Manufacturer";

        }
        //   return view('admin.add_banner',$result);

        return view('admin.manufacturer.addmanufacturer',$result);
    }
    public function save(Request $request)
    {
        if ($request->post('id') > 0) {
            $request->validate([
                'image' => 'mimes:jpeg,jpg,png|max:300'
            ]);
        } else {
            $request->validate([
                'brand' => 'required', 
                'image' => 'required|mimes:jpeg,jpg,png|max:300'
            ]);
        }

        if ($request->post('id') > 0) {
            $model = Manufacturer::find($request->post('id'));
            $msg = "Main Brand updated successfully";
        } else {
            $model = new Manufacturer();
            
            $msg = "Main Brand inserted successfully";
        }

        if ($request->hasFile('image')) {
            // Check if an image already exists for this entry and delete it
            if ($request->post('id') > 0) {
                $existingImage = $model->image;
                
                if ($existingImage && File::exists(public_path('images/brand/' . $existingImage))) {
                    File::delete(public_path('images/brand/' . $existingImage));
                }
            }

            // Save the new image
            $imageName = time() . '.' . $request->image->extension();
            $request->image->move(public_path('images/brand'), $imageName);
            $model->image = $imageName;
        }
       
        $model->brand = $request->brand;
      
        $model->save();

        $request->session()->flash('message', $msg);
        return redirect('/manufacturer');
    }

    public function status_update(Request $request){
        DB::table('manufacturers')->where('id',$request->id)->update(array(
            'status'=>$request->status
         ));        

    }

    
    public function manufacturer_delete(Request $request)
    {
        $id = $request->id;
        
        if ($id > 0) {
            // Retrieve the existing image
            $existingImage = DB::table('manufacturers')->where('id', $id)->value('image');
    
            // Check if the image exists and delete it
            if ($existingImage && File::exists(public_path('images/brand/' . $existingImage))) {
                File::delete(public_path('images/brand/' . $existingImage));
            }
    
            // Delete the category from the database
            DB::table('manufacturers')->where('id', $id)->delete();
        }
    
       
    }

    
}
