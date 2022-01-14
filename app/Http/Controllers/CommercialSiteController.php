<?php

namespace App\Http\Controllers;

use App\Models\Centre;
use App\Models\Centre_regional;
use App\Models\Commercial_client;
use App\Models\Commercial_site;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;

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
        $centres = Centre::all();;
        $centres_regionaux = Centre_regional::all();;
        return view('commercial/site.index',
            compact('clients', 'centres', 'centres_regionaux'));
    }

    public function liste(Request $request)
    {
//        dd($request->all());
        $site = $request->get('site');
        $centre = $request->get('centre');
        $centre_regional = $request->get('centre_regional');
        $client = $request->get('client');

        $cr = Commercial_site::with('clients')->distinct('centre_regional')->groupBy('centre_regional')->get();
        $c = Commercial_site::with('clients')->distinct('centre')->groupBy('centre')->get();
        $s = Commercial_site::with('clients')->distinct('site')->groupBy('site')->get();
        $cl = Commercial_site::with('clients')->distinct('client')->groupBy('client')->get();

        if (isset($site))
        {
            $sites = Commercial_site::with('clients')
                                    ->where('site', $site)
                                    ->get();

            $count =  Commercial_site::with('clients')
                ->where('site', $site)
                ->distinct('client')
                ->count();

        }elseif (isset($centre))
        {
            $sites = Commercial_site::with('clients')
                                        ->where('centre', $centre)
                                        ->get();

            $count =  Commercial_site::with('clients')
                ->where('centre', $centre)
                ->distinct('client')
                ->count();

        }elseif (isset($centre_regional))
        {
            $sites = Commercial_site::with('clients')
                ->where('centre_regional', $centre_regional)
                ->get();

            $count =  Commercial_site::with('clients')
                ->where('centre_regional', $centre_regional)
                ->distinct('client')
                ->count();

        }elseif (isset($client)){
            $sites = Commercial_site::with('clients')
                ->where('client', $client)
                ->get();

            $count =  Commercial_site::with('clients')
                ->where('client', $client)
                ->distinct('client')
                ->count();
        }
        else{
            $sites = Commercial_site::with('clients')->get();

            $count =  Commercial_site::with('clients')
                ->distinct('client')
                ->count();
        }

        return view('commercial/site.liste',
            compact('sites', 'count', 'c', 'cl', 'cr', 's'));
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
            'oo_vl_intramuros' => $request->get('oo_vl_intramuros'),
            'oo_mad' => $request->get('oo_mad'),
            'oo_collecte' => $request->get('oo_collecte'),
            'oo_cctv' => $request->get('oo_cctv'),
            'oo_collecte_caisse' => $request->get('oo_collecte_caisse'),
            'oo_borne_cheque' => $request->get('oo_borne_cheque'),
            'oo_borne_operation' => $request->get('oo_borne_operation'),
            'oo_gestion_gab' => $request->get('oo_gestion_gab'),
            'oo_maintenance_n2' => $request->get('oo_maintenance_n2'),
            'oo_vente_location' => $request->get('oo_vente_location'),
            'oo_vente_consommables' => $request->get('oo_vente_consommables'),
            'oo_vente_pieces_detachees' => $request->get('oo_vente_pieces_detachees'),
            'oo_securipack_extra_grand' => $request->get('oo_securipack_extra_grand'),
            'oo_securipack_grand' => $request->get('oo_securipack_grand'),
            'oo_securipack_moyen' => $request->get('oo_securipack_moyen'),
            'oo_securipack_petit' => $request->get('oo_securipack_petit'),
            'oo_sacjuste_extra_grand' => $request->get('oo_sacjuste_extra_grand'),
            'oo_sacjuste_grand' => $request->get('oo_sacjuste_grand'),
            'oo_sacjuste_moyen' => $request->get('oo_sacjuste_moyen'),
            'oo_sacjuste_petit' => $request->get('oo_sacjuste_petit'),
            'oo_scelle_extra_grand' => $request->get('oo_scelle_extra_grand'),
            'oo_scelle_grand' => $request->get('oo_scelle_grand'),
            'oo_scelle_moyen' => $request->get('oo_scelle_moyen'),
            'oo_scelle_petit' => $request->get('oo_scelle_petit'),
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
            'oo_garde_fond' => $request->get('oo_garde_fond'),
            'oo_comptage' => $request->get('oo_comptage'),
            'oo_dispatching' => $request->get('oo_dispatching'),
            'oo_ass_appro' => $request->get('oo_ass_appro'),
            'oo_dnf' => $request->get('oo_dnf'),
        ]);
        $site->save();
        return redirect()->back()->with('success', 'Site enregistré!');
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
        // $site = Commercial_site::find($id);
        $site = Commercial_site::with('clients')->get()->find($id);
        $clients = Commercial_client::all();
        $centres = Centre::all();
        $centres_regionaux = Centre_regional::all();
        return view('commercial.site.edit',
            compact('site', 'clients', 'centres', 'centres_regionaux'));
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
        $site->oo_vl_intramuros = $request->get('oo_vl_intramuros');
        $site->oo_mad = $request->get('oo_mad');
        $site->oo_collecte = $request->get('oo_collecte');
        $site->oo_cctv = $request->get('oo_cctv');
        $site->oo_collecte_caisse = $request->get('oo_collecte_caisse');
        $site->oo_borne_cheque = $request->get('oo_borne_cheque');
        $site->oo_borne_operation = $request->get('oo_borne_operation');
        $site->oo_gestion_gab = $request->get('oo_gestion_gab');
        $site->oo_maintenance_n2 = $request->get('oo_maintenance_n2');
        $site->oo_vente_location = $request->get('oo_vente_location');
        $site->oo_vente_consommables = $request->get('oo_vente_consommables');
        $site->oo_vente_pieces_detachees = $request->get('oo_vente_pieces_detachees');
        $site->oo_securipack_grand = $request->get('oo_securipack_grand');
        $site->oo_securipack_moyen = $request->get('oo_securipack_moyen');
        $site->oo_securipack_petit = $request->get('oo_securipack_petit');
        $site->oo_sacjuste_extra_grand = $request->get('oo_sacjuste_extra_grand');
        $site->oo_sacjuste_grand = $request->get('oo_sacjuste_grand');
        $site->oo_sacjuste_moyen = $request->get('oo_sacjuste_moyen');
        $site->oo_sacjuste_petit = $request->get('oo_sacjuste_petit');
        $site->oo_scelle_extra_grand = $request->get('oo_scelle_extra_grand');
        $site->oo_scelle_grand = $request->get('oo_scelle_grand');
        $site->oo_scelle_moyen = $request->get('oo_scelle_moyen');
        $site->oo_scelle_petit = $request->get('oo_scelle_petit');
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
        $site->oo_garde_fond = $request->get('oo_garde_fond');
        $site->oo_comptage = $request->get('oo_comptage');
        $site->oo_dispatching = $request->get('oo_dispatching');
        $site->oo_ass_appro = $request->get('oo_ass_appro');
        $site->oo_dnf = $request->get('oo_dnf');
        $site->save();
        return redirect('/commercial-site-liste')->with('success', 'Site modifié avec succès!');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return Response
     */
    public function destroy($id)
    {
        $site = Commercial_site::find($id);
        $site->delete();
        return response()->json([
            'message' => 'Good!'
        ]);
        //return redirect('/commercial-site-liste')->with('success', 'Site supprimé!');
    }
}
