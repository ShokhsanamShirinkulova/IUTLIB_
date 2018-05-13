<?php

namespace IUTLib\Http\Controllers;

use Illuminate\Http\Request;
use IUTLib\Member;

class MembersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        if (auth()->user()->userType != 2) {
            return redirect('/pagenotfound');
        }
        $members = Member::orderBy('userID', 'asc' /*'desc'*/)->paginate(10);
        return view('members.index')->with('members', $members);
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if (auth()->user()->userType != 2) {
            return redirect('/pagenotfound');
        }
        return view('members.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if (auth()->user()->userType != 2) {
            return redirect('/pagenotfound');
        }
        $this->validate($request,[
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

        $member = new Member;
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
        return redirect('/members')->with('success', 'A Member added');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
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
        $member = Member::find($id);
        if (empty($member) || (auth()->user()->userType != 2 && auth()->user()->id != $member->id)) {
            return redirect('/pagenotfound');
        }
        $this->validate(
            [$id => 'required|integer']);


        // Check fo correct user id
        return view('members.edit')->with('member', $member);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $member = Member::find($id);
        if (empty($member) || (auth()->user()->userType != 2 && auth()->user()->id != $member->id)) {
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
            'password' => 'required|confirmed|min:6'
        ]);

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
        return redirect('/members')->with('success', 'This Member\'s Data Changed');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $member = Member::find($id);

        // Check fo correct user id
        if (empty($member) || (auth()->user()->userType != 2 && auth()->user()->id != $member->id)) {
            return redirect('/pagenotfound');
        }
        $member->delete();
        return redirect('/members')->with('success', 'Post Removed');
    }
}
