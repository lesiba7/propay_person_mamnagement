<?php

namespace App\Http\Controllers;
use Session;
use App\User;
use App\Language;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class UsersController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
	/**
     * Display a listing of the resource.
     *
     * return Response
     */
	public function index()
    {
        //
        //dd("here");
        $user = User::latest()->get();
    	return view('user.index')->with('user',$user);
        
    }
	/**
     * Display the specified resource.
     *
     * param  int  $id
     * return Response
     */
    public function show($id)
    {
        //
        $user = User::findOrFail($id);
        $language = Language::findOrFail($id);
        $user->lan = $language->name;
        $user->user_role = ($user->role== 1 ? 'admin user' : 'normal user');
        //$user->user_status = ($user->status== 1 ? 'active' : 'inactive');
      	return view('user.show')->with('user',$user);
    }

	/**
     * Show the form for editing the specified resource.
     *
     * param  int  $id
     * return Response
     */
	public function edit($id)
    {
        //
        $user = User::findOrFail($id);
        $language = Language::latest()->get();
        $curentLanguage = Language::findOrFail($user->language);
        $user->lan = compact("language");
        $user->current_lan = $curentLanguage->id;
    	return view('user.edit')->with('user',$user);
    }

	/**
     * Update the specified resource in storage.
     *
     * param  int  $id
     * return Response
     */
    public function update($id, Request $request)
	{
	    $user = User::findOrFail($id);

	    $this->validate($request, [
	        'first_name' => 'required|max:15|min:2',
            'surname' => 'required|max:15|min:2',
            //'email' => 'unique:users,email|required|email|max:35|min:2',
            'mobile' => 'required|integer|min:10',
            'dob' => 'required|date|date_format:Y-m-d',
            'language' => 'required|integer',
            //'role' => 'required|integer',
            //'status' => 'required|integer',
	    ]);


	    //$input = $request->all();
	    //dd($request->all());

	    $user->fill($request->all())->save();

	    Session::flash('flash_message', 'User successfully updated!');

	    return redirect()->back();
	    //return redirect()->route('language.show')->with('id',$id);
	}
    /**
     * Store a newly created resource in storage.
     *
     * return Response
     */
    public function create()
    {
        $languages = Language::latest()->get();
        $languages = compact('languages');
        return view('user.create')->with('languages',$languages);
    }
    
    /**
     * Store a newly created resource in storage.
     *
     * return Response
     */

    public function store(Request $request)
    {
        $this->validate($request, [
            'first_name' => 'required|max:255',
            'surname' => 'required|max:255',
            'mobile' => 'required|integer|min:10',
            'dob'=>'required|max:10',
            'language'=>'required|max:15',
            'email' => 'required|email|max:255|unique:users',
            'password' => 'required|min:6|confirmed',
        ]);

        $input = $request->all();

        User::create($input);

        Session::flash('flash_message', 'User successfully added!');

        return redirect('user');
    }
    /**
     * Remove the specified resource from storage.
     *
     * param  int  $id
     * return Response
     */
    public function destroy($id)
    {
        //
         $user = User::findOrFail($id);

	    $user->delete();

	    Session::flash('flash_message', 'Language successfully deleted!');

	    return redirect()->route('user.index');
    }

}
