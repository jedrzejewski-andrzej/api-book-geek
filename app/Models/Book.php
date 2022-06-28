<?php

namespace App\Models;

use App\Pivots\BookAuthor;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Book extends Model
{
    use HasFactory;

    protected $fillable = ['title', 'isbn'];

    public function authors(): BelongsToMany {
        return $this->belongsToMany(Author::class, BookAuthor::class);
    }

    public function prize(): HasOne {
        return $this->hasOne(Prize::class);
    }

    public function category(): BelongsTo {
        return $this->belongsTo(Category::class);
    }
}
