<?php

namespace App\Http\Controllers;
use \App\Category;
use \App\Productdetail;
use DB;
use Illuminate\Http\Request;

class productcontroller extends Controller
{
    public function addProduct(){
    	//return view('dynamic_dependent')->with('country_list', $country_list);
    	$categorylist= Category::all();
    	return view('admin/addProductForm')->with('categorylist',$categorylist);
    }

    public function fetchproduct(Request $request){
 		$category = $request->get('category');
  
     	$data = DB::table('products')
       	->where('category_id', $category)
       	->get();


      	echo '<option value="">===Select product===</option>';
        foreach ($data as $value) {
         echo '<option value="'.$value->id.'" >'.$value->product_name.'</option>';
         }
    }

    public function store(Request $request){

    	$data = new Productdetail;
        
        $warrenty=DB::table('products')
        ->where('id',$request->product)
        ->value('warrenty');
        $whole = floor($warrenty);
        $fraction = $warrenty - $whole;
		$date = date('Y-m-d');
		$time = strtotime($date);
		
		if($fraction==0.5){
			$year = date('Y-m-d', strtotime("+$whole months", strtotime($date)));
			$tomonth = strtotime($year);
			$final = date("Y-m-d", strtotime("+15 day", $tomonth));
			$warrenty_ends = date("d/m/Y", strtotime($final));

		}else{
			$final = date("Y-m-d", strtotime("+$warrenty month", $time));
			$warrenty_ends = date("d/m/Y", strtotime($final));

		}
		
	
    	$data->product_id = $request->product;
    	$data->product_id = $request->product;
    	$data->code = $request->code;
    	$data->warrenty_started = date("d/m/Y", strtotime($date));;
    	$data->warrenty_ends = $warrenty_ends;
    	$data->save();
    	return redirect('/products')->with('success','Product added successfully');

    	
    }

    public function checkduplicate(Request $request){
    	$code = $request->get('code');
    	$check = DB::table('productdetails')
    	->where('code',$code)
    	->value('code');
    	if($check==$code && $code!=""){
    		echo "This code is not unique and already exists.!";
    	}
    }

    public function checkproduct(Request $request){
    	return view('customer/checkform');
    }

    public function showresult(Request $request){
        request()->validate([
            'code' => 'required',
        ]);
        
    	$code = $request->code;
    	$data['check']= DB::table('productdetails')
    	->select('category_name','product_name','warrenty_started','warrenty_ends')
    	->join('products', 'productdetails.product_id', '=', 'products.id')
    	->join('categories', 'products.category_id', '=', 'categories.id')
    	->where('code',$code)
    	->first();
    	if($data['check']==null){
    		$data['hit']="yes";
    	}


    	return view('customer/checkForm')->with($data);
    	

    }

    public function allproducts(){
    	$data = Productdetail::orderBy('id','desc')->get();   
    	return view('admin/allproduct',compact('data'));
    }
}
