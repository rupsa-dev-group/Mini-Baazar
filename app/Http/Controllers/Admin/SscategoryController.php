<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;

use App\Models\Admin\Sscategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;

class SscategoryController extends Controller
{

    public function index()
    {

        $result['ss_category']=DB::table('sscategories')
        -> leftJoin('mcategories','sscategories.mcategory_id','=','mcategories.id')
        -> leftJoin('scategories','sscategories.scategory_id','=','scategories.id')
        ->select('sscategories.*','mcategories.name','scategories.s_name')
        ->orderBy('id', 'DESC')
        ->get();
    //    dd( $result['ss_category']);
        return view('admin.categories.subsubcategories.managecategories',$result);
    }

    public function add_views($id = '')
    {

        if ($id != null) {

            $id = decrypt($id);



        }
        if ($id > 0) {
            $arr = DB::table('sscategories')->where(['id' => $id])->get();
            $result['category'] = DB::table('mcategories')->get();
            $result['scategory'] = DB::table('scategories')->get();
            $result['ss_name'] = $arr['0']->ss_name;
            $result['mcategory_id'] = $arr['0']->mcategory_id;
            $result['scategory_id'] = $arr['0']->scategory_id;
            $result['ss_slug'] = $arr['0']->ss_slug;
            $result['id'] = $arr['0']->id;
            $result['btn'] = "Update Category";
            $result['header'] = "Update Sub Sub Categories";
        } else {
            $result['category'] = DB::table('mcategories')->get();
            $result['scategory'] = DB::table('scategories')->get();
            $result['name'] = '';
            $result['mcategory_id'] = 0;
            $result['scategory_id'] = 0;  
            $result['id'] = 0;
            $result['btn'] = "Add Category";
            $result['header'] = "Add Sub Sub Categories";

        }


        return view('admin.categories.subsubcategories.addcategories', $result);
    }

    public function onchange_category(Request $request)
    {

        if ($request->id) {
            $result['subcategory'] = DB::table('scategories')
                ->where(['mcategory_id' => $request->id])
                ->get();
            //    print_r( $result['subcategory']);
            //     die();
                
            $html = '<div class="col-md-12">
               <label for="inputFirstName" class="form-label">Sub Categorie Name</label>
               <select class="form-select" name="scategory_id" aria-label="select example">
              <option value="">Open this select category</option>         
              ';
            foreach ($result['subcategory'] as $list) {
                $html .= '<option value="' . $list->id . '">  ' . $list->s_name . '
          </option>';
            }

            $html .= '</select></div>';
            return $html;

        }

    }



    
    public function save(Request $request)
    {

        
        $request->validate([
            'ss_name' => 'required',
            'ss_slug' => 'required',
            'mcategory_id' => 'required',
            'scategory_id' => 'required'
           
        ]);
        
        if ($request->post('id') > 0) {
            $model = Sscategory::find($request->post('id'));
            $msg = "Sub Sub Categories updated successfully";
        } else {
            $model = new Sscategory();
            
            $msg = "Sub Sub  Categories inserted successfully";
        }

        

       
       
        $model->mcategory_id = $request->mcategory_id;
        $model->scategory_id = $request->scategory_id;
        $model->ss_name = $request->ss_name;
        $model->ss_slug = $request->ss_slug;
        $model->save();

        $request->session()->flash('message', $msg);
        return redirect('/subsubcategories');
    }
    public function status_update(Request $request){
        DB::table('sscategories')->where('id',$request->id)->update(array(
            'status'=>$request->status
         ));        

    }

    
    public function sscategory_delete(Request $request)
    {
        $id = $request->id;
        
        if ($id > 0) {
    
            // Delete the category from the database
            DB::table('sscategories')->where('id', $id)->delete();
        }
    
       
    }
}
