<?php

namespace App\Http\Controllers;

use Yajra\Datatables\Datatables;
use Illuminate\Http\Request;
use App\Category;

class CategoryController extends Controller
{
    public function index(Request $request){

            if ($request->ajax()) {
                    $data = Category::all();
                    
                    return Datatables::of($data)
                            ->addIndexColumn()
                            ->editColumn('created_at',function($data){
                            return $data->created_at->format('d/m/Y');
                            })
                            ->editColumn('status',function($data){
                              
                              if($data->status == 0){
                                $status = "<span title='Disabled!' data-toggle='tooltip' class='label label-danger'> Disabled </span>";
                              }else{
                                $status = "<span title='Enabled!' data-toggle='tooltip' class='label label-success'> Enabled </span>";
                              }
                              return $status;
                            })
                            ->editColumn('parent_id',function($data){
                              return $parent_id = $data->parent_id ?? 'Main';
                            })
                            ->addColumn('action', function($row){
           
                                   $btn = '<a href="{{ url("/admin/edit-category/"'.$category->id.') }}" class="btn btn-cyan btn-sm edit"><i class="m-r-10 mdi mdi-24px mdi-account-edit"></i></a>'.' '.'<a href="javascript:void(0)" class="edit btn btn-primary btn-sm">Edit</a>';
             
                                    return $btn;
                            })
                            ->escapeColumns(['action'])
                            ->make(true);
                }
          
        return view('back.admin.categories.view_categories');
    }

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
