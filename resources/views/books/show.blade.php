@extends('layouts.app')

@section('content')
		<div class="container">
			<div class="row">
                <table class="table table-striped">
                    <tr>
	                    <td>User ID</td>
	                    <td>{{$book->bookID}}</td>
	                    <td>First Name</td>
	                    <td>{{$book->bookName}}</td>
	                    <td>Last Name</td>
	                    <td>{{$book->bookAuthor}}</td>
	                	<td>Book Type</td>
	                	<td>
		                    @if($book->bookType == 0) 
		                        Student
		                    @elseif($book->bookType == 1) 
		                        Teacher
		                    @elseif($book->bookType == 2)
		                        Librarian
		                    @endif 
	                	</td>
	                    <td>Published Year</td>
	                    <td>{{$book->publishedYear}}</td>
	                    <td>Book Rank</td>
	                    <td>{{$book->bookRank}}</td>
                	</tr>
                    <tr>
				   		<td><a href="/books/{{$book->id}}/edit" class="btn btn-primary">Edit</a></td>
						<td>
							{!! Form::open(['action' => ['BooksController@destroy', $book->id], 'metdod' => 'POST', 'style' => 'display: inline; float: right']) !!}
								{{ Form::hidden('_metdod', 'DELETE') }}
								{{ Form::submit('Delete', ['class' => 'btn btn-danger']) }}
							{!! Form::close() !!}
						</td>
                    </tr>
		    	</table>
			</div>
		<hr style="border: 3px solid #888">
	</div>
@endsection