<?php

namespace App\Http\Controllers;

use App\Models\Centre;
use App\Models\Centre_regional;
use App\Models\Commercial_client;
use App\Models\Commercial_site;
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
        return view('commercial/site.index',
            compact('clients','centres', 'centres_regionaux'));
    }

    public function liste()
    {
        $sites = Commercial_site::all();
        return view('commercial/site.liste',
            compact('sites'));
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
        /*$objet_operation = null;
        if (!empty($request->get('objet_operation'))) {
            $objet_operation = implode(",", $request->get('objet_operation'));
        }*/
        $site = new Commercial_site([
            'client' => $request->get('client'),
            'site' => $request->get('site'),
            'nom_contact_site' => $request->get('nom_contact_site'),
            'fonction_contact' => $request->get('fonction_contact'),
            'centre' => $request->get('centre'),
            'centre_regional' => $request->get('centre_regional'),
            'telephone' => $request->get('telephone'),
            'no_carte' => $request->get('no_carte'),
            'oo_vb_extamuros_bitume' => $request->get('oo_vb_extamuros_bitume'),
            'oo_vb_extramuros_piste' => $request->get('oo_vb_extramuros_piste'),
            'oo_vl_extramuros_bitume' => $request->get('oo_vl_extramuros_bitume'),
            'oo_vl_extramuros_piste' => $request->get('oo_vl_extramuros_piste'),
            'oo_vb_intramuros' => $request->get('oo_vb_intramuros'),
            'oo_mad' => $request->get('oo_mad'),
            'oo_collecte' => $request->get('oo_collecte'),
            'oo_cctv' => $request->get('oo_cctv'),
            'oo_collecte_caisse' => $request->get('oo_collecte_caisse'),
            'oo_borne_cheque' => $request->get('oo_borne_cheque'),
            'oo_borne_operation' => $request->get('oo_borne_operation'),
            'oo_gestion_gab_niveau' => $request->get('oo_gestion_gab_niveau'),
            'oo_gestion_gab_prix' => $request->get('oo_gestion_gab_prix'),
            'oo_maintenance_n2' => $request->get('oo_maintenance_n2'),
            'oo_vente_location' => $request->get('oo_vente_location'),
            'oo_vente_consommables' => $request->get('oo_vente_consommables'),
            'oo_vente_pieces_detachees' => $request->get('oo_vente_pieces_detachees'),
            'oo_securipack' => $request->get('oo_securipack'),
            'oo_sac_juste' => $request->get('oo_sac_juste'),
            'oo_scelle' => $request->get('oo_scelle'),
            'oo_total' => $request->get('oo_total'),
            //'objet_operation' => $objet_operation,
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
        // $site = Commercial_site::find($id);
        $site = Commercial_site::with('clients')->get()->find($id);
        $clients = Commercial_client::all();
        $centres = Centre::all();
        $centres_regionaux = Centre_regional::all();
        return view('commercial.site.edit',
            compact('site', 'clients','centres', 'centres_regionaux'));
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
        $site = Commercial_site::find($id);
        $site->client = $request->get('client');
        $site->site = $request->get('site');
        $site->nom_contact_site = $request->get('nom_contact_site');
        $site->fonction_contact = $request->get('fonction_contact');
        $site->centre = $request->get('centre');
        $site->centre_regional = $request->get('centre_regional');
        $site->telephone = $request->get('telephone');
        $site->no_carte = $request->get('no_carte');
        $site->oo_vb_extamuros_bitume = $request->get('oo_vb_extamuros_bitume');
        $site->oo_vb_extramuros_piste = $request->get('oo_vb_extramuros_piste');
        $site->oo_vl_extramuros_bitume = $request->get('oo_vl_extramuros_bitume');
        $site->oo_vl_extramuros_piste = $request->get('oo_vl_extramuros_piste');
        $site->oo_vb_intramuros = $request->get('oo_vb_intramuros');
        $site->oo_mad = $request->get('oo_mad');
        $site->oo_collecte = $request->get('oo_collecte');
        $site->oo_cctv = $request->get('oo_cctv');
        $site->oo_collecte_caisse = $request->get('oo_collecte_caisse');
        $site->oo_borne_cheque = $request->get('oo_borne_cheque');
        $site->oo_borne_operation = $request->get('oo_borne_operation');
        $site->oo_gestion_gab_niveau = $request->get('oo_gestion_gab_niveau');
        $site->oo_gestion_gab_prix = $request->get('oo_gestion_gab_prix');
        $site->oo_maintenance_n2 = $request->get('oo_maintenance_n2');
        $site->oo_vente_location = $request->get('oo_vente_location');
        $site->oo_vente_consommables = $request->get('oo_vente_consommables');
        $site->oo_vente_pieces_detachees = $request->get('oo_vente_pieces_detachees');
        $site->oo_securipack = $request->get('oo_securipack');
        $site->oo_sac_juste = $request->get('oo_sac_juste');
        $site->oo_scelle = $request->get('oo_scelle');
        $site->oo_total = $request->get('oo_total');
        $site->forfait_mensuel_ctv = $request->get('forfait_mensuel_ctv');
        $site->forfait_mensuel_gdf = $request->get('forfait_mensuel_gdf');
        $site->forfait_mensuel_mad = $request->get('forfait_mensuel_mad');
        $site->regime = $request->get('regime');
        $site->tarif_bitume = $request->get('tarif_bitume');
        $site->tarif_km_piste = $request->get('tarif_km_piste');
        $site->tarif_tdf_vb = $request->get('tarif_tdf_vb');
        $site->tarif_tdf_vl = $request->get('tarif_tdf_vl');
        $site->tarif_collecte_caissiere = $request->get('tarif_collecte_caissiere');
        $site->save();
        return redirect('/commercial-site-liste')->with('success', 'Site modifié avec succès!');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id)
    {
        $site = Commercial_site::find($id);
        $site->delete();
        return redirect('/commercial-site-liste')->with('success', 'Site supprimé!');
    }
}
