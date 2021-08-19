<?php

namespace App\Http\Controllers;

use App\Models\AchatFournisseurCA;
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
            'condition' => $request->get('condition'),
            'mode_paiement' => $request->get('mode_paiement'),
        ]);
        $fournisseur->save();
        $annees = $request->get('annee');
        $cas = $request->get('ca');
        for ($i = 0; $i < count($annees); $i++) {
            if (!empty($annees[$i])) {
                $achatCA = new AchatFournisseurCA([
                   'fournisseur_fk' => $fournisseur->id,
                   'annee' => $annees[$i],
                   'ca' => $cas[$i],
                ]);
                $achatCA->save();
            }
        }
        return redirect('achat-fournisseur-liste')->with('success', 'Enregistrement effectué!');
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
        $cas = AchatFournisseurCA::where('fournisseur_fk', '=', $id)->get();
        return view('achat.fournisseur.edit', compact('fournisseur', 'cas'));
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
        $fournisseur->denomination = $request->get('denomination');
        $fournisseur->sigle = $request->get('sigle');
        $fournisseur->secteur_activite = $request->get('secteur_activite');
        $fournisseur->rccm = $request->get('rccm');
        $fournisseur->cnps = $request->get('cnps');
        $fournisseur->cpt = $request->get('cpt');
        $fournisseur->adresse_postale = $request->get('adresse_postale');
        $fournisseur->adresse_geo = $request->get('adresse_geo');
        $fournisseur->telephone_entreprise = $request->get('telephone_entreprise');
        $fournisseur->email_entreprise = $request->get('email_entreprise');
        $fournisseur->fax = $request->get('fax');
        $fournisseur->siteweb = $request->get('siteweb');
        $fournisseur->fonction = $request->get('fonction');
        $fournisseur->nom = $request->get('nom');
        $fournisseur->prenoms = $request->get('prenoms');
        $fournisseur->telephone = $request->get('telephone');
        $fournisseur->email = $request->get('email');
        $fournisseur->part_marche = $request->get('part_marche');
        $fournisseur->taux_croissance = $request->get('taux_croissance');
        $fournisseur->chaine_valeur = $request->get('chaine_valeur');
        $fournisseur->certification = $request->get('certification');
        $fournisseur->sous_traitant = $request->get('sous_traitant');
        $fournisseur->condition = $request->get('condition');
        $fournisseur->mode_paiement = $request->get('mode_paiement');

        $fournisseur->save();
        $annees = $request->get('annee');
        $cas = $request->get('ca');
        $ids = $request->get('ids');
        for ($i = 0; $i < count($annees); $i++) {
            if (!empty($annees[$i])) {
                $achatCA = AchatFournisseurCA::find($ids[$i]);
                $achatCA->fournisseur_fk = $id;
                $achatCA->annee = $annees[$i];
                $achatCA->ca = $cas[$i];
                $achatCA->save();
            }
        }

        return redirect('achat-fournisseur-liste')->with('success', 'Enregistrement modifié!');
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
