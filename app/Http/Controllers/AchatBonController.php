<?php

namespace App\Http\Controllers;

use App\Models\AchatBonComande;
use App\Models\AchatBonComandeItem;
use App\Models\AchatDemande;
use App\Models\AchatFournisseur;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class AchatBonController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $numeroBon = (DB::table('achat_bon_comandes')->where('localisation_id', Auth::user()->localisation_id)->max('id') + 1) . '-' . date('d') . '-' . date('m') . '-' . date('Y');
        $currentDate = date('Y-m-d');
        $fournisseurs = AchatFournisseur::where('localisation_id', Auth::user()->localisation_id)->get();
        $demandes = AchatDemande::where('localisation_id', Auth::user()->localisation_id)->get();
        return view('/achat.bon.index', compact('fournisseurs', 'numeroBon', 'currentDate', 'demandes'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function liste()
    {
        $bons = AchatBonComande::with('fournisseurs')->where('localisation_id', Auth::user()->localisation_id)->get();
        return view('/achat.bon.liste', compact('bons'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return Response
     */
    public function store(Request $request)
    {
        //try {
            $data = new AchatBonComande([
                'date' => $request->get('date'),
                'numero' => $request->get('numero'),
                'numero_da' => $request->get('numero_da'),
                'fournisseur_fk' => $request->get('fournisseur_fk'),
                'proforma' => $request->get('proforma'),
                'telephone' => $request->get('telephone'),
                'operation' => $request->get('operation'),
                'objet' => $request->get('objet'),
                'total' => $request->get('total'),
                'livraison' => $request->get('livraison'),
            ]);
            $data->save();

            $designation = $request->get('designation');
            $quantite = $request->get('quantite');
            $pu = $request->get('pu');
            $tva = $request->get('tva');
            // $montant = $request->get('pu');

            for ($i = 0; $i < count($designation); $i++) {
                if (!empty($designation[$i]) && !empty($quantite[$i]) && !empty($pu[$i])) {
                    $item = new AchatBonComandeItem([
                        'achat_bon_fk' => $data->id,
                        'designation' => $designation[$i],
                        'quantite' => $quantite[$i],
                        'prix' => $pu[$i],
                        'tva' => $tva[$i],
                        'montant' => intval($pu[$i]) * intval($quantite[$i]) + (intval($pu[$i]) * intval($quantite[$i]) * ($tva[$i] / 100))
                    ]);
                    $item->save();
                }
            }

            return redirect('achat-bon-liste')->with('success', 'Enregistrement effectué!');
        /*} catch (\Exception $e) {
            return redirect('achat-bon')->with('error', 'Une erreur s\'est produite: ' . $e->getMessage());
        }*/
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
        // $bon = AchatBonComande::with('fournisseurs')->find($id)->get();
        $bon = AchatBonComande::where('localisation_id', Auth::user()->localisation_id)->find($id);
        $fournisseurs = AchatFournisseur::where('localisation_id', Auth::user()->localisation_id)->get();
        $demandes = AchatDemande::where('localisation_id', Auth::user()->localisation_id)->get();
        $bonItems = AchatBonComandeItem::with('bons')->where('achat_bon_fk', '=', $id)->andWhere('localisation_id', Auth::user()->localisation_id)->get();
        return view('/achat.bon.edit', compact('bon', 'fournisseurs', 'bonItems', 'demandes'));
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
//        try {
        $montant = 0;
        $designation = $request->get('designation');
        $quantite = $request->get('quantite');
        $pu = $request->get('pu');
        $tva = $request->get('tva');
        $ids = $request->get('ids');

        for ($i = 0; $i < count($designation); $i++) {
            if (!empty($designation[$i]) && !empty($quantite[$i]) && !empty($pu[$i]) && !empty($ids[$i])) {
                $ht = intval($pu[$i]) * intval($quantite[$i]);
                $total = $ht + ($ht * intval($tva[$i]) / 100); // intval($pu[$i]) * intval($quantite[$i]);
                $montant += $total;
                $item = AchatBonComandeItem::where('localisation_id', Auth::user()->localisation_id)->find($ids[$i]);
                $item->achat_bon_fk = $id;
                $item->designation = $designation[$i];
                $item->quantite = $quantite[$i];
                $item->prix = $pu[$i];
                $item->tva = $tva[$i];
                $item->montant = $total;
                $item->save();
            }
        }

        $data = AchatBonComande::where('localisation_id', Auth::user()->localisation_id)->find($id);
        $data->date = $request->get('date');
        $data->numero = $request->get('numero');
        $data->numero_da = $request->get('numero_da');
        $data->fournisseur_fk = $request->get('fournisseur_fk');
        $data->proforma = $request->get('proforma');
        $data->telephone = $request->get('telephone');
        $data->operation = $request->get('operation');
        $data->objet = $request->get('objet');
        $data->livraison = $request->get('livraison');
        $data->total = $montant;
        $data->save();

        // $montant = $request->get('pu');

        return redirect('achat-bon-liste')->with('success', 'Enregistrement modifié!');
        /*} catch (\Exception $e) {
            return redirect('achat-bon-liste')->with('error', 'Une erreur s\'est produite: ' . $e->getMessage());
        }*/
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return Response
     */
    public function destroy($id)
    {
        $data = AchatBonComande::where('localisation_id', Auth::user()->localisation_id)->find($id);
        $data->delete();
        return redirect('achat-bon-liste')->with('success', 'Enregistrement supprimé!');
    }
}
