<?php

namespace App\Http\Controllers;

use App\Models\Centre;
use App\Models\Centre_regional;
use App\Models\InformatiqueMission;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class InformatiqueMissionController extends Controller
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
        return view('informatique.mission.index', compact('centres', 'centres_regionaux'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function liste()
    {
        $missions = InformatiqueMission::all();
        return view('informatique.mission.liste', compact('missions'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @return Response
     */
    public function store(Request $request)
    {
        $mission = new InformatiqueMission([
            'centre' => $request->get('centre'),
            'centreRegional' => $request->get('centreRegional'),
            'service' => $request->get('service'),
            'debut' => $request->get('debut'),
            'fin' => $request->get('fin'),
            'nombreDeJours' => $request->get('nombreDeJours'),
            'objetMission' => $request->get('objetMission'),
            'interventionEffectuee' => $request->get('interventionEffectuee'),
            'rapportMission' => $request->get('rapportMission'),
        ]);
        $mission->save();
        return redirect('/informatique-mission')->with('success', 'Enregistrement effectué!');
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
        $mission = InformatiqueMission::find($id);
        $centres = Centre::all();
        $centres_regionaux = Centre_regional::all();
        return view('informatique.mission.edit', compact('centres', 'centres_regionaux', 'mission'));
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
        $mission = InformatiqueMission::find($id);
        $mission->centre = $request->get('centre');
        $mission->centreRegional = $request->get('centreRegional');
        $mission->service = $request->get('service');
        $mission->debut = $request->get('debut');
        $mission->fin = $request->get('fin');
        $mission->nombreDeJours = $request->get('nombreDeJours');
        $mission->objetMission = $request->get('objetMission');
        $mission->interventionEffectuee = $request->get('interventionEffectuee');
        $mission->rapportMission = $request->get('rapportMission');
        $mission->save();
        return redirect('/informatique-mission-liste')->with('success', 'Enregistrement effectué!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id)
    {
        $mission = InformatiqueMission::find($id);
        $mission->delete();
        return redirect('/informatique-mission-liste')->with('success', 'Enregistrement supprimé!');
    }
}
