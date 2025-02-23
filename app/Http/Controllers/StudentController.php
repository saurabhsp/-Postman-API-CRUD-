<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Student;
use Illuminate\Support\Facades\Validator;

class StudentController extends Controller
{
    function list()
    {
        return Student::all();
    }

    function addStudent(Request $request)
    {
        $rules = array(
            'name' => 'required| min:2 | max10'
        );
        $validation = Validator::make($request->all(), $rules);
        if ($validation->fails()) {
            return $validation->errors();
        } else {
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
    }

    function updateStudent(Request $request)
    {
        $student = Student::find($request->id);
        $student->name = $request->name;
        $student->city = $request->city;
        $student->batch = $request->batch;
        if ($student->save()) {
            return "Updated Successfully";
        } else {
            return "Failed";
        };
    }
    function delStudent($id)
    {
        $student = Student::destroy($id);
        if ($student) {
            return "Deleted Successfully";
        }
    }
    function searchStd($name)
    {
        $student = Student::where('name', 'like', "%$name%")->get();
        if ($student) {
            return ["result" => $student];
        } else {
            return ["result" => "No Record Found"];
        }
    }
}
