<?php

namespace App\Http\Controllers\Institution;

use Illuminate\Http\Request;
use App\Http\Requests\PatientRequest;
use App\Http\Controllers\Controller;
use App\Models\Patient;
use App\Models\Unity;
use App\Util\SessionInformation;

class PatientsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $this->authorize('patients.index');
        //retirar!!!
        $unity = SessionInformation::unityLoggedIn();   
        
        $patients = Patient::whereUnityId($unity->id)->get();

        return view('institutions.patients.index', compact('patients','unity'));
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

        return view('institutions.patients.create', ['patient' => new Patient(), 'unity' => $unity]);
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

        //retirar!!!
        $unity = SessionInformation::unityLoggedIn();

        $data['unity_id'] = $unity->id;
        Patient::Create($data);        
        return redirect()->route('patients.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Patient $patient, Request $request)
    {   
        $acao = $request->get('acao');
        if (empty($acao) || $acao === "delete") {
            return view('institutions.patients.show', compact('patient','acao'));
        }else{
            return redirect()->route('institutions.patients.index');
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Patient $patient)
    {
        return view('institutions.patients.edit', compact('patient'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Patient $patient)
    {
        $this->_validate($request);

        $data = $request->all();
        $data['default'] = $request->has('defaulter');

        $patient->fill($data);
        $patient->save();

        return redirect()->route('patients.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Patient $patient)
    {
        $patient->delete();
        return redirect()->route('patients.index');
    }

    protected function _validate(Request $request){

        $period = implode(',', array_keys(Patient::PERIOD));
        
        $this->validate($request, [
            'name'        => 'required|max:100',
            'sex'         => 'required|in:m,f',
            'period'      => "required|in:$period" ,
            'phone'       => 'required|numeric',
            'documentCPF' => 'required|numeric',
            'documentRG'  => 'required|numeric',
            'documentSUS' => 'required|numeric',
        ]);

    }
}
