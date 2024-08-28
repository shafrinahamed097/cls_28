<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class QueryController extends Controller {
    function index() {
      $books = DB::table('books')->get();
      return response()->json($books);
    }

}
   