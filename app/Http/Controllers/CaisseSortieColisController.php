<?php

namespace App\Http\Controllers;

use App\CaisseSortieColis;
use App\CaisseSortieColisItem;
use App\Centre;
use App\Centre_regional;
use App\Personnel;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\DB;

class CaisseSortieColisController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $centres = Centre::all();
        $centres_regionaux = Centre_regional::all();
        $personnels = Personnel::all();
        return view('/caisse/sortie-colis.index',
            compact('centres', 'centres_regionaux', 'personnels'));
    }

    public function liste()
    {
        $colis = CaisseSortieColis::with('agentRegulations')->get();
        return view('/caisse/sortie-colis.liste', compact('colis'));
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
     * @param  \Illuminate\Http\Request  $request
     * @return Response
     */
    public function store(Request $request)
    {
        $store = new CaisseSortieColis([
            'date' => $request->get('date'),
            'heure' => $request->get('heure'),
            'agentRegulation' => $request->get('agentRegulation'),
            'observation' => $request->get('observation'),
        ]);
        $store->save();

        $totalColis = $request->get('totalColis');
        $typeColisSecuripack = $request->get('typeColisSecuripack');
        $typeColisSacjute = $request->get('typeColisSacjute');
        $nombreColisSecuripack = $request->get('nombreColisSecuripack');
        $nombreColisSacjute = $request->get('nombreColisSacjute');
        $numeroScelleSecuripack = $request->get('numeroScelleSecuripack');
        $numeroScelleSacjute = $request->get('numeroScelleSacjute');
        $montantAnnonceSecuripack = $request->get('montantAnnonceSecuripack');
        $montantAnnonceSacjute = $request->get('montantAnnonceSacjute');
        $bordereau = $request->get('bordereau');
        $expediteur = $request->get('expediteur');

        for ($i = 0; $i < count($totalColis); $i++) {
            if (!empty($totalColis[$i])) {
                $colis = new CaisseSortieColisItem([
                    'sortieColis' =>$store->id,
                    'totalColis' => $totalColis[$i],
                    'typeColisSecuripack' => $typeColisSecuripack[$i],
                    'typeColisSacjute' => $typeColisSacjute[$i],
                    'nombreColisSecuripack' => $nombreColisSecuripack[$i],
                    'nombreColisSacjute' => $nombreColisSacjute[$i],
                    'numeroScelleSecuripack' => $numeroScelleSecuripack[$i],
                    'numeroScelleSacjute' => $numeroScelleSacjute[$i],
                    'montantAnnonceSecuripack' => $montantAnnonceSecuripack[$i],
                    'montantAnnonceSacjute' => $montantAnnonceSacjute[$i],
                    'bordereau' => $bordereau[$i],
                    'expediteur' => $expediteur[$i]
                ]);
                $colis->save();
            }
        }
        return redirect('/caisse-sortie-colis')->with('success', 'Service enregistré!');
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
        $centres = Centre::all();
        $centres_regionaux = Centre_regional::all();
        $personnels = Personnel::all();
        $colis = CaisseSortieColis::where('id', $id)->with('agentRegulations')->get();
        $items = DB::table('caisse_sortie_colis_items')->where('sortieColis', $id)->get();
        $coli = $colis[0];
        return view('/caisse/sortie-colis.edit', compact('coli', 'centres', 'centres_regionaux', 'personnels', 'items'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return Response
     */
    public function update(Request $request, $id)
    {
        $coli = CaisseSortieColis::find($id);
        $coli->date = $request->get("date");
        $coli->heure = $request->get("heure");
        $coli->agentRegulation = $request->get("agentRegulation");
        $coli->observation = $request->get("observation");
        $coli->save();

        $idItem = $request->get('idItem');
        $totalColis = $request->get('totalColis');
        $typeColisSecuripack = $request->get('typeColisSecuripack');
        $typeColisSacjute = $request->get('typeColisSacjute');
        $nombreColisSecuripack = $request->get('nombreColisSecuripack');
        $nombreColisSacjute = $request->get('nombreColisSacjute');
        $numeroScelleSecuripack = $request->get('numeroScelleSecuripack');
        $numeroScelleSacjute = $request->get('numeroScelleSacjute');
        $montantAnnonceSecuripack = $request->get('montantAnnonceSecuripack');
        $montantAnnonceSacjute = $request->get('montantAnnonceSacjute');
        $bordereau = $request->get("bordereau");
        $expediteur = $request->get("expediteur");

        for ($i = 0; $i < count($idItem); $i++) {
            if (!empty($idItem[$i])) {
                $item = CaisseSortieColisItem::find($idItem[$i]);
                $item->totalColis = $totalColis[$i];
                $item->typeColisSecuripack = $typeColisSecuripack[$i];
                $item->typeColisSacjute = $typeColisSacjute[$i];
                $item->nombreColisSecuripack = $nombreColisSecuripack[$i];
                $item->nombreColisSacjute = $nombreColisSacjute[$i];
                $item->numeroScelleSecuripack = $numeroScelleSecuripack[$i];
                $item->numeroScelleSacjute = $numeroScelleSacjute[$i];
                $item->montantAnnonceSecuripack = $montantAnnonceSecuripack[$i];
                $item->montantAnnonceSacjute = $montantAnnonceSacjute[$i];
                $item->bordereau = $bordereau[$i];
                $item->expediteur = $expediteur[$i];
                $item->save();
            }
        }

        return redirect('/caisse-sortie-colis-liste')->with('success', 'Service modifié avec succès!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id)
    {
        $coli = CaisseSortieColis::find($id);
        $coli->delete();
        $items = DB::table('caisse_sortie_colis_items')->where('sortieColis', $id)->get();
        foreach ($items as $item) {
            $i = CaisseSortieColisItem::find($item->id);
            $i->delete();
        }
        return redirect('/caisse-sortie-colis-liste')->with('success', 'Service supprimé avec succès!');
    }
}
