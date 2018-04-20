@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Dashboard</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success">
                            <td>{{ session('status') }}</td>
                        </div>
                    @endif
                    <table class="table table-striped">
                        <tr>
                            <td>User ID</td>
                            <td>{{ Auth::user()->userID }}</td>
                        </tr>
                        <tr>
                            <td>Full Name</td>
                            <td>{{ Auth::user()->firstName . ' ' . Auth::user()->lastName }}</td>
                        </tr>
                        <tr>
                            <td>Birth Date</td>
                            <td>{{ Auth::user()->dob }}</td>
                        </tr>
                        <tr>
                            <td>Registered Date</td>
                            <td>{{ Auth::user()->registeredDate }}</td>
                        </tr>
                        <tr>
                            <td>E-mail</td>
                            <td>{{ Auth::user()->email }}</td>
                        </tr>
                        <tr>
                            <td>Phone Number</td>
                            <td>{{ Auth::user()->phoneNumber }}</td>
                        </tr>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
