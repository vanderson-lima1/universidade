<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Database\Eloquent\Collection;
use App\Models\Role;
use App\Models\Ability;
use App\Util\SessionInformation;

class RolesController extends Controller
{

     /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // Retirar !!
        $unity = SessionInformation::unityLoggedIn();

        //$role = new Role();
        //$roles = $role->onlyUnity($unity);

        $roles = Role::all();
        return view('admin.roles.index', compact('roles'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {        
        $abilities = Ability::all();
        return view('admin.roles.create', ['role' => new Role(), 'abilities' => $abilities]);
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
                
        $role = Role::Create($data);

        $role->addAbilities($data);        
        
        return redirect()->route('roles.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Role $role, Request $request)
    {   
        $acao = $request->get('acao');
        $abilities = Ability::all();
        if (empty($acao) || $acao === "delete") {
            return view('admin.roles.show', compact('role','acao', 'abilities'));
        }else{
            return redirect()->route('roles.index');
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Role $role)
    {
        $abilities = Ability::all();
        return view('admin.roles.edit', compact('role', 'abilities'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Role $role)
    {
        $this->_validate($request);

        $data = $request->all();
        $data['default'] = $request->has('defaulter');

        $role->fill($data);
        $role->save();

        $role->addAbilities($data);

        return redirect()->route('roles.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Role $role)
    {
        //faltou verifica se o Perfil ainda tem Users, se sim retornar erro.

        $role->removeAbilities();
        $role->delete();        
        return redirect()->route('roles.index');
    }

    protected function _validate(Request $request){
        $this->validate($request, [
            'name' => 'required|max:100',
        ]);
    }
}