<?php

namespace App\Http\Controllers;

use App\Models\Student;
use Illuminate\Http\Request;

class StudentController extends Controller
{
    /*public function index()
    {
        $students = Student::latest()->paginate(5);
        return view('index')
            ->with('i', (request()->input('page', 1) - 1) * 5);
    }
    public function create()
    {
        return view('create');
    }
    public function store(Request $request)
    {
        $request->validate([
            'studname' => 'required',
            'course' => 'required',
            'fee' => 'required',
        ]);
        Student::create($request->all());
        return redirect()->route('index')
            ->with('sucess', 'Students create successfully.');
    }
    public function destroy(Student $student)
    {
        $student->deleted();
        return redirect()->route('index')
            ->with('sucess', 'Student deleted sucessfully');
    }*/
}
