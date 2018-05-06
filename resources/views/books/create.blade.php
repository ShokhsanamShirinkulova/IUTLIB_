@extends('layouts.app')

@section('content')
        <div class="MyForm container">
        
            <div class="card">
                <div class="card-header">{{ __('Add A Book') }}</div>

                <div class="card-body">
		        	{!! Form::open(['action' => 'BooksController@store', 'method' => 'POST', 'enctype'=>'multipart/form-data' ])!!}
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
				    </div>
				    <div class="form-group">
				    	<p>{{ Form::label('genre', 'Book Genre')}}</p>
				    	{{Form::select('genre', ['Detective' => 'Detective', 'Fairy tale' => 'Fairy Tale', 'Historical' => 'Historical'])}}
				    </div>
				    <!-- <div class="form-group">
				    	{{ Form::label('describtion', 'Book Describtion')}}
				    	{{ Form::text('describtion', '', ['class' => 'form-control', 'placeholder' => 'Book Describtion'] )}}
				    </div> -->
				    <div class="form-group">
				    	{{ Form::label('isbn', 'ISBN')}}
				    	{{ Form::text('isbn', '', ['class' => 'form-control', 'placeholder' => 'ISBN'] )}}
				    </div>
				    <div class="form-group">
				    	{{ Form::label('country', 'Country')}}
				    	{{ Form::text('country', '', ['class' => 'form-control', 'placeholder' => 'Country'] )}}
				    </div>
				    <div class="form-group">
				    	{{ Form::label('language', 'Language')}}
				    	{{ Form::text('language', '', ['class' => 'form-control', 'placeholder' => 'Language'] )}}
				    </div>
				    <div class="form-group">
				    	<p>{{ Form::label('publishedYear', 'Published Year')}}</p>
				    	{{Form::date('publishedYear')}}
				    </div>
				   <div class="form-group">
				    	<p>{{ Form::label('cover_image', 'Cover Image')}}</p>
				    	{{Form::file('cover_image')}}
				    </div>
				    <div class="form-group">
				    	<p>{{ Form::label('attachedFile', 'Attached File')}}</p>
				    	{{Form::file('attachedFile')}}
				    </div>
				    <div class="form-group">
				    	{{ Form::label('bookRank', 'Book Rank')}}
				    	{{ Form::text('bookRank', '', ['class' => 'form-control', 'placeholder' => 'Book Rank'] )}}
				    </div>
				   	{{ Form::submit('Add', ['class' => 'btn btn-primary'])}}
					{!! Form::close() !!}
		</div>
		</div>
	</div>
@endsection