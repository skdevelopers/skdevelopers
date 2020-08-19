<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use DB;
use Image;
use Session;
use App\Category;
use App\Product;
use App\ProductsAttribute;

class ProductsController extends Controller
{
    public function addProduct(Request $request){

    	if($request->isMethod('post')){
    		$data = $request->all(); //dd($data);
    		$product = new Product;
    		$product->category_id = $data['category_id'];
    		$product->product_name = $data['product_name'];
    		$product->product_code = $data['product_code'];
    		$product->product_color = $data['product_color'];
    		$product->description = $data['description'];
    		$product->price = $data['price'];

    		//image upload 
    		if($request->hasFile('image')){
    			$image_temp = $request->file('image');
    			if($image_temp->isValid()){
    				// Resize Image Code
    				$extention = $image_temp->getClientOriginalExtension();
    				$filename  = rand(111,99999).'.'.$extention;
    				$large_image = public_path('assets/images/products/large/'.$filename);
    	// 			if (!file_exists(public_path($large_image))) { //Verify if the directory exists
					//     mkdir(public_path($large_image), 666, true); //create it if do not exists
					// }
    				//$large_image_path  =  'images/products/large/'.$filename;
    				$medium_image = 'assets/images/products/medium/'.$filename;
    				$small_image  = 'assets/images/products/small/'.$filename;
    				// Resize Images
    				Image::make($image_temp)->save($large_image);
    				Image::make($image_temp)->resize(600,600)->save($medium_image);
    				Image::make($image_temp)->resize(300,300)->save($small_image);

    				// Store image name in products table
    				$product->image = $filename;
    			}
    		}

    		$product->save();
    		return redirect('/admin/view-products')->with('success','Product has been added successfully!');
    	}
    	// Categories Dropdown start
       $categories = Category::where(['parent_id'=>0])->orWhere('parent_id',null)->get();
       $categories_dropdown = '<option value=""  disbaled>Select</option>';
       foreach($categories as $cat){
       	$categories_dropdown .="<option value='".$cat->id."'>".$cat->title."</option>";
       	$sub_categories = Category::where(['parent_id'=>$cat->id])->get();
       	foreach($sub_categories as $sub_cat){	
       	$categories_dropdown .= "<option value='".$sub_cat->id."'>&nbsp;--&nbsp;".$sub_cat->title."</option>";
       	}
       }
        // Categories Dropdown end
    	return view('admin.products.add_product')->with(compact('categories_dropdown'));
    }

    public function editProduct(Request $request, $id=null){
    	if($request->isMethod('post')){
    		$data = $request->all();

    		//image upload 
    		if($request->hasFile('image')){
    			$image_temp = $request->file('image');
    			if($image_temp->isValid()){
    				// Resize Image Code
    				$extention = $image_temp->getClientOriginalExtension();
    				$filename  = rand(111,99999).'.'.$extention;
    				$large_image = public_path('assets/images/products/large/'.$filename);
    				$medium_image = 'assets/images/products/medium/'.$filename;
    				$small_image  = 'assets/images/products/small/'.$filename;
    				// Resize Images
    				Image::make($image_temp)->save($large_image);
    				Image::make($image_temp)->resize(600,600)->save($medium_image);
    				Image::make($image_temp)->resize(300,300)->save($small_image);
    			}
    		}else{
    			$filename = $data['current_image'];
    		}

    		Product::where(['id'=>$id])->update(['category_id'=>$data['category_id'],'product_name'=>$data['product_name'],'product_code'=>$data['product_code'],'product_color'=>$data['product_color'],'description'=>$data['description'],'price'=>$data['price'],'image'=>$filename]);
    	return redirect()->back()->with('success','Product has been updated successfully!');
    }
    	// Product Details 
    	$productDetails = Product::where(['id'=>$id])->first();
    	// Categories Dropdown start
      $categories = Category::where(['parent_id'=>0])->orWhere('parent_id',null)->get();
       $categories_dropdown = '<option value=""  disbaled>Select</option>';
       foreach($categories as $cat){
       	if($cat->id==$productDetails->category_id){
       		$selected = "selected";
       	}else{
       		$selected = "";
       	}
       	$categories_dropdown .="<option value='".$cat->id."' ".$selected.">".$cat->title."</option>";
       	$sub_categories = Category::where(['parent_id'=>$cat->id])->get();
       	foreach($sub_categories as $sub_cat){
       	if($sub_cat->id==$productDetails->category_id){
       		$selected = "selected";
       	}else{
       		$selected = "";
       	}	
       	$categories_dropdown .= "<option value='".$sub_cat->id."' ".$selected.">&nbsp;--&nbsp;".$sub_cat->title."</option>";
       	}
       }
        // Categories Dropdown end
    	return view('admin.products.edit_product')->with(compact('productDetails','categories_dropdown'));
    }

    public function viewProducts(Request $request, $id=null){
    	$products = Product::get();
    	$products = json_decode(json_encode($products));
    	foreach ($products as $key => $val) {
    	$category_name = Category::where(['id'=>$val->category_id])->first();
    	$products[$key]->category_name = $category_name->title;

    	}
    	return view('admin.products.view_products')->with(compact('products'));
    }

    public function deleteProduct($id=null){
    	Product::where(['id'=>$id])->delete();
    	return redirect()->back()->with('success','Product has been deleted successfully!');

    }

    public function deleteProductImage($id = null){
    	Product::where(['id'=>$id])->update(['image'=>'']);
    	return redirect()->back()->with('success','Product Image has been deleted successfully!');
    }

    public function addAttributes(Request $request, $id=null)
    {
      $productDetails = Product::with('attributes')->where(['id'=>$id])->first();
      //$productDetails = json_decode(json_encode($productDetails),true);
      //echo '<pre>';print_r($productDetails);die;
      if($request->isMethod('post'))
      {
        $data = $request->all(); //dd($data);
        foreach($data['sku'] as $key => $val){
          if(!empty($val)){
              $attribute = new ProductsAttribute;
              $attribute->product_id = $id;
              $attribute->sku   = $val;
              $attribute->size  = $data['size'][$key];
              $attribute->price = $data['price'][$key];
              $attribute->stock = $data['stock'][$key];
              $attribute->save();
          }
        }
        return redirect('admin/add-attributes/'.$id)->with('success','Product Attributies has been added successfully!');
      }
      return view('admin.products.add_attributes')->with(compact('productDetails'));

    }

    public function deleteAttribute($id=null){
       $delete =ProductsAttribute::where(['id'=>$id])->delete();
       // check data deleted or not
        if ($delete == 1) {
            $success = true;
            $message = "Attributies have been deleted successfully!";
        } else {
            $success = true;
            $message = "Attributies not found";
        }
        //  Return response
        return response()->json([
            'success' => $success,
            'message' => $message,
        ]);
           
    }

    public function addToCart(Request $request){
      $data = $request->all();
      if(empty($data['user_email'])){
          $data['user_email'] = '';
      }
      if(empty($data['session_id'])){
          $data['session_id'] = '';
      }
      DB::table('cart')->insert(['product_id'=>$data['product_id'],'product_name'=>$data['product_name'],$product_code=$data['product_code'],$product_color=$data['product_color'],$price=$data['price'],$size=$data['size'],$quantity=$data['quantity'],'user_email'=>$data['user_email'],'session_id'=>$data['session_id']]);

    }
}
