<?php

namespace App\Http\Controllers;

use App\Models\Centre;
use App\Models\Centre_regional;
use App\Models\ComptabiliteEntreeCaisse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;

class ComptabiliteEntreeCaisseController extends Controller
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
        return view('/comptabilite/entree-caisse.index', compact('centres_regionaux', 'centres'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function liste(Request $request)
    {
        $mouvement = $request->get('mouvement');
        $service = $request->get('service');
        $deposant = $request->get('deposant');
        $debut = $request->get("debut");
        $fin = $request->get("fin");

        $entreeCaisses = ComptabiliteEntreeCaisse::where('localisation_id', Auth::user()->localisation_id)->get();

        if (!isset($debut) && !isset($fin) && isset($mouvement) && $mouvement != "ras") {
            $entreeCaisses = ComptabiliteEntreeCaisse::where('mouvement', $mouvement)->where('localisation_id', Auth::user()->localisation_id)->get();
        }
        if (!isset($debut) && !isset($fin) && !isset($mouvement) && isset($service)) {
            $entreeCaisses = ComptabiliteEntreeCaisse::where('service', 'like', '%' . $service . '%')->where('localisation_id', Auth::user()->localisation_id)->get();
        }
        if (!isset($debut) && !isset($fin) && !isset($mouvement) && isset($deposant)) {
            $entreeCaisses = ComptabiliteEntreeCaisse::where('deposant', 'like', '%' . $deposant . '%')->where('localisation_id', Auth::user()->localisation_id)->get();
        }
        if (isset($debut) && isset($fin) && !isset($mouvement)) {
            $entreeCaisses = ComptabiliteEntreeCaisse::whereBetween('date', [$debut, $fin])->where('localisation_id', Auth::user()->localisation_id)->get();
        }
        if (isset($debut) && isset($fin) && isset($mouvement)) {
            $entreeCaisses = ComptabiliteEntreeCaisse::whereBetween('date', [$debut, $fin])
                ->where('mouvement', $mouvement)
                ->where('localisation_id', Auth::user()->localisation_id)->get();
        }
        if (isset($debut) && isset($fin) && isset($mouvement) && isset($service)) {
            $entreeCaisses = ComptabiliteEntreeCaisse::whereBetween('date', [$debut, $fin])
                ->where('mouvement', $mouvement)
                ->where('service', $service)
                ->where('localisation_id', Auth::user()->localisation_id)->get();
        }
        if (isset($debut) && isset($fin) && isset($mouvement) && isset($service) && isset($deposant)) {
            $entreeCaisses = ComptabiliteEntreeCaisse::whereBetween('date', [$debut, $fin])
                ->where('mouvement', $mouvement)
                ->where('service', $service)
                ->where('deposant', $deposant)
                ->where('localisation_id', Auth::user()->localisation_id)->get();
        }
        return view('/comptabilite/entree-caisse.liste', compact('entreeCaisses'));
    }


    public function listeJustifs(Request $request)
    {
        $mouvement = 'Sortie';
        $service = $request->get('service');
        $deposant = $request->get('deposant');
        $debut = $request->get("debut");
        $fin = $request->get("fin");

        $entreeCaisses = ComptabiliteEntreeCaisse::where('mouvement', $mouvement)->where('localisation_id', Auth::user()->localisation_id)->get();

        if (!isset($debut) && !isset($fin) && isset($service)) {
            $entreeCaisses = ComptabiliteEntreeCaisse::where('service', 'like', '%' . $service . '%')
                ->where('mouvement', $mouvement)
                ->where('localisation_id', Auth::user()->localisation_id)->get();
        }
        if (!isset($debut) && !isset($fin) && isset($deposant)) {
            $entreeCaisses = ComptabiliteEntreeCaisse::where('deposant', 'like', '%' . $deposant . '%')
                ->where('mouvement', $mouvement)
                ->where('localisation_id', Auth::user()->localisation_id)->get();
        }
        if (isset($debut) && isset($fin)) {
            $entreeCaisses = ComptabiliteEntreeCaisse::whereBetween('date', [$debut, $fin])
                ->where('mouvement', $mouvement)
                ->where('localisation_id', Auth::user()->localisation_id)->get();
        }
        if (isset($debut) && isset($fin) && isset($service)) {
            $entreeCaisses = ComptabiliteEntreeCaisse::whereBetween('date', [$debut, $fin])
                ->where('mouvement', $mouvement)
                ->where('service', $service)
                ->where('localisation_id', Auth::user()->localisation_id)->get();
        }
        if (isset($debut) && isset($fin) && isset($service) && isset($deposant)) {
            $entreeCaisses = ComptabiliteEntreeCaisse::whereBetween('date', [$debut, $fin])
                ->where('mouvement', $mouvement)
                ->where('service', $service)
                ->where('deposant', $deposant)
                ->where('localisation_id', Auth::user()->localisation_id)->get();
        }
        return view('comptabilite.entree-caisse.liste-justifs', compact('entreeCaisses'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @return Response
     */
    public function store(Request $request)
    {
        $caisse = new ComptabiliteEntreeCaisse([
            'mouvement' => $request->get('mouvement'),
            'date' => $request->get('date'),
            'somme' => $request->get('somme'),
            'motif' => $request->get('motif'),
            'deposant' => $request->get('deposant'),
            'service' => $request->get('service'),
            'centre' => $request->get('centre'),
            'centre_regional' => $request->get('centre_regional'),
            'justification' => $request->get('justification'),
            'montant_justifie' => $request->get('montant_justifie'),
            'montant_non_justifie' => $request->get('montant_non_justifie'),
        ]);
        $caisse->save();
        return redirect('/comptabilite-entree-caisse-liste')->with('success', 'Entrée caisse enregistrée!');
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
        $entreeCaisse = ComptabiliteEntreeCaisse::where('localisation_id', Auth::user()->localisation_id)->find($id);
        $centres = Centre::where('localisation_id', Auth::user()->localisation_id)->get();
        $centres_regionaux = Centre_regional::where('localisation_id', Auth::user()->localisation_id)->get();
        return view('/comptabilite/entree-caisse.edit', compact('entreeCaisse', 'centres', 'centres_regionaux'));

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
        $caisse = ComptabiliteEntreeCaisse::where('localisation_id', Auth::user()->localisation_id)->find($id);
        $caisse->date = $request->get('date');
        $caisse->somme = $request->get('somme');
        $caisse->motif = $request->get('motif');
        $caisse->deposant = $request->get('deposant');
        $caisse->service = $request->get('service');
        $caisse->mouvement = $request->get('mouvement');
        $caisse->centre = $request->get('centre');
        $caisse->centre_regional = $request->get('centre_regional');
        $caisse->justification = $request->get('justification');
        $caisse->montant_justifie = $request->get('montant_justifie');
        $caisse->montant_non_justifie = $request->get('montant_non_justifie');
        $caisse->save();
        return redirect('/comptabilite-entree-caisse-liste')->with('success', 'Entrée caisse enregistrée!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id)
    {
        $caisse = ComptabiliteEntreeCaisse::where('localisation_id', Auth::user()->localisation_id)->find($id);
        $caisse->delete();
        return redirect('/comptabilite-entree-caisse-liste')->with('success', 'Entrée caisse supprimée!');
    }
}
