<?php
namespace App\Http\Controllers\Auth;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Session;

class AuthController extends Controller
{
    public function index(){
        return view('auth.login');
    }    
    
    public function register(){
        return view('auth.signup');
    }

    public function postRegistration(Request $request)
    {
        //dd($request->all());
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:6',
            'role' => 'required|in:lecturer,student',
        ]);
    
        $data = $request->all();
        $createUser = $this->create($data);
        return redirect('/')->withSuccess('You are registered Successfully.');
    }

    public function create(array $data)
    {
        return User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'role' => $data['role'], // Ensure this line correctly assigns the role
            'password' => bcrypt($data['password']), // Ensure password is hashed
        ]);
    }
    

    public function postLogin(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);
        $checkLoginCredentials = $request->only('email','password');
        if(Auth::attempt($checkLoginCredentials))
        {
            return redirect('/dashboard')->withSuccess('You are successfully loggedin.');
        }
        return redirect('/login')->withSuccess('You login credentials are incorrect.');
    }


    public function logout(){
        Session::flush();
        Auth::logout();
        return redirect('login');
    }

    public function dashboard()
    {
        if(Auth::check()) {
            return view('lecturer/dashboard');
        }
        return redirect('/login')->withSuccess('Please login to access the dashboard page.');
    }
    
}
