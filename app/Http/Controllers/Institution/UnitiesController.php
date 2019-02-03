<?php

namespace App\Http\Controllers\Institution;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Unity;
use App\Models\Institution;
use App\Util\SessionInformation;

class UnitiesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //retirar !!!
        $institution = SessionInformation::institutionLoggedIn();
        
        $unities = Unity::whereInstitutionId($institution->id)->get();        
        
        return view('institutions.unities.index', compact('unities','institution'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('institutions.unities.create', ['unity' => new Unity()]);
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
        $institution = SessionInformation::institutionLoggedIn();

        $data['institution_id'] = $institution->id;
        Unity::Create($data);        
        return redirect()->route('unities.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Unity $unity)    
    {
        return view('institutions.unities.show', compact('unity'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Unity $unity)
    {
        return view('institutions.unities.edit', compact('unity'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Unity $unity)
    {
        $this->_validate($request);

        $data = $request->all();
        $data['default'] = $request->has('defaulter');

        $unity->fill($data);
        $unity->save();

        return redirect()->route('unities.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Unity $unity)
    {
        $unity->delete();
        return redirect()->route('unities.index');
    }

    protected function _validate(Request $request){

        $this->validate($request, [
            'name' => 'required|max:100',            
        ]);
    }
}
