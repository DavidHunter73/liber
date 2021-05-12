<?php

namespace App\Http\Controllers;

use App\Models\Book_Rating;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class BookRatingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
        //
        $bookRating = new Book_Rating;
        
        //Declaramos el nombre con el nombre enviado en el request
        $bookRating->book_isbn = $request->book_isbn;
        $bookRating->user_id = $request->user_id;
        $bookRating->rating = $request->rating;
            
        // Guardamos el cambio en nuestro modelo
        $bookRating->save();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request)
    {
        //
        Book_Rating::where('book_isbn', $request->book_isbn)
                    ->where('user_id', $request->user_id)
                    ->update(['rating' => $request->rating]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
