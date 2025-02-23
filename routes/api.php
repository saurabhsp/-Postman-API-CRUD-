<?php

use App\Http\Controllers\StudentController;
use App\Models\Student;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');


Route::get('test',function (){
return ["name"=>"Saurabh", "Age"=> 18];
});

Route::get('students', [StudentController::class, 'list']);
Route::post('add-student', [StudentController::class, 'addStudent']);
Route::put('update-student',[StudentController::class, 'updateStudent']);