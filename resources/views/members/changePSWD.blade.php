@extends('layouts.app')

@section('content')
    <div class="MyForm container">
        <div class="card">
            <div class="card-header">{{ __('Change Password') }}</div>
                <div class="card-body">
		        	{!! Form::open(['action' => ['PasswordsController@update', $member->id], 'method' => 'PATCH' ])!!}
		    		<div class="form-group">
				    	{{ Form::hidden('userID', $member->userID)}}
				    </div>
				    <div class="form-group">
				    	{{ Form::hidden('firstName', $member->firstName)}}
				    </div>
				    <div class="form-group">
				    	{{ Form::hidden('lastName', $member->lastName)}}
				    </div>
				    <div class="form-group">
				    	{{Form::hidden('userType', $member->userType)}}
				    </div>
				    <div class="form-group">
				    	{{Form::hidden('dob', $member->dob)}}
				    </div>
				    <div class="form-group">
				    	{{Form::hidden('registeredDate', $member->registeredDate)}}
				    </div>
				    <div class="form-group">
				    	{{ Form::hidden('phoneNumber', $member->phoneNumber)}}
				    </div>
				    <div class="form-group">
				    	{{Form::hidden('email', $member->email)}}
				    </div>
				    <div class="form-group">
				    	{{ Form::label('current_password', 'Current Password')}}
				    	{{Form::password('current_password', ['class' => 'form-control', 'placeholder' => 'Current Password'] )}}
				    </div>
				    <div class="form-group">
				    	{{ Form::label('password', 'New Password')}}
				    	{{Form::password('password', ['class' => 'form-control', 'placeholder' => 'Password'] )}}
				    </div>
				    <div class="form-group">
				    	{{ Form::label('password_confirmation', 'Confirm Password')}}
				    	{{Form::password('password_confirmation', ['class' => 'form-control', 'placeholder' => 'Confirm Password'] )}}
				    </div>
				   	{{ Form::submit('Change', ['class' => 'btn btn-primary'])}}
				{!! Form::close() !!}
			</div>
		</div>
	</div>
@endsection