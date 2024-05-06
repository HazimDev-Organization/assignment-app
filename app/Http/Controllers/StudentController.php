<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class StudentController extends Controller
{


    public function login()
    {
        return view('student/login');
    }

    public function dashboard()
    {
        $activeNavItem = 'dashboard';
        return view('student/dashboard', compact('activeNavItem'));
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
