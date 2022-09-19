<?php

namespace App\Http\Controllers;

use App\Models\Book;

class HomeController extends BaseController
{
    public function index(){
        $books = Book::with('authors')->with('genre')->orderBy('created_at', 'desc')->take(4)->get();
        $this->data['books'] = $books;
        return view('pages.home',$this->data);
    }
    public function author(){
        return view('pages.author');
    }
}
