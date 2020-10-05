<?php

namespace App\Http\Controllers;

use App\Models\Centre;
use App\Models\Centre_regional;
use App\Models\Ssb;
use App\Models\SsbSite;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class SSBController extends Controller
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
        $sites = SsbSite::all();
        return view('ssb.index', compact('centres', 'centres_regionaux', 'sites'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function liste()
    {
        $ssb = Ssb::all();
        return view('ssb.liste', compact('ssb'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @return Response
     */
    public function store(Request $request)
    {
        $ssb = new Ssb([
            'numeroIncident' => $request->get('date'),
            'numeroIncident' => $request->get('numeroIncident'),
            'numeroBordereau' => $request->get('numeroBordereau'),
            'site' => $request->get('site'),
            'banque' => $request->get('banque'),
            'centre' => $request->get('centre'),
            'centreRegional' => $request->get('centreRegional'),
            'intervention' => $request->get('intervention'),
            'dabiste1' => $request->get('dabiste1'),
            'dabiste2' => $request->get('dabiste2'),
            'heureDeclaration' => $request->get('heureDeclaration'),
            'heureReponse' => $request->get('heureReponse'),
            'heureArrivee' => $request->get('heureArrivee'),
            'debutIntervention' => $request->get('debutIntervention'),
            'finIntervention' => $request->get('finIntervention'),
            'dateCloture' => $request->get('dateCloture'),
        ]);
        $ssb->save();
        return redirect('ssb')->with('success', 'Enregistrement effectué!');
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return Response
     */
    public function edit($id)
    {
        $ssb = Ssb::find($id);
        $centres = Centre::all();
        $centres_regionaux = Centre_regional::all();
        $sites = SsbSite::all();
        return view('ssb.edit', compact('centres', 'centres_regionaux', 'sites', 'ssb'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param int $id
     * @return Response
     */
    public function update(Request $request, $id)
    {
        $ssb = Ssb::find($id);
        $ssb->numeroIncident = $request->get('date');
        $ssb->numeroIncident = $request->get('numeroIncident');
        $ssb->numeroBordereau = $request->get('numeroBordereau');
        $ssb->site = $request->get('site');
        $ssb->banque = $request->get('banque');
        $ssb->centre = $request->get('centre');
        $ssb->centreRegional = $request->get('centreRegional');
        $ssb->intervention = $request->get('intervention');
        $ssb->dabiste1 = $request->get('dabiste1');
        $ssb->dabiste2 = $request->get('dabiste2');
        $ssb->heureDeclaration = $request->get('heureDeclaration');
        $ssb->heureReponse = $request->get('heureReponse');
        $ssb->heureArrivee = $request->get('heureArrivee');
        $ssb->debutIntervention = $request->get('debutIntervention');
        $ssb->finIntervention = $request->get('finIntervention');
        $ssb->dateCloture = $request->get('dateCloture');
        $ssb->save();
        return redirect('ssb-liste')->with('success', 'Enregistrement effectué!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return Response
     */
    public function destroy($id)
    {
        $ssb = Ssb::find($id);
        $ssb->delete();
        return redirect('ssb-liste')->with('success', 'Enregistrement supprimé!');
    }
}
