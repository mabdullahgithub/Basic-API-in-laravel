<?php

namespace App\Http\Controllers;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\Request;
use App\Models\Student;
class StudentController extends Controller
{
    //function to get data from database
    public function list($id = null)
    {
        try {
            $students = $id ? Student::findOrFail($id) : Student::all();
            return response()->json($students);
        } catch (ModelNotFoundException $e) {
            return response()->json(['error' => 'Student not found'], 404);
        }
    }

    //function to post data in database
    public function add(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'course' => 'required',
        ]);

        if(Student::where('email', $request->email)->exists()){
            return response()->json(['error' => 'Duplicate entry'], 202);
        }

        $student = Student::create($validatedData);
        
        return response()->json($student, 202);
     
    }

    //function to update data in database
    public function update($id, Request $request)
    {
        
        $student = Student::find($id);

        $student->update($request->all());

        return response()->json($student, 202);
    }

    //function to delete data from database
    public function delete($id, Request $request)
    {
        $student = Student::find($id);

        if(Student::where('id', $request->id)->doesntExist()){
            return response()->json(['error' => 'No such ID'], 404);
        }
        $student->delete();
        return response()->json('Student deleted successfully', 202);
    }

    //function to search data from database
    public function search($name)
    {
        if(Student::where('name',  'like', '%' . $name . '%')->doesntExist()){
            return response()->json(['error' => 'No such word exist in database'], 404);
        }
        $student = Student::where('name', 'like', '%' . $name . '%')->get();
        return response()->json($student, 202);
    }
    
}

