<?php

namespace App\Http\Controllers\Institution;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Course;
use App\Models\Unity;
use App\Models\Institution;
use App\Util\SessionInformation;

class CoursesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $courses = Course::all();
        // Valida para habilitar ou desabilitar botão de cadastro, respeitando hierarquia do modelo de dados.
        $habilitarBotao = $this->consultarInstituicao();
        //retirar !!!
        $unity = SessionInformation::unityLoggedIn();

        return view('institutions.courses.index', compact('courses', 'unity', 'habilitarBotao'));
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

        return view('institutions.courses.create', ['course' => new Course(), 'unity' => $unity]);
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
        Course::Create($data);
        return redirect()->route('courses.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Course $course)
    {
        return view('institutions.courses.show', compact('course'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Course $course)
    {
        return view('institutions.courses.edit', compact('course'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Course $course)
    {
        $this->_validate($request);
        $data = $request->all();
        $data['default'] = $request->has('defaulter');

        $course->fill($data);
        $course->save();

        return redirect()->route('courses.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Course $course)
    {
        $course->delete();
        return redirect()->route('courses.index');
    }

    protected function _validate(Request $request) {
        $this->validate($request, [
            'name' => 'required|max:100',
        ]);
    }

    /** Verificar se existe pelo menos uma unidade cadastrada, para habilitar ou desabilitar botão de cadastro. */
    protected function consultarInstituicao() {
        $resultado = ($institutions = Institution::first() ? true : false);
        return $resultado;        
    }

}
