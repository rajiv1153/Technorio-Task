<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\Models\favorites;
use App\Models\movies;

use DB;

class FavoritesController extends Controller
{
    public function add($id){ 
        $data= array();
        $data['user_id']=Auth::user()->id;
        $data['movie_id']=$id;
        $fav=DB::table('favorites')->where([
            ['user_id', '=', $data['user_id']],
            ['movie_id', '=', $data['movie_id']]])->first(); //check if it is already on fav
        if($fav){
            return redirect()->route('home')->with('success','Already in list');

        }else{
            $movie=DB::table('favorites')->insert($data);
            return redirect()->route('home')->with('success','added to fav Successfully');
    
        }    
       
    }

    public function mylist(){ 
        $movies=favorites::with('getMovies')->where('user_id',Auth::user()->id)->get();
        return view('favorites',compact('movies'));
    }

    
}
