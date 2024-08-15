<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;

use App\Models\Admin\Mcategory;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class McategoryController extends Controller
{

    public function index()
    {
        $result['m_category'] = DB::table('mcategories')
            ->orderBy('id', 'DESC')
            ->get();


        return view('admin.categories.maincategories.managecategories', $result);
    }

    public function add_views($id = '')
    {

        if ($id != null) {

            $id = decrypt($id);



        }
        if ($id > 0) {
            $arr = DB::table('mcategories')->where(['id' => $id])->get();

            $result['name'] = $arr['0']->name;
            $result['slug'] = $arr['0']->slug;
            $result['image'] = $arr['0']->image;
            $result['id'] = $arr['0']->id;
            $result['btn'] = "Update Category";
            $result['header'] = "Update Main Categories";
        } else {
            $result['name'] = '';
            $result['image'] = '';
            $result['id'] = 0;
            $result['btn'] = "Add Category";
            $result['header'] = "Add Main Categories";

        }
        //   return view('admin.add_banner',$result);

        return view('admin.categories.maincategories.addcategories', $result);
    }
    public function save(Request $request)
    {
        if ($request->post('id') > 0) {
            $request->validate([
                'image' => 'mimes:jpeg,jpg,png|max:300'
            ]);
        } else {
            $request->validate([
                'name' => 'required',
                'slug' => 'required',
                'image' => 'required|mimes:jpeg,jpg,png|max:300'
            ]);
        }

        if ($request->post('id') > 0) {
            $model = Mcategory::find($request->post('id'));
            $msg = "Main Categories updated successfully";
        } else {
            $model = new Mcategory();

            $msg = "Main Categories inserted successfully";
        }

        if ($request->hasFile('image')) {
            // Check if an image already exists for this entry and delete it
            if ($request->post('id') > 0) {
                $existingImage = $model->image;

                if ($existingImage && File::exists(public_path('images/category/' . $existingImage))) {
                    File::delete(public_path('images/category/' . $existingImage));
                }
            }

            // Save the new image
            $imageName = time() . '.' . $request->image->extension();
            $request->image->move(public_path('images/category'), $imageName);
            $model->image = $imageName;
        }

        $model->name = $request->name;
        $model->slug = $request->slug;
        $model->save();

        $request->session()->flash('message', $msg);
        return redirect('/maincategories');
    }

    public function status_update(Request $request)
    {
        DB::table('mcategories')->where('id', $request->id)->update(
            array(
                'status' => $request->status
            )
        );

    }


    public function mcategory_delete(Request $request)
    {
        $id = $request->id;

        if ($id > 0) {
            // Retrieve the existing image
            $existingImage = DB::table('mcategories')->where('id', $id)->value('image');

            // Check if the image exists and delete it
            if ($existingImage && File::exists(public_path('images/category/' . $existingImage))) {
                File::delete(public_path('images/category/' . $existingImage));
            }

            // Delete the category from the database
            DB::table('mcategories')->where('id', $id)->delete();
        }


    }

  
    public function search(Request $request)
    {
        $query = $request->input('query');
    
        $products = Mcategory::where('name', 'LIKE', "%{$query}%")->get();
    
        // Add full URL for image
        $products->transform(function ($product) {
            $product->image_url = asset('images/category/' . $product->image_url);
            return $product;
        });
    
        return response()->json($products);
    }
    



}
