<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Student;

class StudentController extends Controller
{
    function list()
    {
        return Student::all();
    }

    function addStudent(Request $request)
    {
        $student = new Student();
        $student->name = $request->name;
        $student->city = $request->city;
        $student->batch = $request->batch;
        if ($student->save()) {
            return "Operation Successfull";
        } else {
            return "Error";
        }
    }

    function updateStudent(Request $request)
    {
        $student = Student::find($request->id);
        $student->name = $request->name;
        $student->city = $request->city;
        $student->batch = $request->batch;
        if ($student->save()) {
            return "Updated Successfully";
        }else{
            return "Failed";
        };
    }
}
