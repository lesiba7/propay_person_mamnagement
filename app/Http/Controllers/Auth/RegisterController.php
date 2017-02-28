<?php

namespace App\Http\Controllers\Auth;

use App\User;
use App\Language;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\View;
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
    protected $languages;

    
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
        //$this->languages = ['' => 'Select Country'] + Languages::lists('name', 'id')->all();
        //$languages = Language::pluck('name', 'id')->all();
        //dd($languages);
    }
    //

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'first_name' => 'required|max:255',
            'surname' => 'required|max:255',
            'mobile' => 'required|integer|min:10',
            'dob'=>'required|max:10',
            'language'=>'required|max:15',
            'email' => 'required|email|max:255|unique:users',
            'password' => 'required|min:6|confirmed',
        ]);
    }
    
    
    //generate list of languages
    public function index(){
        return true;
    }
    
    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return User
     */
    protected function create(array $data)
    {
        //dd($data);
        return User::create([
            'first_name'=>$data['first_name'],
            'surname' => $data['surname'],
            'mobile'=>$data['mobile'],
            'language'=>$data['language'],
            'dob'=>$data['dob'],
            'email' => $data['email'],
            'password' => bcrypt($data['password']),
        ]);
    }
}
