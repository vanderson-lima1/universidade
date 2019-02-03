<?php

namespace App\Http\Controllers\Institution;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Student;
use App\Models\Unity;
use App\Models\Institution;
use App\Util\SessionInformation;

class StudentsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //retirar !!!
        $unity = SessionInformation::unityLoggedIn();

        $students = Student::whereUnityId($unity->id)->get();        
        
        return view('institutions.students.index', compact('students','unity'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //retirar!!!
        $unity = SessionInformation::unityLoggedIn(); 
        return view('institutions.students.create', ['student' => new Student(), 'unity' => $unity]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->_validate($request);
        $data = $request->all();
        $data['default'] = $request->has('defaulter');

        //retirar !!!
        $unity = SessionInformation::unityLoggedIn();

        $data['unity_id'] = $unity->id;        
        Student::Create($data);
        return redirect()->route('students.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Student $student)
    {
        return view('institutions.students.show', compact('student'));
    }   

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Student $student)
    {
        return view('institutions.students.edit', compact('student'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Student $student)
    {
        $this->_validate($request);
        $data = $request->all();
        $data['default'] = $request->has('defaulter');

        $student->fill($data);
        $student->save();

        return redirect()->route('students.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Student $student)
    {
        $student->delete();
        return redirect()->route('students.index');
    }

    protected function _validate(Request $request) 
    {
        $this->validate($request, [
            'name' => 'required|max:100',
        ]);
    }

}
