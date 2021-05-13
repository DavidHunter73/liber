<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BookRating extends Model
{
    use HasFactory;
    public $timestamps = false;

    protected $fillable = ['book_isbn', 'user_id', 'rating'];

    protected $primaryKey = 'book_isbn';
}
