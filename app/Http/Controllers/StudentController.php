<?php

namespace App\Http\Controllers;

use App\Models\Students;
use Illuminate\Http\Request;

class StudentController extends Controller
{
    public function index(){
        $students =  Students::paginate(5);
        return view('welcome',compact('students'));
    }

    public function create(){
        return view('create');
    }

    public function edit($id){
        $student = Students::find($id);
        return view('edit',compact('student'));
    }

    public  function  store(Request $request){

        $request->validate([
            'fName' => 'required',
            'lName' => 'required',
            'email' => 'required',
            'phone' => 'required',
        ]);

        $student = new Students;
        $student->first_name    = $request->fName;
        $student->last_name     = $request->lName;
        $student->email         = $request->email;
        $student->phone         = $request->phone;
        $student->save();

        return(redirect(route('myhome')))->with('message','User successfully created');
    }

    public function update(Request $request,$id){
        $request->validate([
            'fName' => 'required',
            'lName' => 'required',
            'email' => 'required',
            'phone' => 'required',
        ]);

        $student = Students::find($id);
        $student->first_name    = $request->fName;
        $student->last_name     = $request->lName;
        $student->email         = $request->email;
        $student->phone         = $request->phone;
        $student->save();

        return(redirect(route('myhome')))->with('message','User is successfully updated');

    }
    public function delete($id){
        Students::find($id)->delete();
        return(redirect(route('myhome')))->with('message','User is successfully deleted');
    }
}
