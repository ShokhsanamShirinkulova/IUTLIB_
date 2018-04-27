@extends('layouts.app')

@section('content')
		<div class="container">
			<div class="row">
                <table class="table table-striped">
                    <tr>
	                    <td>User ID</td>
	                    <td>{{$member->userID}}</td>
	                    <td>First Name</td>
	                    <td>{{$member->firstName}}</td>
	                    <td>Last Name</td>
	                    <td>{{$member->lastName}}</td>
	                	<td>User Type</td>
	                	<td>
		                    @if($member->userType == 0) 
		                        Student
		                    @elseif($member->userType == 1) 
		                        Teacher
		                    @elseif($member->userType == 2)
		                        Librarian
		                    @endif 
	                	</td>
	                    <td>Date of Birtd</td>
	                    <td>{{$member->dob}}</td>
	                    <td>Registered Date</td>
	                    <td>{{$member->registeredDate}}</td>
	                    <td>Phone Number</td>
	                    <td>{{$member->phoneNumber}}</td>
	                    <td>E-mail</td>
	                    <td>{{$member->email}}</td>
                	</tr>
                    <tr>
				   		<td><a href="/members/{{$member->id}}/edit" class="btn btn-primary">Edit</a></td>
						<td>
							{!! Form::open(['action' => ['MembersController@destroy', $member->id], 'metdod' => 'POST', 'style' => 'display: inline; float: right']) !!}
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