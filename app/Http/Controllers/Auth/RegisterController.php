<?php

namespace App\Http\Controllers\Auth;

use App\Model\User;
use App\Model\Company;
use Illuminate\Http\Request;
use App\Model\CompanySubrole;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use App\Providers\RouteServiceProvider;
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
    protected $redirectTo = RouteServiceProvider::HOME;

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
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    protected function create(array $data)
    {
        return User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
        ]);
    }

    public function registerBusiness()
    {
        return view('auth.registerBusiness');
    }

    public function registerBusinessPost(Request $request)
    {
         $validation = Validator::make($request->all(),
        [ 
            'name' => ['required', 'string', 'max:255','min:3'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
            'title' => ['required', 'string', 'max:255','min:3'],
            'description' => ['nullable', 'string', 'max:255'],
            'company_code' => ['nullable', 'string'],
            'address' => ['nullable'],
            'zip_code' => ['nullable'],
            'city' => ['nullable'],
            'status' => ['nullable'],
            'country' => ['nullable'],
 
        ]);

        if($validation->fails())
        {

            // dd($validation);
            
            return back()
            ->with('warning', 'Please, fill-up all the fields correctly and try again')
            ->withInput()
            ->withErrors($validation);
        }

        // dd($request->all());

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        $company = new Company; 
        $company->user_id = $user->id;
        $company->title = $request->title ?: $company->title;
        $company->description = $request->description ?: null;
        $company->company_code = $request->company_code ?: $company->company_code;
        
        // $company->mobile = $request->mobile ?: $company->mobile;
        // $company->email = $request->email ?: $company->email;
        $company->mobile = $user->mobile;
        $company->email = $user->email;
        $company->address = $request->address ?: $company->address;
        $company->zip_code = $request->zip_code ?: $company->zip_code;
        $company->city = $request->city ?: $company->city;
        $company->country = $request->country ?: $company->country;
        $company->status = $request->status ? 'active' : 'inactive';
        $company->editedby_id = $user->id;
        $company->status = 'active';

        $company->save();

        $subrole = new CompanySubrole;
        $subrole->addedby_id = $user->id;
        $subrole->company_id = $company->id;
        $subrole->user_id = $user->id;
        $subrole->title = 'member';
        $subrole->status = 'active';
        $subrole->save();

        return redirect()->route('login')->with('success', 'Your business account successfully created. please login now');
    }
}
