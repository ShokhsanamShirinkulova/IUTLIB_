@extends('layouts.app')

@section('content')
        <div class="container">
        <h1>Add A Book</h1>
        	{!! Form::open(['action' => 'BooksController@store', 'method' => 'POST' ])!!}
		    <div class="form-group">
		    	{{ Form::label('bookID', 'Book ID')}}
		    	{{ Form::text('bookID', '', ['class' => 'form-control', 'placeholder' => 'Book ID'] )}}
		    </div>
		    <div class="form-group">
		    	{{ Form::label('bookName', 'Book Name')}}
		    	{{ Form::text('bookName', '', ['class' => 'form-control', 'placeholder' => 'Book Name'] )}}
		    </div>
		    <div class="form-group">
		    	{{ Form::label('bookAuthor', 'Book Author')}}
		    	{{ Form::text('bookAuthor', '', ['class' => 'form-control', 'placeholder' => 'Book Author'] )}}
		    </div>
		    <div class="form-group">
		    	<p>{{ Form::label('bookType', 'Book Type')}}</p>
		    	{{Form::select('bookType', ['Science' => 'Science', 'HIstory' => 'History', 'Exact' => 'Exact'])}}
		    	<!-- {{ Form::text('bookType', '', ['class' => 'form-control', 'placeholder' => 'Book Name'] )}} -->
		    </div>
		    <div class="form-group">
		    	<p>{{ Form::label('publishedYear', 'Published Year')}}</p>
		    	{{Form::date('publishedYear')}}
		    </div>
		    <div class="form-group">
		    	{{ Form::label('bookRank', 'Book Rank')}}
		    	{{ Form::text('bookRank', '', ['class' => 'form-control', 'placeholder' => 'Book Rank'] )}}
		    </div>
		   	{{ Form::submit('Add', ['class' => 'btn btn-primary'])}}
			{!! Form::close() !!}
		</div>
@endsection