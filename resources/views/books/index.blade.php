@extends('layouts.app')

@section('content')
		<div class="container">
	        <table class="table">
	        	<tr>
	        		<td>
	        			<h1>Books</h1>
	        		</td>
	        		<td>
	        			<a href="/books/create" class="btn btn-primary">Add book</a>
	        		</td>
	        	</tr>
	        </table>
			@if(count($books) > 0)
			<div class="row">
                <table class="table table-striped">
                    <tr>
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
                            <td>{{$book->bookID}}</td>
                            <td>{{$book->bookType}}</td>
                            <td>{{$book->bookName}}</td>
                            <td>{{$book->bookAuthor}}</td>
                        	<!-- <td>
                        				                    @if($book->bookType == 0) 
                        				                        Student
                        				                    @elseif($book->bookType == 1) 
                        				                        Teacher
                        				                    @elseif($book->bookType == 2)
                        				                        Librarian
                        				                    @endif 
                        	</td> -->
                            <td>{{$book->publishedYear}}</td>
                            <td>{{$book->bookRank}}</td>
					        @if(!Auth::guest())
								@if(Auth::user()->userType == 2)
									<td><a href="/books/{{$book->id}}/edit" class="btn btn-primary">Edit</a></td>
									<td>{!! Form::open(['action' => ['BooksController@destroy', $book->id], 'method' => 'POST', 'style' => 'display: inline; float: right']) !!}
										{{ Form::hidden('_method', 'DELETE') }}
										{{ Form::submit('Delete', ['class' => 'btn btn-danger']) }}
									{!! Form::close() !!}</td>
								@endif
							@endif
                        </tr>
		    		@endforeach
                </table>
			</div>
			@else
				<h3>There is No Books</h3>
			@endif
    	{{ $books->links() }}
	</div>
@endsection