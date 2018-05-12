<?php

namespace IUTLib\Http\Controllers;

use Hash;
use IUTLib\Member;
use Illuminate\Http\Request;

class PasswordsController extends Controller{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(){
        return redirect('/pagenotfound');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(){
        return redirect('/pagenotfound');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request){
        return redirect('/pagenotfound');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id){
        return redirect('/pagenotfound');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $member = Member::findOrFail($id);
        if (is_null($member) || auth()->user()->id != $member->id) {
            return redirect('/pagenotfound');
        }
        return view('members.changePSWD')->with('member', $member);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    public function update(Request $request, $id){
        $member = Member::findOrFail($id);
        if (auth()->user()->id != $member->id) {
            return redirect('/pagenotfound');
        }
        $this->validate($request,[
            'userID' => 'required|string'.($member->userID == $request->input('userID')? '':'|unique:users'),
            'firstName' => 'required|string|max:255',
            'lastName' => 'required|string|max:255',
            'userType' => 'required|integer',
            'dob' => 'required|date|after:' . date('1988-01-01'),
            'registeredDate' => 'required|date|after: ' . date('2014-09-01') . '|before:tomorrow',
            'phoneNumber' => 'required|string|max:255',
            'email' => 'required|email|max:255'.($member->email == $request->input('email')?'':'|unique:users'),
            'current_password' => 'required|min:6',
            'password' => 'required|confirmed|min:6',
        ]);
        if(!Hash::check($request->input('current_password'), auth()->user()->password)){
                return redirect('/passwords/'.$id.'/edit')->with('error', 'Wrong Current Password');
        }
        $member->userID = $request->input('userID');
        $member->firstName = $request->input('firstName');
        $member->lastName = $request->input('lastName');
        $member->userType = $request->input('userType');
        $member->dob = $request->input('dob');
        $member->registeredDate = $request->input('registeredDate');
        $member->phoneNumber = $request->input('phoneNumber');
        $member->email = $request->input('email');
        $member->password = bcrypt($request->input('password'));
        $member->save(); 
        return redirect('/home')->with('success', 'This Member\'s Data Changed');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id){
        return redirect('/pagenotfound');   
    }
}
