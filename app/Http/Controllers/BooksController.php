<?php

namespace IUTLib\Http\Controllers;

use Illuminate\Http\Request;
use IUTLib\Book;

class BooksController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
     public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
         if (auth()->user()->userType != 2) {
            return redirect('/home')->with('error', 'Unauthorized Page');
        }
        $books = Book::orderBy('bookID', 'asc' /*'desc'*/)->paginate(10);
        return view('books.index')->with('books', $books);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if (auth()->user()->userType != 2) {
            return redirect('/home')->with('error', 'Unauthorized Page');
        }
        return view('books.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if (auth()->user()->userType != 2) {
            return redirect('/home')->with('error', 'Unauthorized Page');
        }
        $this->validate($request,[
            'bookID' => 'required|unique:books|digits_between:6,6',
            'bookName' => 'required|string|max:255',
            'bookAuthor' => 'required|string|max:255',
            'bookType' => 'required|string',
            'publishedYear' => 'required|date|after:' . date('1988-01-01'),
            'bookRank' => 'required|between:0,99.99',
           /* 'attachedFile' => '',
            'cover_image' => ''*/
        ]);

        $book = new Book;
        $book->bookID = $request->input('bookID');
        $book->bookName = $request->input('bookName');
        $book->bookAuthor = $request->input('bookAuthor');
        $book->bookType = $request->input('bookType');
        $book->publishedYear = $request->input('publishedYear');
        $book->bookRank = $request->input('bookRank');
        /*$book->attachedFile = $request->input('attachedFile');
        $book->cover_image = $request->input('cover_image');
*/        $book->save(); 
        return redirect('/books')->with('success', 'A book added');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        if (auth()->user()->userType != 2) {
            return redirect('/home')->with('error', 'Unauthorized Page');
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $book = Book::find($id);
         // Check for correct user id
        if (auth()->user()->userType != 2 && auth()->user()->id != $member->id) {
            return redirect('/home')->with('error', 'Unauthorized Page');
        }
        return view('books.edit')->with('book', $book);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        if (auth()->user()->userType != 2) {
            return redirect('/home')->with('error', 'Unauthorized Page');
        }
        $book = Book::find($id);
        $this->validate($request,[
            'bookID' => 'required|' .(($book->bookID == $request->input('bookID')) ? '':'unique:books|').'digits_between:6,6',
            'bookName' => 'required|string|max:255',
            'bookAuthor' => 'required|string|max:255',
            'bookType' => 'required|string',
            'publishedYear' => 'required|date|after:' . date('1988-01-01'),
            'bookRank' => 'required|between:0,99.99',
           /* 'attachedFile' => '',
            'cover_image' => ''*/
        ]);

        $book->bookID = $request->input('bookID');
        $book->bookName = $request->input('bookName');
        $book->bookAuthor = $request->input('bookAuthor');
        $book->bookType = $request->input('bookType');
        $book->publishedYear = $request->input('publishedYear');
        // $book->registeredDate = $request->input('registeredDate');
        /*$book->attachedFile = $request->input('attachedFile');
        $book->cover_image = $request->input('cover_image');*/
        $book->save(); 
        return redirect('/books')->with('success', 'This Book\'s Data Changed');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $book = Book::find($id);

        // Check for correct user id
        if (auth()->user()->userType != 2) {
            return redirect('/home')->with('error', 'Unauthorized Page');
        }
        $book->delete();
        return redirect('/books')->with('success', 'Book Removed');
    }
}
