<?php

namespace App\Http\Controllers;

use App\Models\LogistiqueEntreeBordereaux;
use App\Models\LogistiqueFournisseur;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;

class LogistiqueEntreeBordereauController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $fournisseurs = LogistiqueFournisseur::where('localisation_id', Auth::user()->localisation_id)->get();
        return view('/logistique/fourniture/entree-bordereau.index', compact('fournisseurs'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function liste()
    {
        $entrees = LogistiqueEntreeBordereaux::where('localisation_id', Auth::user()->localisation_id)->get();
        return view('/logistique/fourniture/entree-bordereau.liste', compact('entrees'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @return Response
     */
    public function store(Request $request)
    {
        $data = new LogistiqueEntreeBordereaux([
            'debutSerie' => $request->get('debutSerie'),
            'finSerie' => $request->get('finSerie'),
            'date' => $request->get('date'),
            'fournisseur' => $request->get('fournisseur'),
            'prixUnitaire' => $request->get('prixUnitaire'),
            'reference' => $request->get('reference'),
        ]);
        $data->save();
        return redirect('/logistique-entree-bordereau')->with('success', 'Entrée bordereau enregistré!');
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
        $fournisseurs = LogistiqueFournisseur::where('localisation_id', Auth::user()->localisation_id)->get();
        $entree = LogistiqueEntreeBordereaux::where('localisation_id', Auth::user()->localisation_id)->find($id);
        return view('/logistique/fourniture/entree-bordereau.edit',
            compact('fournisseurs', 'entree'));
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
        $data = LogistiqueEntreeBordereaux::where('localisation_id', Auth::user()->localisation_id)->find($id);
        $data->debutSerie = $request->get('debutSerie');
        $data->finSerie = $request->get('finSerie');
        $data->date = $request->get('date');
        $data->fournisseur = $request->get('fournisseur');
        $data->prixUnitaire = $request->get('prixUnitaire');
        $data->reference = $request->get('reference');

        $data->save();
        return redirect('/logistique-entree-bordereau-liste')->with('success', 'Entrée bordereau enregistrée!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id)
    {
        $data = LogistiqueEntreeBordereaux::where('localisation_id', Auth::user()->localisation_id)->find($id);
        $data->delete();
        return redirect('/logistique-entree-bordereau-liste')->with('success', 'Entrée bordereau supprimée!');

    }
}
