<?php

namespace IUTLib\Http\Controllers;

use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;
use IUTLib\Book;

class PagesController extends Controller
{
    public function index()
    {
        $books = Book::orderBy('bookID', 'desc')->paginate(10);
        return view('pages.index')->with('books', $books);
    }

    public function about()
    {
        return view('pages.about');
    }
    /*public function count_pages($filename)
    {
        $pdftext = @file_get_contents($filename);
        $num = preg_match_all("/\/Page\W/", $pdftext, $dummy);
        return $num;
    }*/
    public function catalog()
    {
    	$books = Book::orderBy('bookID', 'desc' /*'asc'*/)->paginate(2);
        return view('pages.catalog')->with(['books' => $books, 'controller' => $this]);
    }
}
