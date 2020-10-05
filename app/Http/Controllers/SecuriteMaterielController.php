<?php

namespace App\Http\Controllers;

use App\Models\SecuriteMateriel;
use App\Models\SecuriteMaterielBeneficiaire;
use App\Models\SecuriteMaterielRemettant;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class SecuriteMaterielController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        return view('securite/materiel.index');
    }

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function liste()
    {
        $materiels = SecuriteMateriel::all();
        $remettants = SecuriteMaterielRemettant::with('materiels')->get();
        $beneficiaires = SecuriteMaterielBeneficiaire::with('materiels')->get();
        return view('securite/materiel.liste', compact('materiels', 'remettants', 'beneficiaires'));
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
        $saisie = new SecuriteMateriel([
            'date' => $request->get('date'),
            'cbNom' => $request->get('cbNom'),
            'cbPrenom' => $request->get('cbPrenom'),
            'cbFonction' => $request->get('cbFonction'),
            'cbMatricule' => $request->get('cbMatricule'),
            'ccNom' => $request->get('ccNom'),
            'ccPrenom' => $request->get('ccPrenom'),
            'ccFonction' => $request->get('ccFonction'),
            'ccMatricule' => $request->get('ccMatricule'),
            'cgNom' => $request->get('cgNom'),
            'cgPrenom' => $request->get('cgPrenom'),
            'cgFonction' => $request->get('cgFonction'),
            'cgMatricule' => $request->get('cgMatricule'),
            'vehiculeVB' => $request->get('vehiculeVB'),
            'vehiculeVL' => $request->get('vehiculeVL'),
            'noTournee' => $request->get('noTournee'),
            'operateurRadio' => $request->get('operateurRadio'),
            'operateurRadioNom' => $request->get('operateurRadioNom'),
            'operateurRadioPrenom' => $request->get('operateurRadioPrenom'),
            'operateurRadioFonction' => $request->get('operateurRadioFonction'),
            'operateurRadioMatricule' => $request->get('operateurRadioMatricule'),
            'operateurRadioHeurePrise' => $request->get('operateurRadioHeurePrise'),
            'operateurRadioHeureFin' => $request->get('operateurRadioHeureFin'),
        ]);
        $saisie->save();

        $remettant = new SecuriteMaterielRemettant([
            'idMateriel' => $saisie->id,
            'remettantPieceVehicule' => $request->get('remettantPieceVehicule'),
            'remettantPieceVehiculeQuantite' => $request->get('remettantPieceVehiculeQuantite'),
            'remettantPieceVehiculeHeureRetour' => $request->get('remettantPieceVehiculeHeureRetour'),
            'remettantPieceVehiculeConvoyeur' => $request->get('remettantPieceVehiculeConvoyeur'),
            'remettantCleVehicule' => $request->get('remettantCleVehicule'),
            'remettantCleVehiculeQuantite' => $request->get('remettantCleVehiculeQuantite'),
            'remettantCleVehiculeHeureRetour' => $request->get('remettantCleVehiculeHeureRetour'),
            'remettantCleVehiculeConvoyeur' => $request->get('remettantCleVehiculeConvoyeur'),
            'remettantTelephone' => $request->get('remettantTelephone'),
            'remettantTelephoneQuantite' => $request->get('remettantTelephoneQuantite'),
            'remettantTelephoneHeureRetour' => $request->get('remettantTelephoneHeureRetour'),
            'remettantTelephoneConvoyeur' => $request->get('remettantTelephoneConvoyeur'),
            'remettantRadio' => $request->get('remettantRadio'),
            'remettantRadioQuantite' => $request->get('remettantRadioQuantite'),
            'remettantRadioHeureRetour' => $request->get('remettantRadioHeureRetour'),
            'remettantRadioConvoyeur' => $request->get('remettantRadioConvoyeur'),
            'remettantGBP' => $request->get('remettantGBP'),
            'remettantGBPQuantite' => $request->get('remettantGBPQuantite'),
            'remettantGBPHeureRetour' => $request->get('remettantGBPHeureRetour'),
            'remettantGBPConvoyeur' => $request->get('remettantGBPConvoyeur'),
            'remettantPA' => $request->get('remettantPA'),
            'remettantPAQuantite' => $request->get('remettantPAQuantite'),
            'remettantPAHeureRetour' => $request->get('remettantPAHeureRetour'),
            'remettantPAConvoyeur' => $request->get('remettantPAConvoyeur'),
            'remettantFP' => $request->get('remettantFP'),
            'remettantFPQuantite' => $request->get('remettantFPQuantite'),
            'remettantFPHeureRetour' => $request->get('remettantFPHeureRetour'),
            'remettantFPConvoyeur' => $request->get('remettantFPConvoyeur'),
            'remettantPM' => $request->get('remettantPM'),
            'remettantPMQuantite' => $request->get('remettantPMQuantite'),
            'remettantPMHeureRetour' => $request->get('remettantPMHeureRetour'),
            'remettantPMConvoyeur' => $request->get('remettantPMConvoyeur'),
            'remettantMunition' => $request->get('remettantMunition'),
            'remettantMunitionQuantite' => $request->get('remettantMunitionQuantite'),
            'remettantMunitionHeureRetour' => $request->get('remettantMunitionHeureRetour'),
            'remettantMunitionConvoyeur' => $request->get('remettantMunitionConvoyeur'),
            'remettantTAG' => $request->get('remettantTAG'),
            'remettantTAGQuanite' => $request->get('remettantTAGQuanite'),
            'remettantTAGHeureRetour' => $request->get('remettantTAGHeureRetour'),
            'remettantTAGConvoyeur' => $request->get('remettantTAGConvoyeur'),
        ]);

        $beneficiare = new SecuriteMaterielBeneficiaire([
            'idMateriel' => $saisie->id,
            'beneficiairePieceVehicule' => $request->get('beneficiairePieceVehicule'),
            'beneficiairePieceVehiculeQuantite' => $request->get('beneficiairePieceVehiculeQuantite'),
            'beneficiairePieceVehiculeHeureRetour' => $request->get('beneficiairePieceVehiculeHeureRetour'),
            'beneficiairePieceVehiculeConvoyeur' => $request->get('beneficiairePieceVehiculeConvoyeur'),
            'beneficiaireCleVehicule' => $request->get('beneficiaireCleVehicule'),
            'beneficiaireCleVehiculeQuantite' => $request->get('beneficiaireCleVehiculeQuantite'),
            'beneficiaireCleVehiculeHeureRetour' => $request->get('beneficiaireCleVehiculeHeureRetour'),
            'beneficiaireCleVehiculeConvoyeur' => $request->get('beneficiaireCleVehiculeConvoyeur'),
            'beneficiaireTelephone' => $request->get('beneficiaireTelephone'),
            'beneficiaireTelephoneHeureRetour' => $request->get('beneficiaireTelephoneHeureRetour'),
            'beneficiaireTelephoneConvoyeur' => $request->get('beneficiaireTelephoneConvoyeur'),
            'beneficiaireRadio' => $request->get('beneficiaireRadio'),
            'beneficiaireRadioQuantite' => $request->get('beneficiaireRadioQuantite'),
            'beneficiaireRadioHeureRetour' => $request->get('beneficiaireRadioHeureRetour'),
            'beneficiaireRadioConvoyeur' => $request->get('beneficiaireRadioConvoyeur'),
            'beneficiaireGBP' => $request->get('beneficiaireGBP'),
            'beneficiaireGBPQuantite' => $request->get('beneficiaireGBPQuantite'),
            'beneficiaireGBPHeureRetour' => $request->get('beneficiaireGBPHeureRetour'),
            'beneficiaireGBPConvoyeur' => $request->get('beneficiaireGBPConvoyeur'),
            'beneficiairePA' => $request->get('beneficiairePA'),
            'beneficiairePAQuantite' => $request->get('beneficiairePAQuantite'),
            'beneficiairePAHeureRetour' => $request->get('beneficiairePAHeureRetour'),
            'beneficiairePAConvoyeur' => $request->get('beneficiairePAConvoyeur'),
            'beneficiaireFP' => $request->get('beneficiaireFP'),
            'beneficiaireFPQuantite' => $request->get('beneficiaireFPQuantite'),
            'beneficiaireFPHeureRetour' => $request->get('beneficiaireFPHeureRetour'),
            'beneficiaireFPConvoyeur' => $request->get('beneficiaireFPConvoyeur'),
            'beneficiairePM' => $request->get('beneficiairePM'),
            'beneficiairePMQuantite' => $request->get('beneficiairePMQuantite'),
            'beneficiairePMHeureRetour' => $request->get('beneficiairePMHeureRetour'),
            'beneficiairePMConvoyeur' => $request->get('beneficiairePMConvoyeur'),
            'beneficiaireMunition' => $request->get('beneficiaireMunition'),
            'beneficiaireMunitionQuantite' => $request->get('beneficiaireMunitionQuantite'),
            'beneficiaireMunitionHeureRetour' => $request->get('beneficiaireMunitionHeureRetour'),
            'beneficiaireMunitionConvoyeur' => $request->get('beneficiaireMunitionConvoyeur'),
            'beneficiaireTAG' => $request->get('beneficiaireTAG'),
            'beneficiaireTAGQuanite' => $request->get('beneficiaireTAGQuanite'),
            'beneficiaireTAGHeureRetour' => $request->get('beneficiaireTAGHeureRetour'),
            'beneficiaireTAGConvoyeur' => $request->get('beneficiaireTAGConvoyeur'),
        ]);

        $remettant->save();
        $beneficiare->save();
        return redirect('/materiel')->with('success', 'Saisie enregistrée!');
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
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id)
    {
        //
    }
}
