<?php

namespace App\Http\Controllers;

use App\Models\Centre;
use App\Models\Centre_regional;
use App\Models\Commercial_client;
use App\Models\Commercial_site;
use App\Models\OptionSecteurActivite;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class CommercialClientController extends Controller
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
        $secteur_activites = OptionSecteurActivite::orderBy("option")->get();
        return view('commercial/client.index', compact('clients', 'centres', 'centres_regionaux', 'secteur_activites'));
    }

    public function liste()
    {
        $clients = Commercial_client::all();
        return view('commercial/client.liste', compact('clients'));
    }

    public function listeDetaillee(Request $request)
    {
        $clients = Commercial_client::all();
        $clients_com = Commercial_client::all();
        $sites_com = Commercial_site::orderBy('site')->get();
        $centres = Centre::all();
        $centres_regionaux = Centre_regional::all();

        $client = $request->get("client");
        $site = $request->get("site");
        $centre = $request->get("centre");
        $centre_regional = $request->get("centre_regional");
        $secteur_activites = OptionSecteurActivite::orderBy("option")->get();

        return view('commercial.client.liste-detaillee', compact('clients', 'sites_com', 'clients_com', 'centres', 'centres_regionaux', 'client', 'site', 'centre', 'centre_regional', 'secteur_activites'));
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
            'bt_atm' => $request->get('bt_atm'),
            'base_comptage_montant_forfaitaire' => $request->get('base_comptage_montant_forfaitaire'),
            'base_garde_de_fonds_montant_forfaitaire' => $request->get('base_garde_de_fonds_montant_forfaitaire'),
            'client_secteur_activite' => $request->get('client_secteur_activite'),
            'centre' => $request->get('centre'),
            'centre_regional' => $request->get('centre_regional'),
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
        $client = Commercial_client::find($id);
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
        $client->bt_atm = $request->get("bt_atm");
        $client->base_comptage_montant_forfaitaire = $request->get("base_comptage_montant_forfaitaire");
        $client->base_garde_de_fonds_montant_forfaitaire = $request->get("base_garde_de_fonds_montant_forfaitaire");
        $client->centre_regional = $request->get("centre_regional");
        $client->centre = $request->get("centre");
        $client->client_secteur_activite = $request->get("client_secteur_activite");

        $client->save();
    }

    public function store(Request $request)
    {
        $id = $request->get('id_client');
        if (empty($id)) {
            $this->saveClient($request);
        } else {
            $this->updateClient($request, $id);
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
        $client = Commercial_client::find($id);
        $secteur_activites = OptionSecteurActivite::orderBy("option")->get();
        $centres = Centre::all();
        $centres_regionaux = Centre_regional::all();
        return view('commercial.client.edit', compact('client', 'secteur_activites', 'centres', 'centres_regionaux'));
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
        $client = Commercial_client::find($id);
        $client->delete();
        return response()->json([
            'message' => 'Good!'
        ]);
    }
}
