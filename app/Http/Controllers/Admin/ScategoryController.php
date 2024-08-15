<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;

use App\Models\Admin\Scategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;

class ScategoryController extends Controller
{
    public function index()
    {    $result['s_category']=DB::table('scategories')
        -> leftJoin('mcategories','scategories.mcategory_id','=','mcategories.id')
        ->select('scategories.*','mcategories.name')
        ->orderBy('id', 'DESC')
        ->get();

        // dd($result['s_category']);
        
        return view('admin.categories.subcategories.managecategories',$result);
    }


    
    public function add_views($id = '')
    {

        if ($id != null) {

            $id = decrypt($id);



        }
        if ($id > 0) {
             $arr=DB::table('scategories')->where(['id'=>$id])->get(); 
             $result['category'] = DB::table('mcategories')->get();
             $result['s_name']=$arr['0']->s_name;
             $result['mcategory_id']=$arr['0']->mcategory_id;
             $result['s_slug']=$arr['0']->s_slug;
             $result['id']=$arr['0']->id;
             $result['btn'] = "Update Category";
             $result['header'] = "Update Sub Categories";
        } else {
            $result['category'] = DB::table('mcategories')->get();
            $result['name'] = '';
            $result['mcategory_id']= 0;
            $result['image'] = '';
            $result['id'] = 0;
            $result['btn'] = "Add Category";
            $result['header'] = "Add Sub Categories";

        }
        

        return view('admin.categories.subcategories.addcategories',$result);
    }

    public function save(Request $request)
    {

        
        $request->validate([
            's_name' => 'required',
            's_slug' => 'required',
            'mcategory_id' => 'required'
           
        ]);
        
        if ($request->post('id') > 0) {
            $model = Scategory::find($request->post('id'));
            $msg = "Main Categories updated successfully";
        } else {
            $model = new Scategory();
            
            $msg = "Main Categories inserted successfully";
        }

        

       
       
        $model->mcategory_id = $request->mcategory_id;
        $model->s_name = $request->s_name;
        $model->s_slug = $request->s_slug;
        $model->save();

        $request->session()->flash('message', $msg);
        return redirect('/subcategories');
    }

    
    public function status_update(Request $request){
        DB::table('scategories')->where('id',$request->id)->update(array(
            'status'=>$request->status
         ));        

    }

    
    public function mcategory_delete(Request $request)
    {
        $id = $request->id;
        
        if ($id > 0) {
    
            // Delete the category from the database
            DB::table('scategories')->where('id', $id)->delete();
        }
    
       
    }
}
