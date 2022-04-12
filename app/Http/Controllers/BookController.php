<?php

namespace App\Http\Controllers;

use App\Models\Book;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use DB;



class BookController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    // public function __construct()
    // {
    //  $this->middleware('auth:api')->except(['index', 'show']);
    // }

    public function index()
    {
        return Book::all();
        // return view('welcome');
    }

    
 

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'title'=>'required',
            'author'=>'required',
            'description'=>'required'

        ]);
        $book = new  Book;
        $book->title  = $request->title;
        $book->author  = $request->author;
        $book->description  = $request->description;
        // $book->user_id = Auth::id();

        $book->save();
        return view('welcome');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Book  $book
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return Book::where('id',$id)->get();
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Book  $book
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $r_id=$id;
        $book=DB::select('select * from books where id = ?',[$r_id]);
   
        return view('edit' , compact('book'));
    }
 
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Book  $book
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $book=Book::findOrFail($id);

        // $data=$request->all();

        $request->validate([
            'title'=>'required',
            'author'=>'required',
            'description'=>'required'

        ]);
        // $book = new  Book;
        // $book->title  = $request->title;
        // $book->author  = $request->author;
        // $book->description  = $request->description;
        // $book->user_id = Auth::id();
        if(isset($request->title)){
            $book->title = $request->title;            
        }
        if(isset($request->author)){
            $book->author = $request->author;            
        }
        if(isset($request->description)){
            $book->description = $request->description;            
        }


        $book->save();
        return view('welcome');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Book  $book
     * @return \Illuminate\Http\Response
     */
    public function destroy( $id)
    {
        $book=Book::find($id);
        $book->delete($id);
        
    }
}
