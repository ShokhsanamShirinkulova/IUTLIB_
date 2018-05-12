@extends('layouts.app')

@section('content')
	<div class="container">
    <div class="card">
      <div class="card-header">
        <div class="row">
          <div class="col-md-6">
            <h3>Books</h3>
          </div>
          <div class="col-md-6">
            <div class="row">
            <div class="col-md-9" style="float: right;">
              <a href="/books/create" class="btn bookAddBtn">Add book</a>
            </div>
            <div class="col-md-3">
              <a href="/books/" class="btn bookAddBtn">Give book</a>
            </div>
            </div>
          </div>
        </div>
      </div>
  
		@if(count($books) > 0)
		<div class="row">
      <div class="col-md-12">
        <table class="table">
          <tr>
        	  <th>Cover Page</th>
            <th>Book ID</th>
            <th>Book Type</th>
            <th>Book Name</th>
        	  <th>Book Author</th>
            <th>Published Year</th>
            <th>Book Rank</th>
            @if(!Auth::guest())
				      @if(Auth::user()->userType == 2)
                <th></th>
                <th></th>
              @endif
					  @endif
          </tr>
				  @foreach($books as $book)
            <tr>
          	  <td style="width:10%">
                <img style="width:100%" src="/storage/cover_images/{{$book->cover_image}}" alt="cover_image">
              </td>
              <td>{{$book->bookID}}</td>
              <td>{{$book->bookType}}</td>
              <td>{{$book->bookName}}</td>
              <td>{{$book->bookAuthor}}</td>
              <td>{{$book->publishedYear}}</td>
              <td>{{$book->bookRank}}</td>
				      @if(!Auth::guest())
							  @if(Auth::user()->userType == 2)
  								<td><a href="/books/{{$book->id}}/edit" class="btn btn-primary">Edit</a></td>
  								<td>{!! Form::open(['action' => ['BooksController@destroy', $book->id], 'method' => 'POST', 'style' => 'display: inline; float: right']) !!}
  									{{ Form::hidden('_method', 'DELETE') }}
  									{{ Form::submit('Delete', ['class' => 'btn btn-danger']) }}
  								  {!! Form::close() !!}
                  </td>
							  @endif
						  @endif
            </tr>
	    		@endforeach
        </table>
		</div>
		@else
			<h3>There is No Books</h3>
		@endif
    <div class="paginationBlock">
	    {{ $books->links() }}
    </div>
  </div>
</div>
</div>
@endsection