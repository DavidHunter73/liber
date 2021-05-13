<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\BookRating;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class BookController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        return Book::all();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //Log::info($request->input("books"));
        //
        //foreach ($request->get('booksToStore' . array_values([])) as $b) {
        foreach ($request->input('books') as $b){
            //Log::info($b["asin"]);
            $book = new Book;

            //Declaramos el nombre con el nombre enviado en el request
            $book->isbn = $b["asin"];
            $book->title =  $b["title"];
            $book->author = "";
            $book->cover = "";
            $book->rating = 0;
            
            // Guardamos el cambio en nuestro modelo
            $book->save();
        }
        //return $request;
    }
}
