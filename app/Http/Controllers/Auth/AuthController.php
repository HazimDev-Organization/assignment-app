<?php
namespace App\Http\Controllers\Auth;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\Student;
use App\Models\Lecturer;
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
    $request->validate([
        'name' => 'required',
        'email' => 'required|email|unique:users',
        'password' => 'required|min:6',
        'role' => 'required|in:lecturer,student',
    ]);

    $data = $request->all();
    $user = $this->create($data);

    // After user creation, check role and create student or lecturer record
    if ($user) {
        if ($data['role'] == 'student') {
            Student::create([
                'email' => $user->email,
                'name' => $user->name,
                'role' => $user->role,
                'faculty_id' => 1, // default faculty ID
                'profile_pic' => null // default profile picture
            ]);
        } elseif ($data['role'] == 'lecturer') {
            Lecturer::create([
                'email' => $user->email,
                'name' => $user->name,
                'role' => $user->role,
                'faculty_id' => 1, // default faculty ID
                'profile_pic' => null // default profile picture
            ]);
        }
    }

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
    
    $credentials = $request->only('email', 'password');
    
    if (Auth::attempt($credentials)) {
        // Check the role of the authenticated user
        $user = Auth::user();
        if ($user->role === 'student') {
            return redirect('/student-dashboard')->withSuccess('You are successfully logged in to student page.');
        } elseif ($user->role === 'lecturer') {
            return redirect('/dashboard')->withSuccess('You are successfully logged in to lecturer page.');
        } else {
            return redirect('/dashboard')->withSuccess('You are successfully logged in.');
        }
    }
    
    return redirect('/')->withSuccess('Your login credentials are incorrect.');
}

    public function logout(){
        Session::flush();
        Auth::logout();
        return redirect('/');
    }

    public function dashboard()
    {
        if(Auth::check()) {
            return view('lecturer/dashboard');
        }
        return redirect('/')->withSuccess('Please login to access the dashboard page.');
    }
    
}
