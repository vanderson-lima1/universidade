<?php

namespace App\Http\Controllers\Institution;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Course;
use App\Models\Unity;
use App\Models\Institution;
use App\Util\SessionInformation;
use Illuminate\Database\Eloquent\Collection;

class CoursesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        //retirar !!!
        $unity = SessionInformation::unityLoggedIn();
        $acao = $request->get('acao');

        
        //$courses = Course::whereUnityId($unity->id)->get();
        // Teste Vanderson, 3 linhas abaixo mesma coisa comentário acima 
        $course = new Course();
        $courses = new Collection();
        $courses = $course->whereUnityId($unity->id)->get();  

        //dd(\Route::getRoutes());      
        $selectionRoutesNames = collect(\Route::getRoutes())->map(function ($route) {return $route->getName();});
        $selectionRoutesUri   = collect(\Route::getRoutes())->map(function ($route) {return $route->uri();});
        $selectionRoutesActionNames = collect(\Route::getRoutes())->map(function ($route) {return $route->getActionName();});
        $selectionRoutesHost = collect(\Route::getRoutes())->map(function ($route) {return $route->domain();});
        $selectionRoutes = collect(\Route::getRoutes())->map(function ($route) {
            $names = $route->getName();
            $actions = $route->getActionName();
            if (strpos($actions, "App\Http\Controllers\Institution")!==false) {
                return compact('names', 'actions');
            }
            
        });

        //dd(\Route::getRoutes(),$selectionRoutesNames, $selectionRoutesUri, $selectionRoutesActionNames, $selectionRoutesHost,$selectionRoutes);
        //dd(\Route::getRoutes())->map();
        //dd($selectionRoutesNames);
        //dd($selectionRoutesUri);
        //dd($selectionRoutesActionNames);
        //dd($selectionRoutesHost);
        dd($selectionRoutes);

        // Depois adequar esta regra corretamente. 
        // Valida para habilitar ou desabilitar botão de cadastro, respeitando hierarquia do modelo de dados.
        $habilitarBotao = $this->consultarInstituicao();        

        return view('institutions.courses.index', compact('courses','unity','habilitarBotao','acao'));
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
    public function show(Course $course, Request $request)
    {   
        $acao = $request->get('acao');
        if (empty($acao) || $acao === "delete") {
            return view('institutions.courses.show', compact('course','acao'));
        }else{
            return redirect()->route('institutions.courses.index');
        }
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
        $acao = $course->delete() ? 'exclusao' : 'erro';
        return redirect()->route('courses.index', compact('acao'));
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
