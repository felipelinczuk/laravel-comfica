<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Book;

class BooksController extends Controller
{
    public function index()
    {
        return Book::all();
    }

    public function create()
    {
        
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'description' => 'required',
            'fav'=> 'required'
        ]);

        return Book::create($request->all());

    }

    public function show(string $id)
    {
        
    }

    public function edit(string $id)
    {
        
    }

    public function updateFav(Request $request)
    {
        $request->validate([
            'id' => 'required',
            'fav'=> 'required'
        ]);

        if($book = Book::find($request['id'])){
            return $book->update($request->all());
        }
    }

    public function destroy(Request $request)
    {
        if($book = Book::find($request['id'])){
            return $book->delete();
        }
    }
}
