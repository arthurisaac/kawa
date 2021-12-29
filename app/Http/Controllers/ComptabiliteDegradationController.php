<?php

namespace App\Http\Controllers;

use App\Models\Commercial_client;
use App\Models\Commercial_site;
use App\Models\ComptabiliteDegradation;
use App\Models\Conteneur;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;

class ComptabiliteDegradationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $conteneurs = Conteneur::where('localisation_id', Auth::user()->localisation_id)->get();
        $sites = Commercial_site::where('localisation_id', Auth::user()->localisation_id)->get();
        $clients = Commercial_client::where('localisation_id', Auth::user()->localisation_id)->get();
        return view('/comptabilite/degradation.index', compact('conteneurs', 'sites', 'clients'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function liste()
    {
        $degradations = ComptabiliteDegradation::where('localisation_id', Auth::user()->localisation_id)->get();
        return view('/comptabilite/degradation.liste', compact('degradations'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @return Response
     */
    public function store(Request $request)
    {
        $degradation = new ComptabiliteDegradation([
            'dateDegradation' => $request->get('dateDegradation'),
            'conteneur' => $request->get('conteneur'),
            'lieu' => $request->get('lieu'),
            'details' => $request->get('details'),
            'destinationProvenance' => $request->get('destinationProvenance'),
            'site' => $request->get('site'),
            'client' => $request->get('client'),
            'commentaire' => $request->get('commentaire'),
            'conteneurEnleve' => $request->get('conteneurEnleve'),
            'conteneurAvecFonds' => $request->get('conteneurAvecFonds'),
            'montant' => $request->get('montant'),
            'dateDeclaration' => $request->get('dateDeclaration'),
            'bordereau' => $request->get('bordereau'),
        ]);
        $degradation->save();
        return redirect('/comptabilite-degradation')->with('success', 'Incident enregistré!');
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
        $degradation = ComptabiliteDegradation::where('localisation_id', Auth::user()->localisation_id)->find($id);
        $conteneurs = Conteneur::where('localisation_id', Auth::user()->localisation_id)->get();
        $sites = Commercial_site::where('localisation_id', Auth::user()->localisation_id)->get();
        $clients = Commercial_client::where('localisation_id', Auth::user()->localisation_id)->get();
        return view('/comptabilite/degradation.edit', compact('conteneurs', 'sites', 'clients', 'degradation'));

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
        $degradation = ComptabiliteDegradation::where('localisation_id', Auth::user()->localisation_id)->find($id);
        $degradation->dateDegradation = $request->get('dateDegradation');
        $degradation->conteneur = $request->get('conteneur');
        $degradation->lieu = $request->get('lieu');
        $degradation->details = $request->get('details');
        $degradation->destinationProvenance = $request->get('destinationProvenance');
        $degradation->site = $request->get('site');
        $degradation->client = $request->get('client');
        $degradation->commentaire = $request->get('commentaire');
        $degradation->conteneurEnleve = $request->get('conteneurEnleve');
        $degradation->conteneurAvecFonds = $request->get('conteneurAvecFonds');
        $degradation->montant = $request->get('montant');
        $degradation->dateDeclaration = $request->get('dateDeclaration');
        $degradation->bordereau = $request->get('bordereau');
        $degradation->save();
        return redirect('/comptabilite-degradation-liste')->with('success', 'Incident enregistré!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id)
    {
        $degradation = ComptabiliteDegradation::where('localisation_id', Auth::user()->localisation_id)->find($id);
        $degradation->delete();
        return redirect('/comptabilite-degradation-liste')->with('success', 'Incident supprimé!');
    }
}
