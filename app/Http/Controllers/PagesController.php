<?php

namespace IUTLib\Http\Controllers;

use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;
use IUTLib\Book;
use IUTLib\Genre;

class PagesController extends Controller
{
    public function index()
    {
        $pbooks = Book::where('bookRank', '>', 2.50)->take(10)->get();
        $rbooks = Book::orderBy('created_at', 'desc')->take(4)->get();
        return view('pages.index')->with('pbooks', $pbooks)->with('rbooks', $rbooks);
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
    	$books = Book::orderBy('bookID', 'desc' /*'asc'*/)->paginate(10);
        return view('pages.catalog')->with(['books' => $books, 'controller' => $this]);
    }

    public function bookDescription($id)
    {
        $book = Book::find($id);
        $rbook = Book::orderBy('created_at', 'desc')->take(1)->get();
        $pbook = Book::where('bookRank', '>', 5.0)->take(1)->get();
        /*$genres = Genre::with('book')->join('genres', '.user_id', '=', '.user_id')->where('.', '', $my->id)->get('*')*/
        return view('pages.bookDescription')->with('book',$book)->with('rbook',$rbook[0])->with('pbook',$pbook[0]);
    }
}
