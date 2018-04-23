<?php

namespace IUTLib\Http\Controllers\Auth;

use IUTLib\User;
use IUTLib\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = '/home';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    // public function __construct()
    // {
    //     $this->middleware('guest');
    // }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
        {
            return Validator::make($data, [
              'userID' => 'required|string|unique:users',
              'firstName' => 'required|string|max:255',
              'lastName' => 'required|string|max:255',
              'userType' => 'required|integer',
              'dob' => 'required|date|after:' . date('1988-01-01'),
              'registeredDate' => 'required|date|after: ' . date('2014-09-01') . '|before:tomorrow',
              'phoneNumber' => 'required|string|max:255',
              'email' => 'required|email|max:255|unique:users',
              'password' => 'required|confirmed|min:6'
            ]);
        }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \IUTLib\User
     */
    protected function create(array $data)
    {
      return User::create([
        'userID' => $data['userID'],
        'firstName' => $data['firstName'],
        'lastName' => $data['lastName'],
        'userType' => $data['userType'],
        'dob' => $data['dob'],
        'registeredDate' => $data['registeredDate'],
        'phoneNumber' => $data['phoneNumber'],
        'email' => $data['email'],
        'password' => bcrypt($data['password'])
      ]);
    }
}
