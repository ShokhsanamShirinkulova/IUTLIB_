@extends('layouts.app')

@section('content')
        <div class="MyForm container">
        
            <div class="card">
                <div class="card-header">{{ __('Add A Member') }}</div>

                <div class="card-body">
        	{!! Form::open(['action' => 'MembersController@store', 'method' => 'POST' ])!!}
		    <div class="form-group">
		    	{{ Form::label('userID', 'User ID')}}
		    	{{ Form::text('userID', '', ['class' => 'form-control', 'placeholder' => 'User ID'] )}}
		    </div>
		    <div class="form-group">
		    	{{ Form::label('firstName', 'First Name')}}
		    	{{ Form::text('firstName', '', ['class' => 'form-control', 'placeholder' => 'First Name'] )}}
		    </div>
		    <div class="form-group">
		    	{{ Form::label('lastName', 'Last Name')}}
		    	{{ Form::text('lastName', '', ['class' => 'form-control', 'placeholder' => 'Last Name'] )}}
		    </div>
		    <div class="form-group">
		    	<p>{{ Form::label('userType', 'User Type')}}</p>
		    	{{Form::select('userType', ['0' => 'Student', '1' => 'Teacher', '2' => 'Librarian'])}}
		    </div>
		    <div class="form-group">
		    	<p>{{ Form::label('dob', 'Date Of Birth')}}</p>
		    	{{Form::date('dob','', ['class' => 'form-control'])}}
		    </div>
		    <div class="form-group">
		    	<p>{{ Form::label('registeredDate', 'Registered Date')}}</p>
		    	{{Form::date('registeredDate','', ['class' => 'form-control'])}}
		    </div>
		    <div class="form-group">
		    	{{ Form::label('phoneNumber', 'Phone Number')}}
		    	{{ Form::text('phoneNumber', '', ['class' => 'form-control', 'placeholder' => 'Phone Number'] )}}
		    </div>
		    <div class="form-group">
		    	{{ Form::label('email', 'E-mail')}}
		    	{{Form::email('email', '', ['class' => 'form-control', 'placeholder' => 'E-mail'] )}}
		    </div>
		    <div class="form-group">
		    	{{ Form::label('password', 'Password')}}
		    	{{Form::password('password', ['class' => 'form-control', 'placeholder' => 'Password'] )}}
		    </div>
		    <div class="form-group">
		    	{{ Form::label('password_confirmation', 'Comfirm Password')}}
		    	{{Form::password('password_confirmation', ['class' => 'form-control', 'placeholder' => 'Comfirm Password'] )}}
		    </div>
		   	{{ Form::submit('Add', ['class' => 'btn btn-primary'])}}
			{!! Form::close() !!}
		</div>
	</div>
</div>
@endsection