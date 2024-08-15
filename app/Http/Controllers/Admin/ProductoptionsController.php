<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;

use App\Models\Admin\Productoptions;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;


class ProductoptionsController extends Controller
{
    public function index()
    {
        $result['options']=DB::table('productoptions')
        ->orderBy('id', 'DESC')
        ->get();
        return view('admin.options.manageoptions',$result);
    }

   
    public function add_views($id = '')
    {

        if ($id != null) {

            $id = decrypt($id);



        }
        if ($id > 0) {
             $arr=DB::table('productoptions')->where(['id'=>$id])->get(); 

             $result['option_name']=$arr['0']->option_name;
             $result['option_type']=$arr['0']->option_type;
             $result['id']=$arr['0']->id;
             $result['btn'] = "Update Option";
             $result['header'] = "Update Option";
        } else {
            $result['option_name'] = '';
            $result['option_type'] = '';
            $result['id'] = 0;
            $result['btn'] = "Add Option";
            $result['header'] = "Add Option";

        }
        return view('admin.options.addoptions',$result);
    }


    public function save(Request $request)
    {

        
        $request->validate([
            'option_name' => 'required',
            'option_type' => 'required', 
        ]);
        
        if ($request->post('id') > 0) {
            $model = Productoptions::find($request->post('id'));
            $msg = "Main Categories updated successfully";
        } else {
            $model = new Productoptions();
            
            $msg = "Main Categories inserted successfully";
        }

        

       
       
     
        $model->option_name = $request->option_name;
        $model->option_type= $request->option_type;
        $model->save();

        $request->session()->flash('message', $msg);
        return redirect('/options');
    }

    public function status_update(Request $request){
        DB::table('productoptions')->where('id',$request->id)->update(array(
            'status'=>$request->status
         ));        

    }

    
    public function option_delete(Request $request)
    {
        $id = $request->id;
        
        if ($id > 0) {
    
            // Delete the category from the database
            DB::table('productoptions')->where('id', $id)->delete();
        }
    
       
    }


}
