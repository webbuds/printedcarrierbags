<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Pages;
class PageController extends Controller
{
    public function viewPage($id){
       $page=Pages::where('id',$id)->first();
      return view('admin.static_page',compact('page'));
    }
	
	public function updatePage(Request $request){
		$id=$request->id;
		$page=Pages::find($id);		
		$page->title=$request->title;		
		$page->slug=$request->slug;			
		$page->meta_description=$request->meta_description;		
		$page->meta_title=$request->meta_title;		
		$page->page_data=$request->description;
		$page->save();


      return redirect()->back();

	}
	
	public function newPage(){
      return view('admin.new_static_page');
	
	}	
	public function store(Request $request){
		$page=new Pages;		
		$page->title=$request->title;		
		$page->slug=$request->slug;			
		$page->meta_description=$request->meta_description;		
		$page->meta_title=$request->meta_title;		
		$page->page_data=$request->description;
		$page->save();


      return redirect()->back();
	}
	public function deletePage($id){
		$page=Pages::find($id);	
		$page->delete();
		return redirect()->back();
	}
	public function viewWebpage($slug){
	 $page=Pages::where('slug',$slug)->first();
      return view('customPageUserSide',compact('page'));
		
	}
}
