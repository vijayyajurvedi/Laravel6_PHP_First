<?php

namespace App\Http\Controllers;

use App\Models\Students;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redis;

class StudentController extends Controller
{
   //
   public function index()
   {
      //return "Vijay Here";

      //$students = Students::all();
      $students = Students::simplepaginate(15) ;
      return view('welcome', compact('students'));
   }

   public function create()
   {

      return view('create');
   }

   public function store(Request $request)
   {
      $customeAttributes = [
         'firstname' => 'required',
         'lastname' => 'required',
         'email' => 'required',
         'phone' => 'required'
      ];

      $this->validate($request, $customeAttributes);

      $student = new Students;

      $student->first_name = $request->firstname;
      $student->last_name    = $request->lastname;
      $student->email = $request->email;
      $student->phone = $request->phone;
      $student->save();
      return redirect(route('home'))->with('successMsg', 'Student Sucessully Added');
   }

   public function edit($id)
   {
      //
      $student = Students::find($id);
      return view('edit', compact('student'));
   }

   public function update(Request $request, $id)
   {
      //
      $customeAttributes = [
         'firstname' => 'required',
         'lastname' => 'required',
         'email' => 'required',
         'phone' => 'required'
      ];

      $this->validate($request, $customeAttributes);

      $student =   Students::find($id);

      $student->first_name = $request->firstname;
      $student->last_name    = $request->lastname;
      $student->email = $request->email;
      $student->phone = $request->phone;
      $student->save();
      return redirect(route('home'))->with('successMsg', 'Student Sucessully Updated');
   }

   public function delete($id)
   {
      Students::find($id)->delete();
      return redirect(route('home'))->with('successMsg', 'Student Deleted Sucessfully');
   }
}
