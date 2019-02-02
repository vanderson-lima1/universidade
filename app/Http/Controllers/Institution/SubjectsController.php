<?php

namespace App\Http\Controllers\Institution;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Subject;
use App\Models\Course;
use App\Models\Unity;
use App\Util\SessionInformation;

class SubjectsController extends Controller
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

        $subjects = Subject::join('courses', 'courses.id', '=','course_id')
                            ->where('courses.unity_id', '=', $unity->id)
                            ->select('subjects.id', 'subjects.name', 'subjects.course_id')
                            ->get();

        return view('institutions.subjects.index', compact('subjects', 'unity'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {        
        //retirar !!!
        $unity = SessionInformation::unityLoggedIn();

        $courses = Course::all()->where('unity_id', '=', $unity->id);

        return view('institutions.subjects.create', ['subject' => new Subject(), 'unity' => $unity,
                                                     'courses' => $courses]);
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
      
        Subject::Create($data);
        return redirect()->route('subjects.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Subject $subject)
    {
        return view('institutions.subjects.show', compact('subject'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Subject $subject)
    {
        //retirar !!!
        $unity = SessionInformation::unityLoggedIn();

        $courses = Course::all()->where('unity_id', '=', $unity->id);

        return view('institutions.subjects.edit', compact('subject', 'courses'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Subject $subject)
    {
        $this->_validate($request);
        $data = $request->all();
        $data['default'] = $request->has('defaulter');

        $subject->fill($data);
        $subject->save();

        return redirect()->route('subjects.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Subject $subject)
    {
        $subject->delete();
        return redirect()->route('subjects.index');
    }

    protected function _validate(Request $request) {
        $this->validate($request, [
            'name' => 'required|max:100',
            'course_id' => 'required',
        ]);
    }
}
