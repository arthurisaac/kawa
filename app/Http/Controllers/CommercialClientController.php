<?php

namespace App\Http\Controllers;

use App\Models\Commercial_client;
use App\Models\SecteurActivite;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;

class CommercialClientController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $clients = Commercial_client::where('localisation_id', Auth::user()->localisation_id)->get();
        $secteurs = SecteurActivite::where('localisation_id', Auth::user()->localisation_id)->get();
        return view('commercial/client.index', compact('clients', 'secteurs'));
    }

    public function liste()
    {
        $clients = Commercial_client::where('localisation_id', Auth::user()->localisation_id)->get();
        $secteurs = SecteurActivite::where('localisation_id', Auth::user()->localisation_id)->get();
        return view('commercial/client.liste', compact('clients', 'secteurs'));
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

    public function saveClient(Request $request)
    {
        $contrat_objet = null;
        if (!empty($request->get('contrat_objet'))) {
            $contrat_objet = implode(",", $request->get('contrat_objet'));
        }
        $contrat_desserte = null;
        if (!empty($request->get('contrat_desserte'))) {
            $contrat_desserte = implode(",", $request->get('contrat_desserte'));
        }
        $contrat_frequence_op = null;
        if (!empty($request->get('contrat_frequence_op'))) {
            $contrat_frequence_op = implode(",", $request->get('contrat_frequence_op'));
        }
        $contrat_regime = null;
        if (!empty($request->get('contrat_regime'))) {
            $contrat_regime = implode(",", $request->get('contrat_regime'));
        }
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
            'contrat_objet' => $contrat_objet,
            'contrat_desserte' => $contrat_desserte,
            'contrat_frequence_op' => $contrat_frequence_op,
            'contrat_regime' => $contrat_regime,
            'base_tdf_vb' => $request->get('base_tdf_vb'),
            'base_tdf_vl' => $request->get('base_tdf_vl'),
            'base_mad_caisse' => $request->get('base_mad_caisse'),
            'base_collecte' => $request->get('base_collecte'),
            'base_petit_materiel_securipack' => $request->get('base_petit_materiel_securipack'),
            'base_petit_materiel_sacjute' => $request->get('base_petit_materiel_sacjute'),
            'base_petit_materiel_scelle' => $request->get('base_petit_materiel_scelle'),
            //'base_garde_de_fonds_cout_unitaire' => $request->get('base_garde_de_fonds_cout_unitaire'),
            //'base_garde_de_fonds_montant_garde_cu' => $request->get('base_garde_de_fonds_montant_garde_cu'),
            //'base_garde_de_fonds_cout_forfetaire' => $request->get('base_garde_de_fonds_cout_forfetaire'),
            //'base_garde_de_fonds_montant_garde_cf' => $request->get('base_garde_de_fonds_montant_garde_cf'),
            //'base_comptage_tri_cout_unitaire' => $request->get('base_comptage_tri_cout_unitaire'),
            //'base_comptage_tri_montant_ctv' => $request->get('base_comptage_tri_montant_ctv'),
            //'base_gestion_atm' => $request->get('base_gestion_atm'),
            'bt_atm' => $request->get('bt_atm'),
            'base_comptage_montant_forfaitaire' => $request->get('base_comptage_montant_forfaitaire'),
            'base_garde_de_fonds_montant_forfaitaire' => $request->get('base_garde_de_fonds_montant_forfaitaire'),
            //ase_maintenance_atm' => $request->get('base_maintenance_atm'),
            //'base_consommable_atm' => $request->get('base_consommable_atm'),
            'secteur_activite_id' => $request->get('secteur_activite_id')
        ]);
        $client->save();
    }


    public function updateClient(Request $request, $id)
    {
        $contrat_objet = null;
        if (!empty($request->get('contrat_objet'))) {
            $contrat_objet = implode(",", $request->get('contrat_objet'));
        }
        $contrat_desserte = null;
        if (!empty($request->get('contrat_desserte'))) {
            $contrat_desserte = implode(",", $request->get('contrat_desserte'));
        }
        $contrat_frequence_op = null;
        if (!empty($request->get('contrat_frequence_op'))) {
            $contrat_frequence_op = implode(",", $request->get('contrat_frequence_op'));
        }
        $contrat_regime = null;
        if (!empty($request->get('contrat_regime'))) {
            $contrat_regime = implode(",", $request->get('contrat_regime'));
        }
        // $id = $request->get('id_client');
        $client = Commercial_client::where('localisation_id', Auth::user()->localisation_id)->find($id);
        $client->client_nom = $request->get('client_nom');
        $client->client_situation_geographique = $request->get('client_situation_geographique');
        $client->client_tel = $request->get('client_tel');
        $client->client_regime_impot = $request->get('client_regime_impot');
        $client->client_boite_postale = $request->get('client_boite_postale');
        $client->client_ville = $request->get('client_ville');
        $client->client_rc = $request->get('client_rc');
        $client->client_ncc = $request->get('client_ncc');
        $client->contact_nom = $request->get('contact_nom');
        $client->contact_email = $request->get('contact_email');
        $client->contact_portefeuille = $request->get('contact_portefeuille');
        $client->contact_fonction = $request->get('contact_fonction');
        $client->contact_portable = $request->get('contact_portable');

        $client->contact_secteur_activite = $request->get('contact_secteur_activite');
        $client->contrat_numero = $request->get('contrat_numero');
        $client->contrat_date_effet = $request->get('contrat_date_effet');
        $client->contrat_duree = $request->get('contrat_duree');
        $client->contrat_objet = $contrat_objet;
        $client->contrat_desserte = $contrat_desserte;
        $client->contrat_frequence_op = $contrat_frequence_op;
        $client->contrat_regime = $contrat_regime;
        $client->base_tdf_vb = $request->get('base_tdf_vb');
        $client->base_tdf_vl = $request->get('base_tdf_vl');
        $client->base_mad_caisse = $request->get('base_mad_caisse');
        $client->base_collecte = $request->get('base_collecte');
        $client->base_petit_materiel_securipack = $request->get('base_petit_materiel_securipack');
        $client->base_petit_materiel_sacjute = $request->get('base_petit_materiel_sacjute');
        $client->base_petit_materiel_scelle = $request->get('base_petit_materiel_scelle');
        //$client->base_garde_de_fonds_cout_unitaire = $request->get('base_garde_de_fonds_cout_unitaire');
        //$client->base_garde_de_fonds_montant_garde_cu = $request->get('base_garde_de_fonds_montant_garde_cu');
        //$client->base_garde_de_fonds_cout_forfetaire = $request->get('base_garde_de_fonds_cout_forfetaire');
        //$client->base_garde_de_fonds_montant_garde_cf = $request->get('base_garde_de_fonds_montant_garde_cf');
        //$client->base_comptage_tri_cout_unitaire = $request->get('base_comptage_tri_cout_unitaire');
        //$client->base_comptage_tri_montant_ctv = $request->get('base_comptage_tri_montant_ctv');
        //$client->base_gestion_atm = $request->get('base_gestion_atm');
        //$client->base_maintenance_atm = $request->get('base_maintenance_atm');
        //$client->base_consommable_atm = $request->get('base_consommable_atm');
        $client->bt_atm = $request->get("bt_atm");
        $client->base_comptage_montant_forfaitaire = $request->get("base_comptage_montant_forfaitaire");
        $client->base_garde_de_fonds_montant_forfaitaire = $request->get("base_garde_de_fonds_montant_forfaitaire");
        $client->secteur_activite_id = $request->get('secteur_activite_id');

        $client->save();
    }

    public function store(Request $request)
    {
        $id = $request->get('id_client');
        if (empty($id)) {
            $this->saveClient($request);
        } else {
            $this->updateClient($request);
        }


        return redirect()->back()->with('success', 'Client enregistré!');
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
        $client = Commercial_client::where('localisation_id', Auth::user()->localisation_id)->find($id);
        $secteurs = SecteurActivite::where('localisation_id', Auth::user()->localisation_id)->get();
        return view('commercial.client.edit', compact('client', 'secteurs'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return Response
     */
    public function update(Request $request, $id)
    {
        $this->updateClient($request, $id);
        return redirect('/commercial-client-liste')->with('success', 'Client enregistré!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return Response
     */
    public function destroy($id)
    {
        $client = Commercial_client::where('localisation_id', Auth::user()->localisation_id)->find($id);
        $client->delete();
        return response()->json([
            'message' => 'Good!'
        ]);
    }
}
