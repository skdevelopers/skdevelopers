<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;

class CategoryController extends Controller
{
    function addCategory(Request $request){
    	if($request->isMethod('post')){
    		$data = $request->all();
    		$category = new Category;
    		$category->title = $data['category_title']; // Use Title against name
    		$category->parent_id = $data['parent_id'];
    		$category->description = $data['description'];
    		$category->url = $data['url'];
            $category->status = 1;
    		$category->save();
    	 return	redirect('/admin/view-categories')->with('success','Category added Successfully!');
    	}

    	$levels = Category::where(['parent_id'=>0])->orWhere('parent_id',null)->get();

    	return view('admin.categories.add_category')->with(compact('levels'));
    }

    public function editCategory(Request $request, $id = null){
    	if($request->isMethod('post')){
    		$data = $request->all();
    		Category::where(['id'=>$id])->update(['title'=>$data['category_title'],'description'=>$data['description'],'url',$data['url']]);
    		return redirect('/admin/view-categories')->withSuccess('Category updated Successfully!');
    	}
    	$categoryDetails = Category::where(['id'=>$id])->first();
    	$levels = Category::where(['parent_id'=>0])->orWhere('parent_id',null)->get();
    	return view('admin.categories.edit_category')->with(compact('categoryDetails','levels'));
    }

    public function deleteCategory(Request $request, $id = null){
    	if(!empty($id)){
    		Category::where(['id'=>$id])->delete();
    		return redirect()->back()->with('success','Category deleted Successfully!');
    	}
    }

    public function viewCategories(){
    	$categories = Category::get();
    	$categories = json_decode(json_encode($categories));
    	return view('admin.categories.view_categories')->with(compact('categories'));
    }
}
