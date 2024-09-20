<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Student;

class StudentController extends Controller
{

    public function index(){
        $student = Student::get();

        return view('students.students_view', compact('student'));
    }
    
    public function student_create(){
        return view('students.student_create');
    }



    public function store(Request $request){
        // return $request;

        $validate = $request->validate([
            "name" => "required",
            "email" => "required|unique:students",
            "phone_number" => "required",
            "address" => "required",
        ]);


        if ($validate) {
          $student = Student::create([
            "name" => $request->name,
            "email" => $request->email,
            "phone_number" => $request->phone_number,
            "address" => $request->address,
          ]);

          return redirect()->route('students.view');
        }else {
            return redirect()->back();
        }


    }


    public function edit($id){
        $student = Student::find($id);

        return view('students.student_update', compact('student'));
    }

    public function update(Request $request, $id){
        $validate = $request->validate([
            "name" => "required",
            "email" => "required|unique:students,email,$id",
            "phone_number" => "required",
            "address" => "required",
        ]);

       $student = Student::find($id);

       if ($student) {
         $student->update([
            "name" => $request->name,
            "email" => $request->email,
            "phone_number" => $request->phone_number,
            "address" => $request->address,
           ]);

           return redirect()->route('students.view');
       }else{
        return redirect()->back()->with('error', 'update failed');
       }
    }

    public function delete($id){
        $student = Student::find($id);
        if ($student) {
            $student->delete();
            return redirect()->route('students.view');
        }else{
            return redirect()->back()->with('error', 'delete failed');
        }


    }


}
