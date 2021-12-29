<?php

namespace App\Http\Controllers;

use App\Models\Centre;
use App\Models\Centre_regional;
use App\Models\Commercial_client;
use App\Models\Commercial_site;
use App\Models\SsbSite;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;

class SsbSiteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $centres = Centre::where('localisation_id', Auth::user()->localisation_id)->get();
        $centres_regionaux = Centre_regional::where('localisation_id', Auth::user()->localisation_id)->get();
        $clients = Commercial_client::where('localisation_id', Auth::user()->localisation_id)->get();
        $sites = Commercial_site::where('localisation_id', Auth::user()->localisation_id)->get();
        return view('ssb.site.index', compact('centres', 'centres_regionaux', 'clients', 'sites'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function liste()
    {
        $ssbSites = SsbSite::where('localisation_id', Auth::user()->localisation_id)->get();
        return view('ssb.site.liste', compact('ssbSites'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @return Response
     */
    public function store(Request $request)
    {
        $ssbSites = new SsbSite([
            'libelle' => $request->get('libelle'),
            'centre' => $request->get('centre'),
            'centreRegional' => $request->get('centreRegional'),
            'etrags' => $request->get('etrags'),
            'banque' => $request->get('banque'),
            'filiale' => $request->get('filiale'),
            'client' => $request->get('client'),
            'site' => $request->get('site'),
            'nomContact' => $request->get('nomContact'),
            'fonctionContact' => $request->get('fonctionContact'),
            'tel' => $request->get('tel'),
            'nombreGab' => $request->get('nombreGab'),
            'muros' => $request->get('muros'),
        ]);
        $ssbSites->save();
        return redirect('/ssb-site')->with('success', 'Enregistrement effectué');
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
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id)
    {
        $site = SsbSite::where('localisation_id', Auth::user()->localisation_id)->find($id);
        $site->delete();
        return redirect('/ssb-site-liste')->with('success', 'Enregistrement effectué');
    }
}
