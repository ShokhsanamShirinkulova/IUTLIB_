<?php

namespace IUTLib\Http\Controllers;

use Illuminate\Http\Request;
use IUTLib\Book;

class PagesController extends Controller
{
    public function index()
    {
        return view('pages.index');
    }

    public function about()
    {
        return view('pages.about');
    }
    public function catalog()
    {
    	$books = Book::all();
        return view('pages.catalog')->with('books', $books);
    }
}
