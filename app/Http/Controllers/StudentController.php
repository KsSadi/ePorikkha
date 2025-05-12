<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class StudentController extends Controller
{
    public function manageStudent()
    {
        return view('admin.student.manage_student');
    }

    public function createStudent()
    {
        return view('admin.student.create_student');
    }

    public function editStudent($id)
    {
        return view('admin.student.edit_student', compact('id'));
    }
}
