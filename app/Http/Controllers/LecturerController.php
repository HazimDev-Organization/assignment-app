<?php

namespace App\Http\Controllers;
use App\Models\Lecturer;
use App\Models\Faculty;
use App\Models\Course;
use App\Models\Teach;
use Illuminate\Http\Request;

class LecturerController extends Controller
{
    
    public function login()
    {
        return view('lecturer/login');
    }

    public function signup()
    {
        return view('/signup');
    }
    
    public function dashboard()
    {
        $activeNavItem = 'dashboard';
    $lecturer_id = 1; // Hardcoded lecturer ID for now
    $lecturer = Lecturer::find($lecturer_id); // Fetch the lecturer data

    // Assuming you have defined the relationship between Lecturer and Faculty
    $faculty_id = $lecturer->faculty_id;
    $faculty = Faculty::find($faculty_id);

    $faculties = Faculty::all();

    return view('lecturer/dashboard', compact('activeNavItem', 'lecturer', 'faculty','faculties'));
    }

    public function updateProfile(Request $request)
    {
        $lecturer_id = 1; // Hardcoded lecturer ID for now
        $lecturer = Lecturer::find($lecturer_id);
    
        // Update lecturer's name
        $lecturer->name = $request->input('name');
    
        // Update lecturer's faculty ID
        $lecturer->faculty_id = $request->input('faculty_id');
    
        // Save the changes
        $lecturer->save();
    
        // Redirect back to the dashboard with a success message
        return redirect('/dashboard')->with('success', 'Profile updated successfully.');
    }

    public function registerCourse()
    {
        $activeNavItem = 'registerCourse';

        $lecturer_id = 1; // Hardcoded lecturer ID for now
    $lecturer = Lecturer::find($lecturer_id); // Fetch the lecturer data

    // Assuming you have defined the relationship between Lecturer and Faculty
    $faculty_id = $lecturer->faculty_id;
    $faculty = Faculty::find($faculty_id);

    $courses = Course::all();

        return view('lecturer/registerCourse', compact('activeNavItem','courses', 'lecturer', 'faculty'));
    }

    public function addCourse(Request $request)
{
    // Validate the incoming request data
    $request->validate([
        'course_id' => 'required|exists:courses,id', // Check if the course ID exists in the courses table
    ]);

    // Get the lecturer ID (you can adjust this according to your logic)
    $lecturer_id = 1; // Hardcoded lecturer ID for now

    // Check if the lecturer has already registered for the same course
    if (Teach::where('lecturer_id', $lecturer_id)->where('course_id', $request->input('course_id'))->exists()) {
        // If the course is already registered, return with an error message
        return redirect()->back()->with('error', 'You have already registered for this course.');
    }
    
    $teach = new Teach();
    $teach->lecturer_id = 1; // Hardcoded lecturer ID for now
    $teach->course_id = $request->input('course_id');
    $teach->save();
    
    return redirect('/take-course/assign')->with('success', 'Course registered successfully.');
}


    public function manageCourse()
    {
        $activeNavItem = 'manageCourse';
        return view('lecturer/manageCourse', compact('activeNavItem'));
    }

    public function assignAssignment()
    {
        $activeNavItem = 'registerAssignment';
        return view('lecturer/registerAssignment', compact('activeNavItem'));
    }

    public function manageAssignment()
    {
        $activeNavItem = 'manageAssignment';
        return view('lecturer/manageAssignment', compact('activeNavItem'));
    }

    public function manageDetailAssignment()
    {
        $activeNavItem = 'manageAssignment';
        return view('lecturer/manageDetailAssignment', compact('activeNavItem'));
    }

    public function assignQuiz()
    {
        $activeNavItem = 'registerQuiz';
        return view('lecturer/assignAssignment', compact('activeNavItem'));
    }

    public function manageQuiz()
    {
        $activeNavItem = 'manageQuiz';
        return view('lecturer/manageAssignment', compact('activeNavItem'));
    }    
}