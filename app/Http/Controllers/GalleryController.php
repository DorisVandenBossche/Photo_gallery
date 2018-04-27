<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use DB;

use Auth;

class GalleryController extends Controller
{

	//set tablename
   	private $table = 'galleries';


    // List galleries

    public function index(){

    	//get all galleries
    	$galleries = DB::table($this->table)->get(); 

    	//render view
    	return view('gallery/index', compact($this->table));
    }

   // show create form

   public function create(){

    // check if logged in
    if(!Auth::check()){
      return \Redirect::route('gallery.index');
    }

   	return view('gallery/create');
   }

   // store Gallery
   public function store(Request $request){
   		//get request input 

   		$name = $request->input('name');
   		$description = $request->input('description');
   		$cover_image = $request->file('cover_image');
   		$owner_id = 1;


   	//check image upload

   		if($cover_image){
			$cover_image_filename = $cover_image->getClientOriginalName();
			$cover_image->move(public_path('image'), $cover_image_filename);

   		} else {

			$cover_image_filename = 'noimage.jpg';
   		}

   		// insert gallery
   		DB::table($this->table)->insert(
   			[
   				'name' => $name,
   				'description' => $description,
   				'cover_image' => $cover_image_filename,
   				'owner_id' => $owner_id
   			]
   		);

   		//Set message
         \Session::flash('message', "Photo Added");

   		//redirect
   		return \Redirect::route('gallery.index')->with('message', 'Gallery Created');
 }

   	// show Gallery photos
   public function show($id){

   	//get gallery
   	$gallery = DB::table($this->table)->where('id', $id)->first();

   	//get Photos
   	$photos = DB::table('photos')->where('gallery_id', $id)->get();

   	//render view
    	return view('gallery/show', compact('gallery', 'photos'));
   }

   public function destroy($id){
    $gallery = Gallery::where('id',$id)->first();
    $gallery->delete();

    return redirect('/gallery');
   }

}

