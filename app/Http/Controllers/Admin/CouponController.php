<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin\Coupon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;

class CouponController extends Controller
{
   
    public function index()
    {
        $result['coupon']=DB::table('coupons')
        ->orderBy('id', 'DESC')
        ->get();

        return view('admin.coupon.managecoupon',$result);
    }

    public function add_views($id = '')
    {

        if ($id != null) {

            $id = decrypt($id);



        }
        if ($id > 0) {
             $arr=DB::table('coupons')->where(['id'=>$id])->get(); 
             $result['coupon_name']=$arr['0']->coupon_name;
             $result['coupon_code']=$arr['0']->coupon_code;
             $result['dis_type']=$arr['0']->dis_type;
             $result['discount']=$arr['0']->discount;
             $result['start_date']=$arr['0']->start_date;
             $result['end_date']=$arr['0']->end_date;
             $result['id']=$arr['0']->id;
             $result['btn'] = "Update Coupon";
             $result['header'] = "Update Coupon";
        } else {
            $result['coupon_name'] = '';
            $result['coupon_code'] = '';
            $result['dis_type'] = '';
            $result['discount'] = '';
            $result['start_date'] = '';
            $result['end_date'] = '';
            $result['id'] = 0;
            $result['btn'] = "Add Coupon";
            $result['header'] = "Add Coupon";

        }
        return view('admin.coupon.addcoupon',$result);
    }


    public function save(Request $request)
    {

  
        $request->validate([
            'coupon_name' => 'required',
            'coupon_code' => 'required',
            'dis_type' => 'required',
            'discount' => 'required',
            'start_date' => 'required',
            'end_date' => 'required',
            
        ]);
        
        if ($request->post('id') > 0) {
            $model = Coupon::find($request->post('id'));
            $msg = "Main Coupon updated successfully";
        } else {
            $model = new Coupon();
            
            $msg = "Main Coupon inserted successfully";
        }

        $model->coupon_name = $request->coupon_name;
        $model->coupon_code = $request->coupon_code;
        $model->dis_type = $request->dis_type;
        $model->discount = $request->discount;
        $model->start_date = $request->start_date;
        $model->end_date = $request->end_date;
        
        $model->save();

        $request->session()->flash('message', $msg);
        return redirect('/coupon');
    }

    public function status_update(Request $request){
        DB::table('coupons')->where('id',$request->id)->update(array(
            'status'=>$request->status
         ));        

    }

    
    public function coupon_delete(Request $request)
    {
        $id = $request->id;
        
        if ($id > 0) {
    
            // Delete the category from the database
            DB::table('coupons')->where('id', $id)->delete();
        }
    
       
    }

}
