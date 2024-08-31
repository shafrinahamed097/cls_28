<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class QueryController extends Controller {
    function index() {
      // $books = DB::table('books')->get();
      // $authors = DB::table('authors')->get();

      // $authors = DB::table('authors')->limit(2)->offset(2)->get();
      // mysql: SELECT * FROM `authors` LIMIT 2,2;

      // where id = 1

      // $books = DB::table('books')->where('id',1)->get();
      // $books = DB::table('books')->where('id',"<",5)->get();

      // where id <5 & price <=14
      $books = DB::table('books')->where([
        ['id', "<=",5],
        ['price',"<=",14] 
      ])->get();

      // return response()->json($books);

      // return response()->json($authors);


      // $count = DB::table('authors')->count();
      return response()->json($books);
     

      


    
      

    }

}
   