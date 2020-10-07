<?php

namespace App\Http\Controllers;

use App\Models\Centre;
use App\Models\Centre_regional;
use App\Models\InformatiqueMateriel;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class InformatiqueMaterielController extends Controller
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
        return view('informatique.achat-materiel.index', compact('centres', 'centres_regionaux'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function liste()
    {
        $achats = InformatiqueMateriel::all();
        return view('informatique.achat-materiel.liste', compact('achats'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @return Response
     */
    public function store(Request $request)
    {
        $factureJointe = null;
        if($request->file()) {
            $fileName = time().'_'.$request->factureJointe->getClientOriginalName();
            $request->file('factureJointe')->storeAs('uploads', $fileName, 'public');
            $factureJointe = $fileName;
        }

        $informatique = new InformatiqueMateriel([
            'centre' => $request->get('centre'),
            'centreRegional' => $request->get('centreRegional'),
            'service' => $request->get('service'),
            'date' => $request->get('date'),
            'reference' => $request->get('reference'),
            'libelle' => $request->get('libelle'),
            'quantite' => $request->get('quantite'),
            'prixUnitaire' => $request->get('prixUnitaire'),
            'montant' => $request->get('montant'),
            'factureJointe' => $factureJointe,
        ]);
        $informatique->save();
        return redirect('/informatique-achat-materiel')->with('success', 'Enregistrement effectué!');
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
        $achat = InformatiqueMateriel::find($id);
        return view('informatique.achat-materiel.edit', compact('centres', 'centres_regionaux', 'achat'));
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
        $factureJointe = null;
        if($request->file()) {
            $fileName = time().'_'.$request->factureJointe->getClientOriginalName();
            $request->file('factureJointe')->storeAs('uploads', $fileName, 'public');
            $factureJointe = $fileName;
        }

        $achat = InformatiqueMateriel::find($id);
        $achat->centre = $request->get('centre');
        $achat->centreRegional = $request->get('centreRegional');
        $achat->service = $request->get('service');
        $achat->date = $request->get('date');
        $achat->reference = $request->get('reference');
        $achat->libelle = $request->get('libelle');
        $achat->quantite = $request->get('quantite');
        $achat->prixUnitaire = $request->get('prixUnitaire');
        $achat->montant = $request->get('montant');
        $achat->factureJointe = $factureJointe;
        $achat->save();
        return redirect('/informatique-achat-materiel-liste')->with('success', 'Enregistrement effectué!');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id)
    {
        $achat = InformatiqueMateriel::find($id);
        $achat->delete();
        return redirect('/informatique-achat-materiel-liste')->with('success', 'Enregistrement supprimé!');
    }
}
