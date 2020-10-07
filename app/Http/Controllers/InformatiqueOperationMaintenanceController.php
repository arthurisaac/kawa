<?php

namespace App\Http\Controllers;

use App\Models\Centre;
use App\Models\Centre_regional;
use App\Models\InformatiqueOperation;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class InformatiqueOperationMaintenanceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $centres = Centre::all();
        $centres_regionaux = Centre_regional::all();
        return view('informatique.operation-maintenance.index', compact('centres', 'centres_regionaux'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function liste()
    {
        $informatiques = InformatiqueOperation::all();
        return view('informatique.operation-maintenance.liste', compact('informatiques'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @return Response
     */
    public function store(Request $request)
    {
        $informatique = new InformatiqueOperation([
            'centre' => $request->get('centre'),
            'centreRegional' => $request->get('centreRegional'),
            'service' => $request->get('service'),
            'date' => $request->get('date'),
            'materielDefectueux' => $request->get('materielDefectueux'),
            'rapportMateriel' => $request->get('rapportMateriel'),
            'dateDebut' => $request->get('dateDebut'),
            'dateFin' => $request->get('dateFin'),
            'operationEffectuee' => $request->get('operationEffectuee'),
        ]);
        $informatique->save();
        return redirect('/informatique-maintenance')->with('success','Enregistrement effectué!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit($id)
    {
        $centres = Centre::all();
        $centres_regionaux = Centre_regional::all();
        $informatique = InformatiqueOperation::find($id);
        return view('informatique.operation-maintenance.edit',
            compact('centres', 'centres_regionaux', 'informatique'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param  int  $id
     * @return Response
     */
    public function update(Request $request, $id)
    {
        $informatique = InformatiqueOperation::find($id);
        $informatique->centre = $request->get('centre');
        $informatique->centreRegional = $request->get('centreRegional');
        $informatique->service = $request->get('service');
        $informatique->date = $request->get('date');
        $informatique->materielDefectueux = $request->get('materielDefectueux');
        $informatique->rapportMateriel = $request->get('rapportMateriel');
        $informatique->dateDebut = $request->get('dateDebut');
        $informatique->dateFin = $request->get('dateFin');
        $informatique->operationEffectuee = $request->get('operationEffectuee');
        $informatique->save();
        return redirect('/informatique-maintenance-liste')->with('success','Enregistrement effectué!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id)
    {
        $informatique = InformatiqueOperation::find($id);
        $informatique->delete();
        return redirect('/informatique-maintenance-liste')->with('success','Enregistrement supprimé!');
    }
}
