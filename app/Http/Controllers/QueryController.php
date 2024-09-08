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
      // $books = DB::table('books')->where([
      //   ['id', "<=",5],
      //   ['price',"<=",14] 
      // ])->get();

      // $books = DB::table('books')
      // ->where('id', '<=', 5)
      // ->where('price', '<=',14)
      // ->get();

      // Dynamic Query
      // $books = DB::table('books')->wherePrice(12)->get();

      // where books id >=3 and <=7
    //  $books = DB::table('books')->whereBetween('id', [3,7])->get();

    //  different version
    // $books = DB::table('books')
    // ->where('id', '>=',3)
    // ->where('id', '<=',7)
    // ->get();

    // where id=3 or id = 7
    // $books = DB::table('books')->whereIn('id', [3,7])->get();

    // with orwhere
    // $books = DB::table('books')->where('id',3)->orWhere('id',7)->get();

    // price >10 and <15
    //  $books = DB::table('books')->whereBetween('price', [10,15])->get();

    // where created_at = null
    // $books = DB::table('books')->whereBetween('price', [10,15])->get();

    // Maximum priced book
    // $max = DB::table('books')->max('price');
    // $maxPriceBook = DB::table('books')->wherePrice($max)->get();
    // return $maxPriceBook;

    // order by
    // $books = DB::table('books')->orderBy('title',)->get(); // A to Z
    // $books = DB::table('books')->orderBy('title', 'desc')->get();  // Z to A

    // maximum priced book
    // $books = DB::table('books')->orderBy('price', 'desc')->limit(1)->get();
    // $books = DB::table('books')->orderBy('price', 'desc')->get();


    // Join with authors and display name
    // $books = DB::table('books')->join('authors', 'books.author_id', '=', 'authors.id')->select('books.title', 'authors.name as author_name', 'books.id as book_id')->get();
    

    // find all books from author id 1
    // $books = DB::table('books')->join('authors', 'books.author_id', '=', 'authors.id')->select('books.title', 'authors.name as author_name', 'books.id as book_id')->where('author_id',1)->get();

    // Display sql
    // $books = DB::table('books')->join('authors', 'books.author_id', '=', 'authors.id')->select('books.title', 'authors.name as author_name', 'books.id as book_id')->where('author_id',1)->toSql();
    
    // find books of all authors but author id 2
    // $books = DB::table('books')->join('authors', 'books.author_id', '=', 'authors.id')
    // ->select('books.title', 'authors.name as author_name', 'books.author_id', 'books.id as book_id')
    // ->whereNotIn('author_id', [2])->get();

  //  find max priced book and books where price between 12 to 14

  // $max = DB::table('books')->max('price');
  // $books = DB::table('books')->join('authors', 'books.author_id', '=', 'authors.id')
  // ->select('books.title', 'authors.name as author_name', 'books.author_id', 'books.id as book_id', 'price')
  // ->wherePrice($max)
  // ->orwhereBetween('price', [12,14])->get();

  // books and authors join 
  // $max = DB::table('books')->max('price');
  // $books = DB::table('books')->join('authors', 'books.author_id', '=', 'authors.id')
  // ->select('books.title', 'authors.name as author_name', 'books.author_id', 'books.id as book_id')
  // ->get();

  // left join with authors

  $books = DB::table('authors')
  ->leftJoin('books', 'books.author_id', '=', 'authors.id')
  ->select('books.title', 'authors.name as author_name', 'books.author_id', 'books.id as book_id')
  ->orderBy('books.title', 'desc')->get();



      return response()->json($books);

      // return response()->json($authors);


      // $count = DB::table('authors')->count();
      // return response()->json($books);
     

      


    
      

    }

    function store(){
      
      // add a new author called Jack London

      // DB::table('authors')->insert([
      //   'name' => 'Jack London',
      //   'bio' => 'American author and short story writer.'
      //   ]);

      // insert a new author Henry Rider Haggard and His Book story writer.
      $newAuthorId = DB::table('authors')->insert([
        'name' => 'Henry Rider Haggard',
        'bio' => 'American author and short story writer.'
      ]);

      DB::table('books')->insert([
        'title' => 'Alan Quantermain',
        'author_id'=> $newAuthorId,
        'price' =>12
      ]);

        // $newAuthor = DB::table('authors')->whereName('Jack London')->get();

        // join books and authors

        $books = DB::table('books')->join('authors', 'books.author_id', '=', 'authors.id')
        ->select('books.title', 'authors.name as author_name', 'books.author_id', 'books.id as boos_id')->get();


        return $books;
      
    }

}
   