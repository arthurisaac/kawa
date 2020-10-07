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
            'societe' => $request->get('societe'),
            'civilite' => $request->get('civilite'),
            'nom' => $request->get('nom'),
            'prenom' => $request->get('prenom'),
            'adresse' => $request->get('adresse'),
            'pays' => $request->get('pays'),
            'telephone' => $request->get('telephone'),
            'mobile' => $request->get('mobile'),
            'fax' => $request->get('fax'),
            'email' => $request->get('email'),
            'observation' => $request->get('observation'),
            'domaine' => $request->get('domaine'),
            'delaiLivraison' => $request->get('delaiLivraison'),
            'conditionPaiement' => $request->get('conditionPaiement'),
            'numeroAgrement' => $request->get('numeroAgrement'),
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
