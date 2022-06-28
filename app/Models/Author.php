<?php

namespace App\Models;

use App\Pivots\BookAuthor;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Author extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'lastname', 'birth_date'];

    public function books(): BelongsToMany {
        return $this->belongsToMany(Book::class, BookAuthor::class);
    }
}
