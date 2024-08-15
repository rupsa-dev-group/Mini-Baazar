<?php
use Illuminate\Support\Facades\DB;
function prx($arr){
    echo "<pre>";
    print_r($arr);
    die();
}
 
function layout(){
  $result=DB::table('settings')               
  ->get();
  return  $result;
  
}

function getTopNavCat(){
  $categories=DB::table('categories')   
       ->where(['status'=>1])             
       ->get();
  $subcategories=DB::table('subcategories')   
       ->where(['status'=>1])             
       ->get();           
       

  $str=buildTreeView( $categories, $subcategories);
  return $str;
}

$html='';
function buildTreeView($categories,$subcategories){
global $html;
$html.='<ul>';
foreach ($categories as $cat) {
  $url=url("/multiple_product/".encrypt($cat->category_name));
  $html.='<li><span><a href="'.$url.'">'.$cat->category_name.'</a></span><ul>';
  foreach($subcategories as $sub){
   
    if($sub->category_id == $cat->id){
      $url=url("/multiple_product/".encrypt($sub->subcategory_name));
      $html.='
    
          <li><a href="'.$url.'">'.$sub->subcategory_name.'</a></li>
     
     ';

    }

   
  }
  $html.=' </ul></li>';
}
$html.='</ul>';
return $html;
}


function getUserTempId(){
	if(!session()->has('USER_TEMP_ID')){
		$rand=rand(111111111,999999999);
		session()->put('USER_TEMP_ID',$rand);
		return $rand;
	}else{
		return session()->get('USER_TEMP_ID');
	}
}

function getAddToCartTotalItem(){
	if(session()->has('FRONT_USER_LOGIN')){
		$uid=session()->get('FRONT_USER_ID');
		$user_type="Reg";
	}else{
		$uid=getUserTempId();
		$user_type="Not-Reg";
	}
  $result=DB::table('add_to_carts')
  ->leftJoin('products','products.id','=','add_to_carts.product_id')  
  ->where(['user_id'=>$uid])
  ->where(['user_type'=>$user_type])
  ->select('add_to_carts.qty','products.product_title','products.front_image','products.original_price','products.shipping_charge','products.id as pid',)
  ->get(); 

	return $result;
   
}


function getcatagory(){
  
  $category_show=DB::table('categories') 
  ->where(['status'=>1])
  ->get();
  
  return $category_show;

}

function total_rating($id){

  // echo $id;
  // die();
  
  $query['rating']=DB::table('reviews')
  ->where('pid', $id)
  ->get();

  $query['rating1']=DB::table('reviews')
  ->where('rating', 1)
  ->where('pid', $id)
  ->get();

  $query['rating2']=DB::table('reviews')
  ->where('rating', 2)
  ->where('pid', $id)
  ->get();

  $query['rating3']=DB::table('reviews')
  ->where('rating', 3)
  ->where('pid', $id)
  ->get();

  $query['rating4']=DB::table('reviews')
  ->where('rating', 4)
  ->where('pid', $id)
  ->get();

  $query['rating5']=DB::table('reviews')
  ->where('rating', 5)
  ->where('pid', $id)
  ->get();


  $rating1 =$query['rating1']->count()*1;
  $rating2 =$query['rating2']->count()*2;
  $rating3 =$query['rating3']->count()*3;
  $rating4 =$query['rating4']->count()*4;
  $rating5 =$query['rating5']->count()*5;
  $rating=$query['rating']->count();

  $total_rating= ($rating1+$rating2+$rating3+$rating4+$rating5);
  if( $total_rating==0){
    $query=1;
 }else{
    $query=floor($total_rating/ $rating);
 }
  return  $query;
}

?>

<?php
use Illuminate\Support\Facades\DB;

function pre($arr)
{
    echo "<pre>";
    print_r($arr);
    die();
}

function getTopNavCat()
{

    $categories = DB::table('mcategories')
        ->where(['status' => 1])
        ->get();
    $scategories = DB::table('scategories')
        ->where(['status' => 1])
        ->get();

    // $sscategories = DB::table('sscategories')
    //     ->where(['status' => 1])
    //     ->get();
// pre($categories);

    $str = buildTreeView($categories, $scategories);
    return $str;

}
function buildTreeView($categories,$subcategories){
    global $html;
    $html.='<ul>';
    foreach ($categories as $cat) {
      $url=url("/multiple_product/".encrypt($cat->name));
      $html.='<li><span><a href="'.$url.'">'.$cat->name.'</a></span><ul>';
      foreach($subcategories as $sub){
       
        if($sub->mcategory_id == $cat->id){
          $url=url("/multiple_product/".encrypt($sub->s_name));
          $html.='
        
              <li><a href="'.$url.'">'.$sub->s_name.'</a></li>
         
         ';
    
        }
    
       
      }
      $html.=' </ul></li>';
    }
    $html.='</ul>';
    return $html;
    }

?>

<div class="categori-dropdown-wrap categori-dropdown-active-large">
                        {{-- #This Function use to navigation Bar and adderss is app\Halpers\common.php --}}
                     {!!getTopNavCat()!!}

                    </div>