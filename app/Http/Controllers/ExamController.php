<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ExamController extends Controller
{
    public function manageExam()
    {
        return view('admin.exam.manage_exam');
    }

    public function createExam()
    {
        return view('admin.exam.create_exam');
    }

    public function editExam($id)
    {
        return view('admin.exam.edit_exam', compact('id'));
    }
}
