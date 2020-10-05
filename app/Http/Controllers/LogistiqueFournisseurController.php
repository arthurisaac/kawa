<?php

namespace App\Http\Controllers;

use App\Models\Centre;
use App\Models\Centre_regional;
use App\Models\LogistiqueFournisseur;
use App\Models\LogistiqueProduit;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\DB;

class LogistiqueFournisseurController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        return view('/logistique/achat/fournisseur.index');
    }

    public function liste()
    {
        $fournisseurs = LogistiqueFournisseur::all();
        return view('/logistique/achat/fournisseur.liste',
            compact('fournisseurs'));
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
        $fournisseur = new LogistiqueFournisseur([
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
        ]);
        $fournisseur->save();
        return redirect('/logistique-fournisseur')->with('success', 'Fournisseur enregistré!');
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
        $fournisseur = LogistiqueFournisseur::find($id);
        return view('/logistique/achat/fournisseur.edit', compact('fournisseur'));
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
        $fournisseur = LogistiqueFournisseur::find($id);
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
        $fournisseur->save();
        return redirect('/logistique-fournisseur-liste')->with('success', 'Fournisseur modifié avec succès!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id)
    {
        $fournisseur = LogistiqueFournisseur::find($id);
        $produits = DB::table('logistique_produits')->where('fournisseur', '=', $id)->get();
        foreach ($produits as $produit) {
            $p = LogistiqueProduit::find($produit->id);
            $p->delete();
        }
        $fournisseur->delete();
        return redirect('/logistique-fournisseur-liste')->with('success', 'Fournisseur supprimé avec succès!');
        }
}
