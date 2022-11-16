<?php

namespace App\Http\Controllers;

use App\Payment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use App\BlogCategory;

class BlogcategoryController extends Controller
{
    public function create($url=NULL){
        $title = '';
        $category = '';
        if(!empty($url)){
            $title = 'Edit Category';
            $category = BlogCategory::where('slug',$url)->first();
        }else{
            $title = 'Add Category';
        }
        return view('admin.cms.add_category', compact('title', 'category'));
    }
    //post category data
    public function store(Request $request){
        $rules = [
            'title'     => 'required|max:220',
            'description'   => 'required',
        ];
        $this->validate($request, $rules);
        $msg = '';
        $category_id = $request->input('category_id');
        if($category_id){
            $category = BlogCategory::find($category_id);
            $msg = 'Blog Category Updated';
        }else{
            $category = new BlogCategory();
            $msg = 'Blog Category Created';
        }
        $category->title = $request->title;
        $category->description = $request->description;
        $category->slug = unique_slug($request->title, 'Post');
        $category->save();
        return redirect(route('categoryAll'))->with('success', $msg);
    }
    //all blog category 
    public function all(){
        $title = 'All Blog Category';
        $all = BlogCategory::where('is_deleted',0)->orderBy('id','desc')->paginate(10);
        return view('admin.cms.all_category', compact('title', 'all'));
    }
    //activate 
    public function activate($slug=NULL){
        $blog = BlogCategory::where('slug',$slug)->first();
        if(!$blog){
            return redirect(route('categoryAll'))->with('error', 'Blog Category Data Not Found!');
        }
        $update = BlogCategory::where('id',$blog->id)->update(['status'=>0]);
        return redirect(route('categoryAll'))->with('success', 'Blog Category Activated!');
    }
    //deactivate 
    public function deactivate($slug=NULL){
        $blog = BlogCategory::where('slug',$slug)->first();
        if(!$blog){
            return redirect(route('categoryAll'))->with('error', 'Blog Category Data Not Found!');
        }
        $update = BlogCategory::where('id',$blog->id)->update(['status'=>1]);
        return redirect(route('categoryAll'))->with('success', 'Blog Category DeActivated!');
    }
    //delete 
    public function delete($slug=NULL){
        $blog = BlogCategory::where('slug',$slug)->first();
        if(!$blog){
            return redirect(route('categoryAll'))->with('error', 'Blog Category Data Not Found!');
        }
        $update = BlogCategory::where('id',$blog->id)->update(['is_deleted'=>1]);
        return redirect(route('categoryAll'))->with('success', 'Blog Category Deleted!');
    }
}
