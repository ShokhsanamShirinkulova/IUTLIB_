@extends('layouts.app')

@section('content')
<div class="container">
  <div class="row justify-content-center">
    <div class="col-md-8">
    	<div class="personalInfoBlock">
        <div class="card">
          <div class="card-header">
          	<h4><i class="fas fa-info-circle"></i> Personal Information </h4>
          </div>
          <div class="card-body">
            @if (session('status'))
              <div class="alert alert-success">
                {{ session('status') }}
              </div>
            @endif
            <h2 class="greetingMessage">Welcome, Dear 
            	<span>
              @if(Auth::user()->userType == 0) 
                {{Auth::user()->firstName}}
              @elseif(Auth::user()->userType == 1) 
                {{Auth::user()->firstName}}
              @elseif(Auth::user()->userType == 2)
                {{Auth::user()->firstName}}
              @endif 
              </span>
            </h2>
            <hr>
            <table class="table">
              <tr>
                <td><i class="fas fa-id-card-alt"></i> User ID</td>
                <td>{{Auth::user()->userID}}</td>
              </tr>
              <tr>
                <td><i class="fas fa-user"></i> Full Name</td>
                <td>{{Auth::user()->firstName}} {{Auth::user()->lastName}}</td>
              </tr>
              <tr>
                <td><i class="fas fa-calendar-alt"></i> Date of Birth</td>
                <td>{{Auth::user()->dob}}</td>
              </tr>
              <tr>
                <td><i class="fas fa-sign-in-alt"></i> Registered Date</td>
                <td>{{Auth::user()->registeredDate}}</td>
              </tr>
              <tr>
                <td><i class="fas fa-phone"></i> Phone Number</td>
                <td>{{Auth::user()->phoneNumber}}</td>
              </tr>
              <tr>
                <td><i class="fas fa-envelope"></i> E-mail</td>
                <td>{{Auth::user()->email}}</td>
              </tr>
            </table>
         	</div>
    		</div>
      </div>
      <br>
    </div>
  </div>
</div>
@endsection
