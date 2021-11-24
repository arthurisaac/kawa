<?php

namespace App\Http\Controllers;

use App\Models\CaisseBilletage;
use App\Models\CaisseCtv;
use App\Models\CaisseCTVOperatrice;
use App\Models\CaisseServiceOperatrice;
use App\Models\Centre;
use App\Models\Centre_regional;
use App\Models\Commercial_client;
use App\Models\Commercial_site;
use App\Models\DepartTournee;
use App\Models\Personnel;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\DB;

class CaisseCtvController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $personnels = Personnel::all();
        $clients = Commercial_client::all();
        $centres = Centre::all();
        $centres_regionaux = Centre_regional::all();
        $tournees = DepartTournee::all();
        $sites = Commercial_site::all();
        $operatrices = CaisseServiceOperatrice::with('operatrice')->get();
        $gardes = DB::table('personnels')->where('transport', '=', 'Garde')->get();
        return view('/caisse/ctv.index',
            compact('personnels', 'centres', 'centres_regionaux', 'clients', 'tournees', 'sites', 'operatrices', 'gardes'));
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
        $ctv = new CaisseCtv([
            'date' => $request->get('date'),
            'centre' => $request->get('centre'),
            'centre_regional' => $request->get('centre_regional'),
            'operatriceCaisse' => $request->get('operatriceCaisse'),
            'numeroBox' => $request->get('numeroBox'),
            'heurePriseBox' => $request->get('heurePriseBox'),
            'heureFinBox' => $request->get('heureFinBox'),
            'tournee' => $request->get('tournee'),
            'bordereau' => $request->get('bordereau'),
            'convoyeurGarde' => $request->get('convoyeurGarde'),
            'regulatrice' => $request->get('regulatrice'),
            'securipack' => $request->get('securipack'),
            'sacjute' => $request->get('sacjute'),
            'nombreColis' => $request->get('nombreColis'),
            'numeroScelleColis' => $request->get('numeroScelleColis'),
            'montantAnnonce' => $request->get('montantAnnonce'),
            'client' => $request->get('client'),
            'site' => $request->get('site'),
            'expediteur' => $request->get('expediteur'),
            'destinataire' => $request->get('destinataire'),
            'montantReconnu' => $request->get('montantReconnu'),
            'ecartConstate' => $request->get('ecartConstate'),
            'montantFinal' => $request->get('montantFinal'),
            'billetsCalcules' => $request->get('billetsCalcules'),
            'billetsCalculesMontant' => $request->get('billetsCalculesMontant'),
            'billetsSansValeurs' => $request->get('billetsSansValeurs'),
            'billetsSansValeursMontant' => $request->get('billetsSansValeursMontant'),
            'billetsUsages' => $request->get('billetsUsages'),
            'billetsUsagesMontant' => $request->get('billetsUsagesMontant'),
            'fauxBillets' => $request->get('fauxBillets'),
            'fauxBilletsMontant' => $request->get('fauxBilletsMontant'),
            'billetsDeparailles' => $request->get('billetsDeparailles'),
            'billetsDeparaillesMontant' => $request->get('billetsDeparaillesMontant'),
        ]);
        $ctv->save();

        $billetage = new CaisseBilletage([
            'ctv' => $ctv->id,
            'ba_nb10000' => $request->get('ba_nb10000'),
            'ba_nb5000' => $request->get('ba_nb5000'),
            'ba_nb2000' => $request->get('ba_nb2000'),
            'ba_nb1000' => $request->get('ba_nb1000'),
            'ba_nb500' => $request->get('ba_nb500'),
            'ba_nb250' => $request->get('ba_nb250'),
            'ba_nb200' => $request->get('ba_nb200'),
            'ba_nb100' => $request->get('ba_nb100'),
            'ba_nb50' => $request->get('ba_nb50'),
            'ba_nb25' => $request->get('ba_nb25'),
            'ba_nb10' => $request->get('ba_nb10'),
            'ba_nb5' => $request->get('ba_nb5'),
            'ba_nb1' => $request->get('ba_nb1'),
            'br_nb10000' => $request->get('br_nb10000'),
            'br_nb5000' => $request->get('br_nb5000'),
            'br_nb2000' => $request->get('br_nb2000'),
            'br_nb1000' => $request->get('br_nb1000'),
            'br_nb500' => $request->get('br_nb500'),
            'br_nb250' => $request->get('br_nb250'),
            'br_nb200' => $request->get('br_nb200'),
            'br_nb100' => $request->get('br_nb100'),
            'br_nb50' => $request->get('br_nb50'),
            'br_nb25' => $request->get('br_nb25'),
            'br_nb10' => $request->get('br_nb10'),
            'br_nb5' => $request->get('br_nb5'),
            'br_nb1' => $request->get('br_nb1'),
        ]);
        $billetage->save();

        $operatrices = $request->get('operatrice');
        $numeros = $request->get('numero');
        if (isset($operatrices)) {
            for ($i = 0; $i < count($operatrices); $i++)
                if (!empty($operatrices[$i])) {
                    $data = new CaisseCTVOperatrice([
                        'ctv' => $ctv->id,
                        'operatrice' => $operatrices[$i] ?? null,
                        'numero' => $numeros[$i] ?? 0
                    ]);
                    $data->save();
                }
        }

        return redirect('/ctv-liste')->with('success', 'CTV enregistré!');
    }


    public function show($id)
    {
        //
    }

    public function liste(Request $request)
    {
        $debut = $request->get("debut");
        $fin = $request->get("fin");
        $ctvs = CaisseCtv::with('operatrices')->get();
        if (isset($debut) && isset($fin)) {
            $ctvs = CaisseCtv::with('operatrices')
                ->whereBetween('date', [$debut, $fin])
                ->get();
        }
        return view('/caisse/ctv.liste',
            compact('ctvs'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return Response
     */
    public function edit($id)
    {
        $personnels = Personnel::all();
        $clients = Commercial_client::all();
        $centres = Centre::all();
        $centres_regionaux = Centre_regional::all();
        $tournees = DepartTournee::all();
        $sites = Commercial_site::all();
        $operatrices = CaisseServiceOperatrice::with('operatrice')->get();
        $operatricesCTV = CaisseCTVOperatrice::with('operatrices')->where('ctv', $id)->get();
        $gardes = DB::table('personnels')->where('transport', '=', 'Garde')->get();
        $ctv = CaisseCtv::with('operatrices')->find($id);
        // $operatrices = CaisseServiceOperatrice::where('id', $id)->with('operatrice')->get();
        //$billetage = DB::table('caisse_billetages')->where('ctv', $id)->get();
        $billetages = CaisseBilletage::where('ctv', $id)->get();
        $billetage = $billetages[0];
        return view('/caisse/ctv.edit',
            compact('ctv', 'personnels', 'centres', 'centres_regionaux',
                'clients', 'tournees', 'sites', 'operatrices', 'gardes', 'billetage', 'operatricesCTV'));
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
        $ctv = CaisseCtv::find($id);
        $ctv->date = $request->get('date');
        $ctv->centre = $request->get('centre_regional');
        $ctv->centre_regional = $request->get('centre');
        $ctv->operatriceCaisse = $request->get('operatriceCaisse');
        $ctv->numeroBox = $request->get('numeroBox');
        $ctv->heurePriseBox = $request->get('heurePriseBox');
        $ctv->heureFinBox = $request->get('heureFinBox');
        $ctv->tournee = $request->get('tournee');
        $ctv->bordereau = $request->get('bordereau');
        $ctv->convoyeurGarde = $request->get('convoyeurGarde');
        $ctv->regulatrice = $request->get('regulatrice');
        $ctv->securipack = $request->get('securipack');
        $ctv->sacjute = $request->get('sacjute');
        $ctv->nombreColis = $request->get('nombreColis');
        $ctv->numeroScelleColis = $request->get('numeroScelleColis');
        $ctv->montantAnnonce = $request->get('montantAnnonce');
        $ctv->client = $request->get('client');
        $ctv->site = $request->get('site');
        $ctv->expediteur = $request->get('expediteur');
        $ctv->destinataire = $request->get('destinataire');
        $ctv->montantReconnu = $request->get('montantReconnu');
        $ctv->ecartConstate = $request->get('ecartConstate');
        $ctv->montantFinal = $request->get('montantFinal');
        $ctv->billetsCalcules = $request->get('billetsCalcules');
        $ctv->billetsCalculesMontant = $request->get('billetsCalculesMontant');
        $ctv->billetsSansValeurs = $request->get('billetsSansValeurs');
        $ctv->billetsSansValeursMontant = $request->get('billetsSansValeursMontant');
        $ctv->billetsUsages = $request->get('billetsUsages');
        $ctv->billetsUsagesMontant = $request->get('billetsUsagesMontant');
        $ctv->fauxBillets = $request->get('fauxBillets');
        $ctv->fauxBilletsMontant = $request->get('fauxBilletsMontant');
        $ctv->billetsDeparailles = $request->get('billetsDeparailles');
        $ctv->billetsDeparaillesMontant = $request->get('billetsDeparaillesMontant');
        $ctv->save();

        $billetageId = $request->get('billetageId');
        $billetage = CaisseBilletage::find($billetageId);

        $billetage->ba_nb10000 = $request->get('ba_nb10000');
        $billetage->ba_nb5000 = $request->get('ba_nb5000');
        $billetage->ba_nb2000 = $request->get('ba_nb2000');
        $billetage->ba_nb1000 = $request->get('ba_nb1000');
        $billetage->ba_nb500 = $request->get('ba_nb500');
        $billetage->ba_nb250 = $request->get('ba_nb250');
        $billetage->ba_nb200 = $request->get('ba_nb200');
        $billetage->ba_nb100 = $request->get('ba_nb100');
        $billetage->ba_nb50 = $request->get('ba_nb50');
        $billetage->ba_nb25 = $request->get('ba_nb25');
        $billetage->ba_nb10 = $request->get('ba_nb10');
        $billetage->ba_nb5 = $request->get('ba_nb5');
        $billetage->ba_nb1 = $request->get('ba_nb1');
        $billetage->br_nb10000 = $request->get('br_nb10000');
        $billetage->br_nb5000 = $request->get('br_nb5000');
        $billetage->br_nb2000 = $request->get('br_nb2000');
        $billetage->br_nb1000 = $request->get('br_nb1000');
        $billetage->br_nb500 = $request->get('br_nb500');
        $billetage->br_nb250 = $request->get('br_nb250');
        $billetage->br_nb200 = $request->get('br_nb200');
        $billetage->br_nb100 = $request->get('br_nb100');
        $billetage->br_nb50 = $request->get('br_nb50');
        $billetage->br_nb25 = $request->get('br_nb25');
        $billetage->br_nb10 = $request->get('br_nb10');
        $billetage->br_nb5 = $request->get('br_nb5');
        $billetage->br_nb1 = $request->get('br_nb1');
        $billetage->save();

        $operatrices = $request->get('operatrice');
        $numeros = $request->get('numero');
        $ids = $request->get('ids');
        if (isset($operatrices)) {

            for ($i = 0; $i < count($operatrices); $i++) {
                if (empty($ids[$i])) {
                    if (empty($operatrice)) {
                        $data = new CaisseCTVOperatrice([
                            'ctv' => $id,
                            'operatrice' => $operatrices[$i],
                            'numero' => $numeros[$i] ?? 0
                        ]);
                        $data->save();
                    }
                } else {
                    $data = CaisseCTVOperatrice::find($ids[$i]);
                    if ($data) {
                        $data->operatrice = $operatrices[$i];
                        $data->numero = $numeros[$i];
                        $data->save();
                    }
                }
            }

        }

        return redirect('/ctv-liste')->with('success', 'CTV mis à jour!');
    }

    public function destroy($id)
    {
        $ctv = CaisseCtv::find($id);
        $billetages = CaisseBilletage::where('ctv', $id)->get();
        $operatrices = CaisseCTVOperatrice::where('ctv', $id)->get();
        foreach ($billetages as $billetage) {
            $billet = CaisseBilletage::find($billetage->id);
            if ($billet) $billet->delete();
        }
        foreach ($operatrices as $operatrice) {
            $data = CaisseCTVOperatrice::find($operatrice->id);
            if ($data) $data->delete();
        }
        if ($ctv) $ctv->delete();
        return redirect('/ctv-liste')->with('success', 'Enregistrement supprimé avec succès!');
    }
}
