<?php

namespace App\Http\Controllers\Institution;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Teacher;
use App\Models\Unity;
use App\Models\Institution;
use App\Util\SessionInformation;

class TeachersController extends Controller
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
        
        $teachers = Teacher::whereUnityId($unity->id)->get();

        return view('institutions.teachers.index', compact('teachers','unity'));
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
        return view('institutions.teachers.create', ['teacher' => new Teacher(), 'unity' => $unity]);
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
        Teacher::Create($data);
        return redirect()->route('teachers.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Teacher $teacher)
    {
        return view('institutions.teachers.show', compact('teacher'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Teacher $teacher)
    {
        return view('institutions.teachers.edit',compact('teacher'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Teacher $teacher)
    {
        $this->_validate($request);
        $data = $request->all();
        $data['default'] = $request->has('defaulter');

        $teacher->fill($data);
        $teacher->save();

        return redirect()->route('teachers.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Teacher $teacher)
    {
        $teacher->delete();
        return redirect()->route('teachers.index');
    }

    protected function _validate(Request $request) 
    {
        $this->validate($request, [
            'name' => 'required|max:100',
        ]);
    }

}
