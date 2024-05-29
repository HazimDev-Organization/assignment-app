<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Student;
use App\Models\Faculty;


class StudentController extends Controller
{


    public function login()
    {
        return view('student/login');
    }

    public function dashboard()
    {
        $activeNavItem = 'dashboard';
    $student_id = 1; // Hardcoded student ID for now
    $student = Student::find($student_id); // Fetch the student data

    // Assuming you have defined the relationship between student and Faculty
    $faculty_id = $student->faculty_id;
    $faculty = Faculty::find($faculty_id);

    $faculties = Faculty::all();

    return view('student/dashboard', compact('activeNavItem', 'student', 'faculty','faculties'));
    }

    public function updateProfile(Request $request)
    {
        $student_id = 1; // Hardcoded lecturer ID for now
        $student = Student::find($student_id);
    
        // Update lecturer's name
        $student->name = $request->input('name');
    
        // Update lecturer's faculty ID
        $student->faculty_id = $request->input('faculty_id');
    
        // Save the changes
        $student->save();
    
        // Redirect back to the dashboard with a success message
        return redirect('student/dashboard')->with('success', 'Profile updated successfully.');
    }

    public function registerCourse()
    {
        $activeNavItem = 'registerCourse';
        return view('student/registerCourse', compact('activeNavItem'));
    }

    public function manageCourse()
    {
        $activeNavItem = 'manageCourse';
        return view('student/manageCourse', compact('activeNavItem'));
    }

    public function assignmentDetails()
    {
        $activeNavItem = 'registerAssignment';
        return view('student/assignmentDetails', compact('activeNavItem'));
    }

    public function assignmentResults()
    {
        $activeNavItem = 'manageAssignment';
        return view('student/assignmentResult', compact('activeNavItem'));
    }

    public function assignQuiz()
    {
        $activeNavItem = 'registerQuiz';
        return view('student/assignAssignment', compact('activeNavItem'));
    }

    public function manageQuiz()
    {
        $activeNavItem = 'manageQuiz';
        return view('student/manageAssignment', compact('activeNavItem'));
    }    
}
