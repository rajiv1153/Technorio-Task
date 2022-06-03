<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\movies;
use DB;

class MovieController extends Controller
{
    public function create(){

        return view('movie.create');
    }

    public function store(Request $request){
        $data= array();
        $data['title']=$request->title;
        $data['release_date']=$request->release_date;
        $data['description']=$request->description;
        $image=$request->file('poster');
        if($image){
            $image_name=date('dmy_H_s_i');
            $ext= strtolower($image->getClientOriginalExtension());
            $image_full_name=$image_name.'.'.$ext;
            $upload_path='public/media/';
            $image_url= $upload_path.$image_full_name;
            $success=$image->move($upload_path,$image_full_name);
            $data['poster']=$image_url;
            $product=DB::table('movies')->insert($data);
            return redirect()->route('admin.home')->with('success','Product Created Successfully');
        }
        
    }

    public function edit($id){
        $movie=DB::table('movies')->where('id',$id)->first();
        return view('movie.edit',compact('movie'));

    }

    public function update( Request $request,$id){
        $oldposter=$request->old_poster;
        $data= array();
        $data['title']=$request->title;
        $data['release_date']=$request->release_date;
        $data['description']=$request->description;
        $image=$request->file('poster');
        if($image){
            unlink($oldposter);
            $image_name=date('dmy_H_s_i');
            $ext= strtolower($image->getClientOriginalExtension());
            $image_full_name=$image_name.'.'.$ext;
            $upload_path='public/media/';
            $image_url= $upload_path.$image_full_name;
            $success=$image->move($upload_path,$image_full_name);
            $data['poster']=$image_url;
        }
        $movies=DB::table('movies')->where('id',$id)->update($data);

        return redirect()->route('admin.home')->with('success','Product updated Successfully');

    }


}
