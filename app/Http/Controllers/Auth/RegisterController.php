<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use App\User;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;
use App\Model\Specialization;

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
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    // $this->spec = Specialization::all();
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        // if (empty($data["specializations"])) {
        //     $data["specializations"] = [];
        // }
        // dd($data);
        return Validator::make($data, [
            'firstname' => ['required', 'string', 'max:60'],
            'lastname' => ['required', 'string', 'max:60'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
            'specializations' => ['required','exists:App\Model\Specialization,id'],
            'address' => ['required', 'string', 'max:255'],
        ]);
    }

    // NON CAMBIARE NOME!!!
    public function showRegistrationForm()
    {
        $spec = Specialization::all();
        return view('auth.register', compact('spec'));
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    protected function create(array $data)
    {

        // SALVA SPECIALIZATIONS
        $slug = User::createSlug($data['firstname'] . '-' . $data['lastname'], '-');

        $user = User::create([
            'firstname' => $data['firstname'],
            'lastname' => $data['lastname'],
            'email' => $data['email'],
            'slug' => $slug,
            'password' => Hash::make($data['password']),
            'address' => $data['address'],
        ]);

        $user->specializations()->attach($data['specializations']);

        return $user;
    }
}
