<?php

namespace App\Http\Controllers;

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
        return view('lecturer/dashboard', compact('activeNavItem'));
    }

    public function registerCourse()
    {
        $activeNavItem = 'registerCourse';
        return view('lecturer/registerCourse', compact('activeNavItem'));
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