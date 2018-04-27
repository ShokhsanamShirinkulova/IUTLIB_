@extends('layouts.app')

@section('content')
        <div class="container">
        <h1>Edit Book's Data</h1>
        	{!! Form::open(['action' => ['BooksController@update',$book->id], 'method' => 'POST' ])!!}
		    <div class="form-group">
		    	{{ Form::label('bookID', 'Book ID')}}
		    	{{ Form::text('bookID', $book->bookID, ['class' => 'form-control', 'placeholder' => 'Book ID'] )}}
		    </div>
		    <div class="form-group">
		    	{{ Form::label('bookName', 'Book Name')}}
		    	{{ Form::text('bookName', $book->bookName, ['class' => 'form-control', 'placeholder' => 'Book Name'] )}}
		    </div>
		    <div class="form-group">
		    	{{ Form::label('bookAuthor', 'Book Author')}}
		    	{{ Form::text('bookAuthor', $book->bookAuthor, ['class' => 'form-control', 'placeholder' => 'Book Author'] )}}
		    </div>
		    <div class="form-group">
		    	<p>{{ Form::label('bookType', 'Book Type')}}</p>
		    	{{Form::select('bookType', ['Science' => 'Science', 'HIstory' => 'History', 'Exact' => 'Exact'])}}
		    </div>
		    <div class="form-group">
		    	<p>{{ Form::label('publishedYear', 'Published Year')}}</p>
		    	{{Form::date('publishedYear', \Carbon\Carbon::parse($book->publishedYear))}}
		    </div>
		    <div class="form-group">
		    	{{ Form::label('bookRank', 'Book Rank')}}
		    	{{ Form::text('bookRank', $book->bookRank, ['class' => 'form-control', 'placeholder' => 'Book Rank'] )}}
		    </div>
		    {{Form::hidden('_method','PUT')}}
			   	{{ Form::submit('Edit', ['class' => 'btn btn-primary'])}}
				{!! Form::close() !!}
			</div>
@endsection