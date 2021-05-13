<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\BookRating;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Builder;


class BookRatingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $averageRating = 0;
        $howMany = 0;

        /*$bookRating = BookRating::updateOrCreate(
            ['book_isbn' => $request->book_isbn, 'user_id' => $request->user_id],
            ['rating' => $request->rating]
        );*/

        $bookRating = DB::table('book_ratings')->where('book_isbn', '=', $request->book_isbn)
        ->where('user_id', '=', $request->user_id)->get();

        if (sizeof($bookRating) == 0) {
            Log::info("Creando Nuevo Rating");
            $newRating = new BookRating;
            $newRating->book_isbn = $request->book_isbn;
            $newRating->user_id = $request->user_id;
            $newRating->rating = $request->rating;
            $newRating->save();
        } else {
            Log::info("Actualizando Rating");
            $newRating = BookRating::where('book_isbn', /*$request->book_isbn*/1)->where('user_id', /*$request->user_id*/1)->get();
            $newRating->rating = $request->rating;
            $newRating->save();
        }


        foreach (BookRating::where('book_isbn', $request->book_isbn)->cursor() as $rating){
            $averageRating += $rating->rating;
            $howMany++;
            Log::info("He entrat");
        }

        Log::info($averageRating);
        Log::info($howMany);
        Log::info($request->book_isbn);

        $book = Book::find($request->book_isbn);
        $book->rating = $averageRating / $howMany;
        $book->save();
    }

}
