<?php

namespace App\Http\Controllers;

use App\Models\SsbCommercial;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class SsbCommercialController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        return view('ssb.commercial.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function liste()
    {
        $ssb = SsbCommercial::all();
        return view('ssb.commercial.liste', compact('ssb'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @return Response
     */
    public function store(Request $request)
    {
        $ssb = new SsbCommercial([
            'nomClient' => $request->get('nomClient'),
            'situationGeographique' => $request->get('situationGeographique'),
            'telephoneClient' => $request->get('telephoneClient'),
            'regimeImpot' => $request->get('regimeImpot'),
            'boitePostale' => $request->get('boitePostale'),
            'ville' => $request->get('ville'),
            'rc' => $request->get('rc'),
            'ncc' => $request->get('ncc'),
            'nomContact' => $request->get('nomContact'),
            'emailContact' => $request->get('emailContact'),
            'portefeuilleClient' => $request->get('portefeuilleClient'),
            'fonction' => $request->get('fonction'),
            'telephoneContact' => $request->get('telephoneContact'),
            'secteurActivite' => $request->get('secteurActivite'),
            'numeroContrat' => $request->get('numeroContrat'),
            'dateEffet' => $request->get('dateEffet'),
            'dureeContrat' => $request->get('dureeContrat'),
            'objetArretePhysique' => $request->get('objetArretePhysique'),
            'objetArreteComptable' => $request->get('objetArreteComptable'),
            'objetApprovisionnement' => $request->get('objetApprovisionnement'),
            'objetNiveau1' => $request->get('objetNiveau1'),
            'objetNiveau2' => $request->get('objetNiveau2'),
            'objetNiveau3' => $request->get('objetNiveau3'),
            'objetAccompagnement' => $request->get('objetAccompagnement'),
            'baseArretePhysique' => $request->get('baseArretePhysique'),
            'baseArreteComptable' => $request->get('baseArreteComptable'),
            'baseApprovisionnement' => $request->get('baseApprovisionnement'),
            'baseNiveau1' => $request->get('baseNiveau1'),
            'baseNiveau2' => $request->get('baseNiveau2'),
            'baseNiveau3' => $request->get('baseNiveau3'),
            'baseAccompagnement' => $request->get('baseAccompagnement'),
            'coutUnitaire' => $request->get('coutUnitaire'),
            'coutForfaitaire' => $request->get('coutForfaitaire'),
            'montant' => $request->get('montant'),
        ]);
        $ssb->save();
        return redirect('/ssb-commercial')->with('success', 'Enregistrement effectué!');
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
        $commercial = SsbCommercial::find($id);
        return view('ssb.commercial.edit', compact('commercial'));
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
        $ssb = SsbCommercial::find($id);
        $ssb->nomClient = $request->get('nomClient');
        $ssb->situationGeographique = $request->get('situationGeographique');
        $ssb->telephoneClient = $request->get('telephoneClient');
        $ssb->regimeImpot = $request->get('regimeImpot');
        $ssb->boitePostale = $request->get('boitePostale');
        $ssb->ville = $request->get('ville');
        $ssb->rc = $request->get('rc');
        $ssb->ncc = $request->get('ncc');
        $ssb->nomContact = $request->get('nomContact');
        $ssb->emailContact = $request->get('emailContact');
        $ssb->portefeuilleClient = $request->get('portefeuilleClient');
        $ssb->fonction = $request->get('fonction');
        $ssb->telephoneContact = $request->get('telephoneContact');
        $ssb->secteurActivite = $request->get('secteurActivite');
        $ssb->numeroContrat = $request->get('numeroContrat');
        $ssb->dateEffet = $request->get('dateEffet');
        $ssb->dureeContrat = $request->get('dureeContrat');
        $ssb->objetArretePhysique = $request->get('objetArretePhysique');
        $ssb->objetArreteComptable = $request->get('objetArreteComptable');
        $ssb->objetApprovisionnement = $request->get('objetApprovisionnement');
        $ssb->objetNiveau1 = $request->get('objetNiveau1');
        $ssb->objetNiveau2 = $request->get('objetNiveau2');
        $ssb->objetNiveau3 = $request->get('objetNiveau3');
        $ssb->objetAccompagnement = $request->get('objetAccompagnement');
        $ssb->baseArretePhysique = $request->get('baseArretePhysique');
        $ssb->baseArreteComptable = $request->get('baseArreteComptable');
        $ssb->baseApprovisionnement = $request->get('baseApprovisionnement');
        $ssb->baseNiveau1 = $request->get('baseNiveau1');
        $ssb->baseNiveau2 = $request->get('baseNiveau2');
        $ssb->baseNiveau3 = $request->get('baseNiveau3');
        $ssb->baseAccompagnement = $request->get('baseAccompagnement');
        $ssb->coutUnitaire = $request->get('coutUnitaire');
        $ssb->coutForfaitaire = $request->get('coutForfaitaire');
        $ssb->montant = $request->get('montant');
        $ssb->save();
        return redirect('/ssb-commercial-liste')->with('success', 'Enregistrement modifié!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return Response
     */
    public function destroy($id)
    {
        $ssb = SsbCommercial::find($id);
        $ssb->delete();
        return redirect('/ssb-commercial-liste')->with('success', 'Enregistrement supprimé!');
    }
}
