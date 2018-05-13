<?php

namespace IUTLib\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use IUTLib\Book;
use IUTLib\Relation_genres_books;

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
            return redirect('/pagenotfound');
        }
        $books = Book::orderBy('bookID', 'desc' /*'asc'*/)->paginate(10);
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
            return redirect('/pagenotfound');
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
            return redirect('/pagenotfound');
        }
        $this->validate($request,[
            'bookID' => 'required|unique:books|digits_between:6,6',
            'bookName' => 'required|string|max:255',
            'bookAuthor' => 'required|string|max:255',
            'bookType' => 'required|string',
            'publishedYear' => 'required|date|after:' . date('1988-01-01'),
            'bookRank' => 'required|between:0,99.99',
            'describtion'=>'required|string',
            'isbn'=>'required|integer',
            'country'=>'required|string',
            'language'=>'required|string|nullable',
           /* 'genre'=>'required|string|nullable',*/
            'attachedFile' => 'required|file|nullable',
            'cover_image' => 'required|image|mimes:jpg,jpeg,bmp,png|max:1999'
        ]);

        if ($request->hasFile('cover_image')) {
          $imageNameWithExt=$request->file('cover_image')->getClientOriginalName();
          $imageName=pathinfo($imageNameWithExt, PATHINFO_FILENAME);
          $extension=$request->file('cover_image')->getClientOriginalExtension();
          $imageNameStore=$imageName.'_'.time().'.'.$extension;
          $path=$request->file('cover_image')->storeAs('public/cover_images', $imageNameStore);
        }
        else{
            return redirect('/home')->with('error', 'Cover_Image');
        }

         if ($request->hasFile('attachedFile')) {
          $fileNameWithExt=$request->file('attachedFile')->getClientOriginalName();
          $fileName=pathinfo($fileNameWithExt, PATHINFO_FILENAME);
          $extension=$request->file('attachedFile')->getClientOriginalExtension();
          $fileNameStore=$fileName.'_'.time().'.'.$extension;
          $path=$request->file('attachedFile')->storeAs('public/attached_files', $fileNameStore);
        }
        else{
            return redirect('/home')->with('error', 'AttachedFile');
        }

        $book = new Book;
        $book->bookID = $request->input('bookID');
        $book->bookName = $request->input('bookName');
        $book->bookAuthor = $request->input('bookAuthor');
        $book->bookType = $request->input('bookType');
        $book->publishedYear = $request->input('publishedYear');
        $book->bookRank = $request->input('bookRank');
        $book->describtion = $request->input('describtion');
        $book->isbn = $request->input('isbn');
        $book->country = $request->input('country');
        $book->language = $request->input('language');       
        /*$book->genre = $request->input('genre');       */
        $book->cover_image = $imageNameStore;
        $book->attachedFile = $fileNameStore;
        $book->save(); 
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
        return redirect('/pagenotfound');
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
        if (empty($book) || (auth()->user()->userType != 2 && auth()->user()->id != $member->id)) {
            return redirect('/pagenotfound');
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
        $book = Book::find($id);
        if (empty($book) || auth()->user()->userType != 2) {
            return redirect('/pagenotfound');
        }
        $this->validate($request,[
            'bookID' => 'required|' .(($book->bookID == $request->input('bookID')) ? '':'unique:books|').'digits_between:6,6',
            'bookName' => 'required|string|max:255',
            'bookAuthor' => 'required|string|max:255',
            'bookType' => 'required|string',
            'publishedYear' => 'required|date|after:' . date('1988-01-01'),
            'bookRank' => 'required|between:0,99.99',
            'describtion'=>'required|string',
            'isbn'=>'required|integer',
            'country'=>'required|string',
            'language'=>'required|string|nullable',
           /* 'genre'=>'required|string|nullable',*/
            'attachedFile' => 'required|file|nullable',
            'cover_image' => 'image|nullable|max:1999'
        ]);

        if ($request->hasFile('cover_image')) {
            Storage::delete('public/cover_images/'.$book->cover_image);
          $imageNameWithExt=$request->file('cover_image')->getClientOriginalName();
          $imageName=pathinfo($imageNameWithExt, PATHINFO_FILENAME);
          $extension=$request->file('cover_image')->getClientOriginalExtension();
          $imageNameStore=$imageName.'_'.time().'.'.$extension;
          $path=$request->file('cover_image')->storeAs('public/cover_images', $imageNameStore);
        }

        if ($request->hasFile('attachedFile')) {
            //Storage::delete('public/attached_files/'.$book->attachedFile);
          $fileNameWithExt=$request->file('attachedFile')->getClientOriginalName();
          $fileName=pathinfo($fileNameWithExt, PATHINFO_FILENAME);
          $extension=$request->file('attachedFile')->getClientOriginalExtension();
          $fileNameStore=$fileName.'_'.time().'.'.$extension;
          $path=$request->file('attachedFile')->storeAs('public/attached_files', $fileNameStore);
        }

        $book->bookID = $request->input('bookID');
        $book->bookName = $request->input('bookName');
        $book->bookAuthor = $request->input('bookAuthor');
        $book->bookType = $request->input('bookType');
        $book->publishedYear = $request->input('publishedYear');
        $book->describtion = $request->input('describtion');
        $book->isbn = $request->input('isbn');
        $book->country = $request->input('country');
        $book->language = $request->input('language'); 
        /*$book->genre = $request->input('genre'); */
        if ($request->hasFile('cover_image')) {
          $book->cover_image = $imageNameStore;  
        }
        if ($request->hasFile('attachedFile')) {
          $book->attachedFile = $fileNameStore;  
        }
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
        if (empty($book) || auth()->user()->userType != 2) {
            return redirect('/pagenotfound');
        }
        Storage::delete('public/cover_images/'.$book->cover_image);
        Storage::delete('public/attached_files/'.$book->attachedFile);
        $book->delete();
        return redirect('/books')->with('success', 'Book Removed');
    }
}
