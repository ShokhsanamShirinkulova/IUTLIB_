@extends('layouts.app')

@section('content')
        <div class="container">
        <h1>Edit A Member's Data</h1>
        	{!! Form::open(['action' => ['MembersController@update',$member->id], 'method' => 'POST' ])!!}
		    <div class="form-group">
		    	{{ Form::label('userID', 'User ID')}}
		    	{{ Form::text('userID', $member->userID, ['class' => 'form-control', 'placeholder' => 'User ID'] )}}
		    </div>
		    <div class="form-group">
		    	{{ Form::label('firstName', 'First Name')}}
		    	{{ Form::text('firstName', $member->firstName, ['class' => 'form-control', 'placeholder' => 'First Name'] )}}
		    </div>
		    <div class="form-group">
		    	{{ Form::label('lastName', 'Last Name')}}
		    	{{ Form::text('lastName', $member->lastName, ['class' => 'form-control', 'placeholder' => 'Last Name'] )}}
		    </div>
		    <div class="form-group">
		    	<p>{{ Form::label('userType', 'User Type')}}</p>
		    	{{Form::select('userType', ['0' => 'Student', '1' => 'Teacher', '2' => 'Librarian'], $member->userType)}}
		    </div>
		    <div class="form-group">
		    	<p>{{ Form::label('dob', 'Date Of Birth')}}</p>
		    	{{Form::date('dob', \Carbon\Carbon::parse($member->dob))}}
		    </div>
		    <div class="form-group">
		    	<p>{{ Form::label('registeredDate', 'Registered Date')}}</p>
		    	{{Form::date('registeredDate', \Carbon\Carbon::parse($member->registeredDate))}}
		    </div>
		    <div class="form-group">
		    	{{ Form::label('phoneNumber', 'Phone Number')}}
		    	{{ Form::text('phoneNumber', $member->phoneNumber, ['class' => 'form-control', 'placeholder' => 'Phone Number'] )}}
		    </div>
		    <div class="form-group">
		    	{{ Form::label('email', 'E-mail')}}
		    	{{Form::email('email', $member->email, ['class' => 'form-control', 'placeholder' => 'E-mail'] )}}
		    </div>
		    <div class="form-group">
		    	{{ Form::label('password', 'Password')}}
		    	{{Form::password('password', ['class' => 'form-control', 'placeholder' => 'Password'] )}}
		    </div>
		    <div class="form-group">
		    	{{ Form::label('password_confirmation', 'Comfirm Password')}}
		    	{{Form::password('password_confirmation', ['class' => 'form-control', 'placeholder' => 'Comfirm Password'] )}}
		    </div>
		    {{Form::hidden('_method','PUT')}}
			   	{{ Form::submit('Edit', ['class' => 'btn btn-primary'])}}
				{!! Form::close() !!}
			</div>
@endsection