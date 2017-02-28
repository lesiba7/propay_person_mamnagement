<?php

namespace App\Http\Controllers;
use Session;
use App\Language;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class LanguagesController extends Controller
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
        $languages = Language::latest()->get();
    	return view('language.index')->with('languages',$languages);
        
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
        $language = Language::findOrFail($id);
      	return view('language.show')->with('language',$language);
    }
    
    /**
     * Get Language  Name by ID.
     *
     * param  int  $id
     * return Language Name
     */
    public function getLanguageNameById($id)
    {
        //
        $language = Language::findOrFail($id);
        return $language->name;
    }
    /**
     * Store a newly created resource in storage.
     *
     * return Response
     */
    public function create()
	{

	    return view('language.create');
	}
	
	/**
     * Store a newly created resource in storage.
     *
     * return Response
     */

	public function store(Request $request)
	{
		$this->validate($request, [
        	'name' => 'required|max:15|min:2',
	    ]);

	    $input = $request->all();

	    Language::create($input);

	    Session::flash('flash_message', 'Language successfully added!');

	    return redirect('language');
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
        $language = Language::findOrFail($id);
  
    	return view('language.edit')->with('language',$language);
    }

	/**
     * Update the specified resource in storage.
     *
     * param  int  $id
     * return Response
     */
    public function update($id, Request $request)
	{
	    $language = Language::findOrFail($id);

	    $this->validate($request, [
	        'name' => 'required|max:15|min:2',
	    ]);

	    //$input = $request->all();
	    //dd($request->name);
	    $language->fill($request->all())->save();

	    Session::flash('flash_message', 'Language successfully updated!');

	    return redirect()->back();
	    //return redirect()->route('language.show')->with('id',$id);
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
         $language = Language::findOrFail($id);

	    $language->delete();

	    Session::flash('flash_message', 'Language successfully deleted!');

	    return redirect()->route('language.index');
    }
}
