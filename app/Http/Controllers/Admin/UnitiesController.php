<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Unity;
use App\Models\Institution;

class UnitiesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $unities = Unity::all();
        return view('admin.unities.index', compact('unities'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $institutions = Institution::all(); 
        return view('admin.unities.create', ['unity' => new Unity(), 'institutions' => $institutions]);
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
        return view('admin.unities.show', compact('unity'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Unity $unity)
    {
        $institutions = Institution::all(); 
        return view('admin.unities.edit', compact('unity', 'institutions'));
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
            'institution_id' => 'required'
        ]);
    }
}
