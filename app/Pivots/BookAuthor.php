<?php


namespace App\Pivots;


use App\Models\Author;
use App\Models\Book;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\Pivot;

class BookAuthor extends Pivot
{
    public function book(): BelongsTo {
        return $this->belongsTo(Book::class);
    }

    public function author(): BelongsTo {
        return $this->belongsTo(Author::class);
    }

}
