<?php

namespace IUTLib\Http\Controllers;

use Illuminate\Http\Request;
use IUTLib\Http\Controllers\Controller;
use IUTLib\Comment;

class CommentsController extends Controller
{
	public function __construct()
    {
        $this->middleware('auth');
    }

    public function store(Request $request)
    {
    	Comment::create($request->all());
    	return redirect('/bookDetail/'.$request->book_id)->with('success', 'A Comment added');
    }
    
    public function destroy($id)
    {
        $comment = Comment::findOrFail($id);

        // Check fo correct user id
        if (auth()->user()->id != $comment->user->id) {
            return redirect('/bookDetail/'.$comment->book->id)->with('error', 'Unauthorized Page');
        }
        $comment->delete();
        return redirect('/bookDetail/'.$comment->book->id)->with('success', 'Comment Removed');
    }
}
