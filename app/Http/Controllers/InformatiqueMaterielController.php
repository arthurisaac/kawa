<?php

namespace App\Http\Controllers;

use App\Models\Centre;
use App\Models\Centre_regional;
use App\Models\InformatiqueFournisseur;
use App\Models\InformatiqueMateriel;
use App\Models\OptionInformatiqueCategorie;
use App\Models\OptionInformatiqueLibelle;
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
        $categories = OptionInformatiqueCategorie::all();
        $libelles = OptionInformatiqueLibelle::all();
        $fournisseurs = InformatiqueFournisseur::all();
        return view('informatique.achat-materiel.index', compact('centres', 'centres_regionaux', 'categories', "libelles", 'fournisseurs'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function liste(Request $request)
    {
        $centre = $request->get("centre");
        $centre_regional = $request->get("centre_regional");
        $categorie = $request->get("categorie");
        $libelle = $request->get("libelle");

        $centres = Centre::all();
        $centres_regionaux = Centre_regional::all();
        $categories = OptionInformatiqueCategorie::all();
        $libelles = OptionInformatiqueLibelle::query()->orderBy("libelle")->get();

        $achats = InformatiqueMateriel::all();

        if (isset($centre)) {
            $achats = InformatiqueMateriel::query()
                ->where("centre", $centre)
                ->get();
        }
        if (isset($centre_regional)) {
            $achats = InformatiqueMateriel::query()
                ->where("centreRegional", $centre_regional)
                ->get();
        }
        if (isset($categorie)) {
            $achats = InformatiqueMateriel::query()
                ->where("categorie", $categorie)
                ->get();
        }
        if (isset($libelle)) {
            $achats = InformatiqueMateriel::query()
                ->where("libelle", $libelle)
                ->get();
        }

        return view('informatique.achat-materiel.liste', compact('achats', 'centre', 'centre_regional', 'centres', 'centres_regionaux', 'categories', 'libelles', 'categorie', 'libelle'));
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
            //$request->file('factureJointe')->storeAs('uploads', $fileName, 'public');
            $filePath = $request->file('photo')->storeAs('/', $fileName, 'ftp');
            $factureJointe = $filePath;
        }

        $informatique = new InformatiqueMateriel([
            'centre' => $request->get('centre'),
            'centreRegional' => $request->get('centreRegional'),
            'date_achat' => $request->get('date_achat'),
            'date_fin' => $request->get('date_fin'),
            'duree' => $request->get('duree'),
            'reference' => $request->get('reference'),
            'libelle' => $request->get('libelle'),
            'categorie' => $request->get('categorie'),
            'quantite' => $request->get('quantite'),
            'prixUnitaire' => $request->get('prixUnitaire'),
            'montant' => $request->get('montant'),
            'caracteristique' => $request->get('caracteristique'),
            'fournisseur' => $request->get('fournisseur'),
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
        //return redirect('/informatique-achat-materiel-liste')->with('success', 'Enregistrement supprimé!');
        return  \response(["message" => "supprimé avec succès"]);
    }
}
