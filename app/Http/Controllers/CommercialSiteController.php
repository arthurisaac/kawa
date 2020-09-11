<?php

namespace App\Http\Controllers;

use App\Centre;
use App\Centre_regional;
use App\Commercial_client;
use App\Commercial_site;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class CommercialSiteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $clients = Commercial_client::all();
        $centres = Centre::all();
        $centres_regionaux = Centre_regional::all();
        $sites = Commercial_site::all();
        return view('commercial/site.index',
            compact('clients','centres', 'centres_regionaux'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @return Response
     */
    public function store(Request $request)
    {
        $site = new Commercial_site([
            'client' => $request->get('client'),
            'site' => $request->get('site'),
            'nom_contact_site' => $request->get('nom_contact_site'),
            'fonction_contact' => $request->get('fonction_contact'),
            'centre' => $request->get('centre'),
            'centre_regional' => $request->get('centre_regional'),
            'telephone' => $request->get('telephone'),
            'no_carte' => $request->get('no_carte'),
            'objet_operation' => implode(",", $request->get('objet_operation')),
            'forfait_mensuel_ctv' => $request->get('forfait_mensuel_ctv'),
            'forfait_mensuel_gdf' => $request->get('forfait_mensuel_gdf'),
            'forfait_mensuel_mad' => $request->get('forfait_mensuel_mad'),
            'regime' => $request->get('regime'),
            'tarif_bitume' => $request->get('tarif_bitume'),
            'tarif_km_piste' => $request->get('tarif_km_piste'),
            'tarif_tdf_vb' => $request->get('tarif_tdf_vb'),
            'tarif_tdf_vl' => $request->get('tarif_tdf_vl'),
            'tarif_collecte_caissiere' => $request->get('tarif_collecte_caissiere'),
        ]);
        $site->save();
        return redirect('/commercial-site')->with('success', 'Site enregistré!');
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
        //
    }
}
