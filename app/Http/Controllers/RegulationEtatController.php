<?php

namespace App\Http\Controllers;

use App\Models\RegulationScelle;
use App\Models\RegulationSecuripack;
use Illuminate\Http\Request;

class RegulationEtatController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function securipackUtilise()
    {
        $regulations = RegulationSecuripack::all();
        return view('.regulation.etat.securipack.utilise', compact('regulations'));
    }

    public function securipackVendu()
    {
        $regulations = RegulationSecuripack::all();
        return view('.regulation.etat.securipack.vendu', compact('regulations'));
    }

    public function scelleUtilise()
    {
        $regulations = RegulationScelle::all();
        return view('.regulation.etat.scelle.utilise', compact('regulations'));
    }

    public function scelleVendu()
    {
        $regulations = RegulationScelle::all();
        return view('.regulation.etat.scelle.vendu', compact('regulations'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
