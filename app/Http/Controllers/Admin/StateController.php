<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;

use App\Models\Admin\State;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;

class StateController extends Controller
{
    public function index()
    {
        $result['states']=DB::table('states')
        ->orderBy('id', 'DESC')
        ->get();
       

        return view('admin.system.state.managestate',$result);
    }

    public function add_views($id = '')
    {

        if ($id != null) {

            $id = decrypt($id);



        }
        if ($id > 0) {
             $arr=DB::table('states')->where(['id'=>$id])->get(); 
             $result['state_name']=$arr['0']->state_name;
             $result['country']=DB::table('countries')->get(); 
             $result['country_id'] =$arr['0']->country_id;
             $result['image']=$arr['0']->image;
             $result['price']=$arr['0']->price;
             $result['id']=$arr['0']->id;
             $result['btn'] = "Update State";
             $result['header'] = "Update State";
        } else {
            $result['country_id'] = '';
            $result['state_name'] = '';
            $result['price'] = '';
            $result['country']=DB::table('countries')->get(); 
            $result['id'] = 0;
            $result['btn'] = "Add State";
            $result['header'] = "Add State";

        }

        return view('admin.system.state.addstate',$result);

        
    }
    public function save(Request $request)
    {
        if ($request->post('id') > 0) {
            $request->validate([
                'image' => 'mimes:jpeg,jpg,png|max:300'
            ]);
        } else {
            $request->validate([
                'country_id' => 'required',
                'state_name' => 'required',
                'price' => 'required',
                'image' => 'required|mimes:jpeg,jpg,png|max:300'
            ]);
        }

        if ($request->post('id') > 0) {
            $model = State::find($request->post('id'));
            $msg = "Main State updated successfully";
        } else {
            $model = new State();
            
            $msg = "Main State inserted successfully";
        }

        if ($request->hasFile('image')) {
            // Check if an image already exists for this entry and delete it
            if ($request->post('id') > 0) {
                $existingImage = $model->image;
                
                if ($existingImage && File::exists(public_path('images/state/' . $existingImage))) {
                    File::delete(public_path('images/state/' . $existingImage));
                }
            }

            // Save the new image
            $imageName = time() . '.' . $request->image->extension();
            $request->image->move(public_path('images/state'), $imageName);
            $model->image = $imageName;
        }
       
        $model->country_id = $request->country_id;
        $model->state_name= $request->state_name;
        $model->price= $request->price;
        $model->save();

        $request->session()->flash('message', $msg);
        return redirect('/state');
    }

    public function status_update(Request $request){
        DB::table('states')->where('id',$request->id)->update(array(
            'status'=>$request->status
         ));        

    }

    
    public function state_delete(Request $request)
    {
        $id = $request->id;
        
        if ($id > 0) {
            // Retrieve the existing image
            $existingImage = DB::table('states')->where('id', $id)->value('image');
    
            // Check if the image exists and delete it
            if ($existingImage && File::exists(public_path('images/state/' . $existingImage))) {
                File::delete(public_path('images/state/' . $existingImage));
            }
    
            // Delete the category from the database
            DB::table('states')->where('id', $id)->delete();
        }
    
       
    }
}
