@extends('layouts.app')

@section('content')
		<style>
		    #bookGenre, #course{
		      display: none;
		      margin: 3px 30px;
		    }
	  	</style>
        <div class="MyForm container">
        
            <div class="card">
                <div class="card-header">{{ __('Edit Book\'s Data') }}</div>

                <div class="card-body">
		        	{!! Form::open(['action' => ['BooksController@update',$book->id], 'method' => 'POST', 'enctype'=>'multipart/form-data'])!!}
					    <div class="form-group">
					    	{{ Form::label('bookID', 'Book ID')}}
					    	{{ Form::text('bookID', $book->bookID, ['class' => 'form-control', 'placeholder' => 'Book ID'])}}
					    </div>
					    <div class="form-group">
					    	{{ Form::label('bookName', 'Book Name')}}
					    	{{ Form::text('bookName', $book->bookName, ['class' => 'form-control', 'placeholder' => 'Book Name'] )}}
					    </div>
					    <div class="form-group">
					    	{{ Form::label('bookAuthor', 'Book Author')}}
					    	{{ Form::text('bookAuthor', $book->bookAuthor, ['class' => 'form-control', 'placeholder' => 'Book Author'] )}}
					    </div>
					    <div class="row">
					    <div class="col-md-6">
						    <div class="form-group">
						    	<select id='bookType' name="bookType" onchange='check("bookType");'>
						          <option selected hidden disabled>Book type</option>
						          <option value="Science" {{-- {{ ($book->bookType == 'Science') ? "selected" : "" }} --}}>Science</option>
						          <option value="Literature" {{-- {{ ($book->bookType == 'Literature') ? "selected" : "" }} --}}>Literature</option>
						          <option value="Textbook" {{-- {{ ($book->bookType == 'Textbook') ? "selected" : "" }} --}}>Textbooks</option>
						          <option value="Other" {{-- {{ ($book->bookType == 'Other') ? "selected" : "" }} --}}>Other</option>
						        </select>
						    </div>
					    </div>

					    <div class="col-md-6">
						    <select id='bookGenre' value="{{ $book->bookGenre }}" multiple>
					          <option selected hidden disabled>Book genre</option>
					          <option value="Romance">Romance</option>
					          <option value="Horror">Horror</option>
					          <option value="Fantasy">Fantasy</option>
					          <option value="Comedy">Comedy</option>
					          <option value="Mystery">Mystery</option>
					        </select>

					    	<select id='course'>
					          <option selected hidden disabled>Semester</option>
					          <option value="1">1</option>
					          <option value="2">2</option>
					          <option value="3">3</option>
					          <option value="4">4</option>
					          <option value="5">5</option>
					          <option value="6">6</option>
					          <option value="7">7</option>
					          <option value="8">8</option>
					        </select>
					    </div>
				    </div>
					    <div class="form-group">
					    	{{ Form::label('describtion', 'Book Describtion')}}
					    	{{ Form::textarea('describtion', $book->describtion , ['class' => 'form-control', 'placeholder' => 'Book Describtion'] )}}
					    </div>
					    <div class="form-group">
					    	{{ Form::label('isbn', 'ISBN')}}
					    	{{ Form::text('isbn', $book->isbn, ['class' => 'form-control', 'placeholder' => 'ISBN'] )}}
					    </div>
					    <div class="form-group">
					    	{{ Form::label('country', 'Country')}}
					    	{{ Form::text('country', $book->country, ['class' => 'form-control', 'placeholder' => 'Country'] )}}
					    </div>
					    <div class="form-group">
					    	{{ Form::label('language', 'Language')}}
					    	{{ Form::text('language', $book->language, ['class' => 'form-control', 'placeholder' => 'Language'] )}}
					    </div>
					    <div class="form-group">
					    	<p>{{ Form::label('publishedYear', 'Published Year')}}</p>
					    	{{Form::date('publishedYear', \Carbon\Carbon::parse($book->publishedYear))}}
					    </div>
					    <div class="form-group">
					    	<p>{{ Form::label('cover_image', 'Upoad the cover image')}}</p>
					    	{{Form::file('cover_image')}}
					    </div>
					    <div class="form-group">
					    	<p>{{ Form::label('attachedFile', 'Attached File')}}</p>
					    	{{Form::file('attachedFile')}}
					    </div>
					    <div class="form-group">
					    	{{ Form::label('bookRank', 'Book Rank')}}
					    	{{ Form::text('bookRank', $book->bookRank, ['class' => 'form-control', 'placeholder' => 'Book Rank'] )}}
					    </div>
					    {{Form::hidden('_method','PUT')}}
					   	{{ Form::submit('Edit', ['class' => 'btn btn-primary'])}}
					{!! Form::close() !!}
			</div>
		</div>
	</div>
	<script>
  function check(bookType) {
    var sel = document.getElementById('bookType');
    var bookGenre = document.getElementById('bookGenre');
    var course = document.getElementById('course');
    var dropDown_sel = sel.options[sel.selectedIndex].text;
    if (dropDown_sel == "Literature") {
      bookGenre.style.display = 'inline';
      course.style.display = 'none';
    } 
    else if(dropDown_sel == "Textbooks") {
      course.style.display = 'inline';
      bookGenre.style.display = 'none';
    } 
    else{
      bookGenre.style.display = 'none';
      course.style.display = 'none';
    }
  }
</script>
@endsection