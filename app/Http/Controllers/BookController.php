<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreBookRequest;
use App\Http\Requests\UpdateBookRequest;
use App\Http\Resources\BookResource;
use App\Models\Book;
use App\Models\Category;

class BookController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return BookResource::collection(Book::with(['authors','category'])->paginate());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreBookRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreBookRequest $request)
    {
        $book = Book::create(['title'=>$request->title,'isbn'=>$request->isbn]);
        $authorsIds = collect();
        foreach ($request->authors as $author){
            $authorsIds->add($author->id);
        }
        $book->authors()->sync($authorsIds);
        $book->category()->associate($request->category_id);
        $book->save();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Book  $book
     * @return \Illuminate\Http\Response
     */
    public function show(Book $book)
    {
        $book->with('authors');
        return BookResource::make($book);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateBookRequest  $request
     * @param  \App\Models\Book  $book
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateBookRequest $request, Book $book)
    {
        $book->update(['title'=>$request->title,'isbn'=>$request->isbn]);
        $authorsIds = collect();
        foreach ($request->authors as $author){
            $authorsIds->add($author->id);
        }
        $book->authors()->sync($authorsIds);
        $book->caetgory()->associate($request->category_id);
        $book->prize()->associate($request->prize_id);
        $book->update();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Book  $book
     * @return \Illuminate\Http\Response
     */
    public function destroy(Book $book)
    {
        $book->authors()->sync(collect());
        return $book->delete();
    }
}
