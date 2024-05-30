<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Student;
use App\Models\Faculty;
use App\Models\Teach;
use App\Models\Learn;
use App\Models\Submit;
use App\Models\Assignment;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Storage;

class StudentController extends Controller
{
    public function dashboard()
    {
        $activeNavItem = 'dashboard';

    // Get the student ID 
    $user = Auth::user(); 
    $student = $user->student;

    $faculty_id = $student->faculty_id;
    $faculty = Faculty::find($faculty_id);

    $faculties = Faculty::all();

    return view('student/dashboard', compact('activeNavItem', 'student', 'faculty','faculties'));
    }

    public function updateProfile(Request $request)
    {
        // Get the student ID 
        $user = Auth::user(); 
        $student = $user->student;

        // Update student's name
        $student->name = $request->input('name');
    
        // Update student's faculty ID
        $student->faculty_id = $request->input('faculty_id');
    
        // Save the changes
        $student->save();
    
        // Redirect back to the dashboard with a success message
        return redirect('/student-dashboard')->with('success', 'Profile updated successfully.');
    }

    public function registerCourse()
    {
        $activeNavItem = 'registerCourse';

        // Get the student ID 
        $user = Auth::user(); 
        $student = $user->student;

    // Assuming you have defined the relationship between student and Faculty
    $faculty_id = $student->faculty_id;
    $faculty = Faculty::find($faculty_id);

   // Get all teaches that belong to the same faculty_id
   $teaches = Teach::where('faculty_id', $faculty_id)->with('course')->get();

   return view('student/registerCourse', compact('activeNavItem', 'teaches', 'student', 'faculty'));
}

public function addCourse(Request $request)
{
    // Validate the incoming request data
    $request->validate([
        'teach_id' => 'required|exists:teaches,id', // Check if the teach ID exists in the teaches table
    ]);

        // Get the student ID 
        $user = Auth::user(); 
        $student = $user->student;
        $student_id = $student->id;

    // Check if the student has already registered for the same course
    if (Learn::where('student_id', $student_id)->where('teach_id', $request->input('teach_id'))->exists()) {
        // If the course is already registered, return with an error message
        return redirect()->back()->with('error', 'You have already registered for this course.');
    }

    // Create a new Learn record
    $learn = new Learn();
    $learn->teach_id = $request->input('teach_id');
    $learn->student_id = $student_id; // Hardcoded student ID for now
    $learn->save();
    
    return redirect('/student-take-course/register')->with('success', 'Course registered successfully.');
}

    public function manageCourse()
    {
        $activeNavItem = 'manageCourse';

        // Get the student ID 
        $user = Auth::user(); 
        $student = $user->student;

    // Retrieve all the teaches associated with the lecturer
    $learns = $student->learns;

    return view('student/manageCourse', compact('activeNavItem', 'learns'));
    }

    public function deleteLearn(Learn $learn)
{
    $learn->delete();

    return redirect()->back()->with('success', 'Learn record deleted successfully');
}

public function assignmentDetails()
{
    $activeNavItem = 'registerAssignment';
    
    // Get the student ID 
    $user = Auth::user(); 
    $student = $user->student;
    $student_id = $student->id;
    
    // Retrieve all the learns associated with the student
    $learns = $student->learns;

    // Retrieve all assignments associated with the retrieved learns and filter by active status
    $assignments = collect();
    foreach ($learns as $learn) {
        $assignments = $assignments->merge($learn->teach->assignments->where('status', 'Active'));
    }
    
    return view('student/assignmentDetails', compact('activeNavItem', 'assignments'));
}


public function submitAssignment(Request $request)
{    
    // Validate the incoming request data
    $validator = Validator::make($request->all(), [
        'assignment_id' => 'required|exists:assignments,id',
        'assignmentFile' => 'required|file|max:10240', // Max 10MB file size
    ]);

    if ($validator->fails()) {
        return redirect()->back()->withErrors($validator)->withInput();
    }

    // Handle file upload
    if ($request->hasFile('assignmentFile')) {
        $file = $request->file('assignmentFile');
        $fileName = time().'_'.$file->getClientOriginalName();
        $filePath = $file->storeAs('assignment_submissions', $fileName, 'public'); // Store file in public storage
        
        // Create a new submission record
        $user = Auth::user(); 
        $student = $user->student;
        $student_id = $student->id;

        $submission = new Submit();
        $submission->assignment_id = $request->input('assignment_id');
        $submission->assignmentSubmission_file = $filePath;
        $submission->student_id = $student_id;

        $submission->save();

        return redirect()->back()->with('success', 'Assignment submitted successfully.');
    }

    return redirect()->back()->with('error', 'File upload failed.');
}

    public function assignmentResults()
    {
        $activeNavItem = 'manageAssignment';
       
        $user = Auth::user(); 
        $student = $user->student;

    // Retrieve all the teaches associated with the lecturer
    $submits = $student->submits;

        return view('student/assignmentResult', compact('activeNavItem', 'submits'));
    }
}
