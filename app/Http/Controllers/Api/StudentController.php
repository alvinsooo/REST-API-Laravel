<?php

namespace App\Http\Controllers\Api;

use App\Http\Requests\StoreStudentRequest;
use App\Http\Requests\UpdateStudentRequest;
use App\Imports\StudentsUpdate;
use App\Http\Controllers\Controller;
use App\Models\Student;
use Illuminate\Http\Request;
use App\Filters\StudentFilter;
use App\Http\Resources\StudentCollection;
use App\Http\Resources\StudentResource;
use App\Imports\StudentsImport;
use App\Imports\StudentsDelete;
use Maatwebsite\Excel\Facades\Excel;

class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request) 
    {
        $filter =  new StudentFilter();
        $filterItems =  $filter -> transform($request);
        $students = Student::where($filterItems);

        return new StudentCollection($students -> paginate() ->appends($request->query()));

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreStudentRequest $request)
    {
        return new StoreStudentRequest(Student::create($request->all()));
    }


    public function importStudents(Request $request) 
    {
        try{
            Excel::import(new StudentsImport, $request -> file('file'));
            return response()->json([
                'message' => 'Students created successfully'
            ], 200);


        }
        catch(\Exception $e){
            return response()->json([
                'message' => 'Fail to add students info'
            ], 500);
        }
      
    }

    public function deleteStudents(Request $request) 
    {
        try{
            Excel::import(new StudentsDelete, $request -> file('file'));
            return response()->json([
                'message' => 'Students deleted successfully'
            ], 200);


        }
        catch(\Exception $e){
            return response()->json([
                'message' => 'Fail to delete students records'
            ], 500);
        }
    }

    public function updateStudents(Request $request) 
    {
        try{
            Excel::import(new StudentsUpdate, $request -> file('file'));
            return response()->json([
                'message' => 'Students info updated successfully'
            ], 200);


        }
        catch(\Exception $e){
            return response()->json([
                'message' => 'Fail to update students info'
            ], 500);
        }

    }

    /**
     * Display the specified resource.
     */
    public function show(Student $student)
    {
        return new StudentResource($student);
    }


    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateStudentRequest $request, Student $student)
    {
        $student -> update($request->all());
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Student $student)
    {
        Student::destroy($student->id);
    }
}
