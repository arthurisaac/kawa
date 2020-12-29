<?php

namespace App\Http\Controllers;

use App\Models\AchatFournisseur;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class AchatFournisseurController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        return view('achat/fournisseur.index');
    }

    public function liste()
    {
        $fournisseurs = AchatFournisseur::all();
        return view('achat/fournisseur.liste', compact('fournisseurs'));
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
        $fournisseur = new AchatFournisseur([
            'denomination' => $request->get('denomination'),
            'sigle' => $request->get('sigle'),
            'secteur_activite' => $request->get('secteur_activite'),
            'rccm' => $request->get('rccm'),
            'cnps' => $request->get('cnps'),
            'cpt' => $request->get('cpt'),
            'adresse_postale' => $request->get('adresse_postale'),
            'adresse_geo' => $request->get('adresse_geo'),
            'telephone_entreprise' => $request->get('telephone_entreprise'),
            'email_entreprise' => $request->get('email_entreprise'),
            'fax' => $request->get('fax'),
            'siteweb' => $request->get('siteweb'),
            'fonction' => $request->get('fonction'),
            'nom' => $request->get('nom'),
            'prenoms' => $request->get('prenoms'),
            'telephone' => $request->get('telephone'),
            'email' => $request->get('email'),
            'part_marche' => $request->get('part_marche'),
            'taux_croissance' => $request->get('taux_croissance'),
            'chaine_valeur' => $request->get('chaine_valeur'),
            'certification' => $request->get('certification'),
            'sous_traitant' => $request->get('sous_traitant'),
            'credit_30_jours' => $request->get('credit_30_jours'),
            'credit_60_jours' => $request->get('credit_60_jours'),
        ]);
        $fournisseur->save();
        return redirect('achat-fournisseur')->with('success', 'Enregistrement effectué!');
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
        $fournisseur = AchatFournisseur::find($id);
        return view('achat.fournisseur.edit', compact('fournisseur'));
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
        $fournisseur = AchatFournisseur::find($id);
        $fournisseur->societe = $request->get('societe');
        $fournisseur->civilite = $request->get('civilite');
        $fournisseur->nom = $request->get('nom');
        $fournisseur->prenom = $request->get('prenom');
        $fournisseur->adresse = $request->get('adresse');
        $fournisseur->pays = $request->get('pays');
        $fournisseur->telephone = $request->get('telephone');
        $fournisseur->mobile = $request->get('mobile');
        $fournisseur->fax = $request->get('fax');
        $fournisseur->email = $request->get('email');
        $fournisseur->observation = $request->get('observation');
        $fournisseur->domaine = $request->get('domaine');
        $fournisseur->delaiLivraison = $request->get('delaiLivraison');
        $fournisseur->conditionPaiement = $request->get('conditionPaiement');
        $fournisseur->numeroAgrement = $request->get('numeroAgrement');
        $fournisseur->save();
        return redirect('achat-fournisseur-liste')->with('success', 'Enregistrement effectué!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return Response
     */
    public function destroy($id)
    {
        $fournisseur = AchatFournisseur::find($id);
        $fournisseur->delete();
        return redirect('achat-fournisseur-liste')->with('success', 'Enregistrement effectué!');
    }
}
