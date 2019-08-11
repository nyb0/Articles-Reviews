<?php

namespace ARTICLES\Http\Controllers\Auth;

use ARTICLES\User;
use ARTICLES\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Storage;

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
    protected $redirectTo = '/';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'is_registered' => ['required', Rule::in([0, 1]) ],
            'name' => ['required', 'string', 'max:100'],
            'email' => ['required', 'string', 'email', 'max:100', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ],[
            'name.required' => 'Please, enter your name.',
            'email.required' => 'Please, provide your email.',
            'email.email' => 'Provided email is invalid.',
            'email.unique' => 'User with this email already exists.',
            'password.confirmed' => 'Passwords does not match.'
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \ARTICLES\User
     */
    protected function create(array $data)
    {
        //MAKE_DIRECTORY_WITH_USER_NAME_FOR_UPLOADED_IMG
        Storage::disk('public')->makeDirectory('/images/users/'. $data['name'] . '/comments');

        return User::create([
            'is_registered' => $data['is_registered'],
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
        ]);
    }
}
