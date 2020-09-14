<?php

namespace App\Http\Controllers;

use App\Commercial_client;
use Illuminate\Http\Request;

class CommercialClientController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $clients = Commercial_client::all();
        return view('commercial/client.index', compact('clients'));
    }

    public function liste()
    {
        $clients = Commercial_client::all();
        return view('commercial/client.liste', compact('clients'));
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
        $client = new Commercial_client([
            'client_nom' => $request->get('client_nom'),
            'client_situation_geographique' => $request->get('client_situation_geographique'),
            'client_tel' => $request->get('client_tel'),
            'client_regime_impot' => $request->get('client_regime_impot'),
            'client_boite_postale' => $request->get('client_boite_postale'),
            'client_ville' => $request->get('client_ville'),
            'client_rc' => $request->get('client_rc'),
            'client_ncc' => $request->get('client_ncc'),
            'contact_nom' => $request->get('contact_nom'),
            'contact_email' => $request->get('contact_email'),
            'contact_portefeuille' => $request->get('contact_portefeuille'),
            'contact_fonction' => $request->get('contact_fonction'),
            'contact_portable' => $request->get('contact_portable'),
            'contact_secteur_activite' => $request->get('contact_secteur_activite'),
            'contrat_numero' => $request->get('contrat_numero'),
            'contrat_date_effet' => $request->get('contrat_date_effet'),
            'contrat_duree' => $request->get('contrat_duree'),
            'contrat_objet' => implode(",",$request->get('contrat_objet')),
            'contrat_desserte' => implode(",", $request->get('contrat_desserte')),
            'contrat_frequence_op' => implode(",", $request->get('contrat_frequence_op')),
            'contrat_regime' => implode(",", $request->get('contrat_regime')),
            'base_tdf_vb' => $request->get('base_tdf_vb'),
            'base_tdf_vl' => $request->get('base_tdf_vl'),
            'base_mad_caisse' => $request->get('base_mad_caisse'),
            'base_collecte' => $request->get('base_collecte'),
            'base_petit_materiel_securipack' => $request->get('base_petit_materiel_securipack'),
            'base_petit_materiel_sacjute' => $request->get('base_petit_materiel_sacjute'),
            'base_petit_materiel_scelle' => $request->get('base_petit_materiel_scelle'),
            'base_garde_de_fonds_cout_unitaire' => $request->get('base_garde_de_fonds_cout_unitaire'),
            'base_garde_de_fonds_montant_garde_cu' => $request->get('base_garde_de_fonds_montant_garde_cu'),
            'base_garde_de_fonds_cout_forfetaire' => $request->get('base_garde_de_fonds_cout_forfetaire'),
            'base_garde_de_fonds_montant_garde_cf' => $request->get('base_garde_de_fonds_montant_garde_cf'),
            'base_comptage_tri_cout_unitaire' => $request->get('base_comptage_tri_cout_unitaire'),
            'base_comptage_tri_montant_ctv' => $request->get('base_comptage_tri_montant_ctv'),
            'base_gestion_atm' => $request->get('base_gestion_atm'),
            'base_maintenance_atm' => $request->get('base_maintenance_atm'),
            'base_consommable_atm' => $request->get('base_consommable_atm'),
        ]);
        $client->save();

        return redirect('/commercial-client')->with('success', 'Client enregistré!');
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
