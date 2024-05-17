<?php

namespace App\Http\Controllers;
use App\Models\Lecturer;
use App\Models\Faculty;
use App\Models\Course;
use App\Models\Teach;
use App\Models\Assignment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

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

        $lecturer_id = 1; // Hardcoded lecturer ID for now
    $lecturer = Lecturer::find($lecturer_id); // Fetch the lecturer data

    // Retrieve all the teaches associated with the lecturer
    $teaches = $lecturer->teaches;

    return view('lecturer/manageCourse', compact('activeNavItem', 'teaches'));
    }

    public function deleteTeach(Teach $teach)
{
    $teach->delete();

    return redirect()->back()->with('success', 'Teach record deleted successfully');
}

    public function assignAssignment()
    {
        $activeNavItem = 'registerAssignment';

        $lecturer_id = 1; // Hardcoded lecturer ID for now
        $lecturer = Lecturer::find($lecturer_id); // Fetch the lecturer data
        $teaches = $lecturer->teaches;

        return view('lecturer/registerAssignment', compact('activeNavItem','teaches'));
    }

    
    public function addAssignment(Request $request)
{
    // Validate the incoming request data
    $validator = Validator::make($request->all(), [
        'title' => 'required|string|max:255',
        'teach_id' => 'required|exists:courses,id', // assuming the course id is the reference here
        'status' => 'required|in:Active,Inactive',
        'dateline' => 'required|date',
        'fileInput' => 'required|file|max:10240', // Max 10MB file size
    ]);

    // Check if validation fails
    if ($validator->fails()) {
        return redirect()->back()->withErrors($validator)->withInput();
    }

    // Find the course entry to ensure it exists
    $courseId = $request->input('teach_id');
    
    // Create a new assignment instance
    $assignment = new Assignment();
    $assignment->title = $request->input('title');
    $assignment->course_id = $courseId; // using teach_id as course_id based on the form
    $assignment->lecturer_id = 1; // Replace with authenticated lecturer ID
    $assignment->faculty_id = 1; // Replace with actual faculty ID
    $assignment->status = $request->input('status');
    $assignment->dateline = $request->input('dateline');
    $assignment->created_at = now(); // Manually set created_at timestamp

    // Upload and store the assignment file
    if ($request->hasFile('fileInput')) {
        $file = $request->file('fileInput');
        $fileName = time().'_'.$file->getClientOriginalName();
        $filePath = $file->storeAs('assignment_files', $fileName, 'public'); // Store file in public storage
        $assignment->assignmentDetails_file = $filePath;
    }

    // Save the assignment
    $assignment->save();

    // Redirect back with success message
    return redirect()->back()->with('success', 'Assignment added successfully.');
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