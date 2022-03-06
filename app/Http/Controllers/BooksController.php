<?php

namespace App\Http\Controllers;

use App\Models\Books;
use App\Models\Authors;
use App\Models\BookCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class BooksController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories=DB::table('book_categories')
        ->orderBy('category_name','asc')
        ->get();

        $authors=DB::table('authors')
        ->orderBy('author_name','asc')
        ->get();

        $books=Books::orderBy('book_name','asc')
        ->get();

        return view('book.index',compact('categories','authors','books'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //dd($request->all());
        $request->validate([
            'book_name' => 'required',
            'author' => 'required',
            'category' => 'required',
            'stock' => 'required',
        ]);

        $store=Books::create([
            'book_name' => $request->book_name,
            'author_name' => $request->author,
            'book_category' => $request->category,
            'stock' => $request->stock,
            'created_by' => 'test'
        ]);

        if($store){
            return redirect('/masters/books')->with('status','Success Add Book');
        }
        else{
            return redirect('/masters/books')->with('status','Failed Add Book');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Books  $books
     * @return \Illuminate\Http\Response
     */
    public function show(Books $books)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Books  $books
     * @return \Illuminate\Http\Response
     */
    public function edit(Books $books)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Books  $books
     * @return \Illuminate\Http\Response
     */
    public function updateBook(Request $request, $book_id)
    {
        $request->validate([
            'book_name' => 'required',
            'author' => 'required',
            'ctg' => 'required',
            'stock' => 'required',
        ]);

        $update=Books::where('id',$book_id)
        ->update([
            'book_name' => $request->book_name,
            'author_name' => $request->author,
            'book_category' => $request->ctg,
            'stock' => $request->stock
        ]);

        if($update){
            return redirect('/masters/books')->with('status','Success Update Book');
        }
        else{
            return redirect('/masters/books')->with('status','Failed Update Book');
        }
    }

    public function addStock(Request $request, $id)
    {
        $request->validate([
            'stock' => 'required',
        ]);

        $stock=Books::where('id',$id)->first();

        $currentStock=$stock->stock;

        //dd($currentStock);

        $addStock=Books::where('id',$id)
        ->update([
            'stock' => $request->stock + $currentStock,
        ]);

        if($addStock){
            return redirect('/masters/books')->with('status','Success Add Stock');
        }
        else{
            return redirect('/masters/books')->with('status','Failed Add Stock');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Books  $books
     * @return \Illuminate\Http\Response
     */
    public function delete($id)
    {
        $delete=Books::where('id',$id)->delete();

        if($delete){
            return redirect('/masters/books')->with('status','Success Delete Book');
        }
        else{
            return redirect('/masters/books')->with('status','Failed Delete Book');
        }
    }

    public function search()
    {
        $books=Books::orderBy('book_name','asc')
        ->get();

        return view('book.search',compact('books'));
    }
}
