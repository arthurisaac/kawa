<?php

namespace App\Http\Controllers;

use App\Models\Centre;
use App\Models\Centre_regional;
use App\Models\DepartTournee;
use App\Models\SecuriteMateriel;
use App\Models\SecuriteMaterielBeneficiaire;
use App\Models\SecuriteMaterielRemettant;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\DB;

class SecuriteMaterielController extends Controller
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
        $personnels = DB::table('personnels')->where('service', '=', 'transport')->get();
        $tournees = DepartTournee::with('agentDeGardes')->with('chefDeBords')->with('chauffeurs')->with('vehicules')->get();
        return view('securite/materiel.index', compact('personnels', 'tournees', 'centres_regionaux', 'centres'));
    }

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function liste()
    {
        $materiels = SecuriteMateriel::with('cbs')->with('tournees')->get();
        $remettants = SecuriteMaterielRemettant::with('materiels')->get();
        $beneficiaires = SecuriteMaterielBeneficiaire::with('materiels')->get();
        return view('securite.materiel.liste', compact('materiels', 'remettants', 'beneficiaires'));
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
            'cbMatricule' => $request->get('cbMatricule'),
            'ccMatricule' => $request->get('ccMatricule'),
            'cgMatricule' => $request->get('cgMatricule'),
            'vehiculeVB' => $request->get('vehiculeVB'),
            'vehiculeVL' => $request->get('vehiculeVL'),
            'noTournee' => $request->get('noTournee'),
            'operateurRadio' => $request->get('operateurRadio'),
            'operateurRadioMatricule' => $request->get('operateurRadioMatricule'),
            'operateurRadioHeurePrise' => $request->get('operateurRadioHeurePrise'),
            'operateurRadioHeureFin' => $request->get('operateurRadioHeureFin'),
            'centre' => $request->get('centre'),
            'centre_regional' => $request->get('centre_regional')
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
        // return redirect('/materiel')->with('success', 'Matériel enregistrée!');
        return redirect('/materiel-liste')->with('success', 'Matériel enregistré!');
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
        $materiel = SecuriteMateriel::with('cbs')->with('ccs')->with('cgs')->with('operateurRadios')->with('tournees')->find($id);
        $remettant = SecuriteMaterielRemettant::where("idMateriel", $id)->first();
        $personnels = DB::table('personnels')->where('service', '=', 'transport')->get();
        $tournees = DepartTournee::with('agentDeGardes')->with('chefDeBords')->with('chauffeurs')->with('vehicules')->get();
        return view('securite.materiel.edit', compact('personnels', 'tournees', 'materiel', 'centres', 'centres_regionaux', 'remettant'));
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
        $materiel = SecuriteMateriel::find($id);
        $materiel->date = $request->get('date');
        $materiel->cbMatricule = $request->get('cbMatricule');
        $materiel->ccMatricule = $request->get('ccMatricule');
        $materiel->cgMatricule = $request->get('cgMatricule');
        $materiel->vehiculeVB = $request->get('vehiculeVB');
        $materiel->vehiculeVL = $request->get('vehiculeVL');
        $materiel->noTournee = $request->get('noTournee');
        $materiel->operateurRadio = $request->get('operateurRadio');
        $materiel->operateurRadioMatricule = $request->get('operateurRadioMatricule');
        $materiel->operateurRadioHeurePrise = $request->get('operateurRadioHeurePrise');
        $materiel->operateurRadioHeureFin = $request->get('operateurRadioHeureFin');
        $materiel->centre_regional = $request->get('centre_regional');
        $materiel->centre = $request->get('centre');
        $materiel->save();

        $remettant = SecuriteMaterielRemettant::where("idMateriel", $id)->first();
        if ($remettant) {
            $remettant->remettantPieceVehicule = $request->get('remettantPieceVehicule');
            $remettant->remettantPieceVehiculeQuantite = $request->get('remettantPieceVehiculeQuantite');
            $remettant->remettantPieceVehiculeHeureRetour = $request->get('remettantPieceVehiculeHeureRetour');
            $remettant->remettantPieceVehiculeConvoyeur = $request->get('remettantPieceVehiculeConvoyeur');
            $remettant->remettantCleVehicule = $request->get('remettantCleVehicule');
            $remettant->remettantCleVehiculeQuantite = $request->get('remettantCleVehiculeQuantite');
            $remettant->remettantCleVehiculeHeureRetour = $request->get('remettantCleVehiculeHeureRetour');
            $remettant->remettantCleVehiculeConvoyeur = $request->get('remettantCleVehiculeConvoyeur');
            $remettant->remettantTelephone = $request->get('remettantTelephone');
            $remettant->remettantTelephoneQuantite = $request->get('remettantTelephoneQuantite');
            $remettant->remettantTelephoneHeureRetour = $request->get('remettantTelephoneHeureRetour');
            $remettant->remettantTelephoneConvoyeur = $request->get('remettantTelephoneConvoyeur');
            $remettant->remettantRadio = $request->get('remettantRadio');
            $remettant->remettantRadioQuantite = $request->get('remettantRadioQuantite');
            $remettant->remettantRadioHeureRetour = $request->get('remettantRadioHeureRetour');
            $remettant->remettantRadioConvoyeur = $request->get('remettantRadioConvoyeur');
            $remettant->remettantGBP = $request->get('remettantGBP');
            $remettant->remettantGBPQuantite = $request->get('remettantGBPQuantite');
            $remettant->remettantGBPHeureRetour = $request->get('remettantGBPHeureRetour');
            $remettant->remettantGBPConvoyeur = $request->get('remettantGBPConvoyeur');
            $remettant->remettantPA = $request->get('remettantPA');
            $remettant->remettantPAQuantite = $request->get('remettantPAQuantite');
            $remettant->remettantPAHeureRetour = $request->get('remettantPAHeureRetour');
            $remettant->remettantPAConvoyeur = $request->get('remettantPAConvoyeur');
            $remettant->remettantFP = $request->get('remettantFP');
            $remettant->remettantFPQuantite = $request->get('remettantFPQuantite');
            $remettant->remettantFPHeureRetour = $request->get('remettantFPHeureRetour');
            $remettant->remettantFPConvoyeur = $request->get('remettantFPConvoyeur');
            $remettant->remettantPM = $request->get('remettantPM');
            $remettant->remettantPMQuantite = $request->get('remettantPMQuantite');
            $remettant->remettantPMHeureRetour = $request->get('remettantPMHeureRetour');
            $remettant->remettantPMConvoyeur = $request->get('remettantPMConvoyeur');
            $remettant->remettantMunition = $request->get('remettantMunition');
            $remettant->remettantMunitionQuantite = $request->get('remettantMunitionQuantite');
            $remettant->remettantMunitionHeureRetour = $request->get('remettantMunitionHeureRetour');
            $remettant->remettantMunitionConvoyeur = $request->get('remettantMunitionConvoyeur');
            $remettant->remettantTAG = $request->get('remettantTAG');
            $remettant->remettantTAGQuanite = $request->get('remettantTAGQuanite');
            $remettant->remettantTAGHeureRetour = $request->get('remettantTAGHeureRetour');
            $remettant->remettantTAGConvoyeur = $request->get('remettantTAGConvoyeur');
            $remettant->save();
        }

        $beneficiare = SecuriteMaterielBeneficiaire::where("idMateriel", $id)->first();
        //if ($beneficiare) {
            $beneficiare->beneficiairePieceVehicule = $request->get('beneficiairePieceVehicule');
            $beneficiare->beneficiairePieceVehiculeQuantite = $request->get('beneficiairePieceVehiculeQuantite');
            $beneficiare->beneficiairePieceVehiculeHeureRetour = $request->get('beneficiairePieceVehiculeHeureRetour');
            $beneficiare->beneficiairePieceVehiculeConvoyeur = $request->get('beneficiairePieceVehiculeConvoyeur');
            $beneficiare->beneficiaireCleVehicule = $request->get('beneficiaireCleVehicule');
            $beneficiare->beneficiaireCleVehiculeQuantite = $request->get('beneficiaireCleVehiculeQuantite');
            $beneficiare->beneficiaireCleVehiculeHeureRetour = $request->get('beneficiaireCleVehiculeHeureRetour');
            $beneficiare->beneficiaireCleVehiculeConvoyeur = $request->get('beneficiaireCleVehiculeConvoyeur');
            $beneficiare->beneficiaireTelephone = $request->get('beneficiaireTelephone');
            $beneficiare->beneficiaireTelephoneHeureRetour = $request->get('beneficiaireTelephoneHeureRetour');
            $beneficiare->beneficiaireTelephoneConvoyeur = $request->get('beneficiaireTelephoneConvoyeur');
            $beneficiare->beneficiaireRadio = $request->get('beneficiaireRadio');
            $beneficiare->beneficiaireRadioQuantite = $request->get('beneficiaireRadioQuantite');
            $beneficiare->beneficiaireRadioHeureRetour = $request->get('beneficiaireRadioHeureRetour');
            $beneficiare->beneficiaireRadioConvoyeur = $request->get('beneficiaireRadioConvoyeur');
            $beneficiare->beneficiaireGBP = $request->get('beneficiaireGBP');
            $beneficiare->beneficiaireGBPQuantite = $request->get('beneficiaireGBPQuantite');
            $beneficiare->beneficiaireGBPHeureRetour = $request->get('beneficiaireGBPHeureRetour');
            $beneficiare->beneficiaireGBPConvoyeur = $request->get('beneficiaireGBPConvoyeur');
            $beneficiare->beneficiairePA = $request->get('beneficiairePA');
            $beneficiare->beneficiairePAQuantite = $request->get('beneficiairePAQuantite');
            $beneficiare->beneficiairePAHeureRetour = $request->get('beneficiairePAHeureRetour');
            $beneficiare->beneficiairePAConvoyeur = $request->get('beneficiairePAConvoyeur');
            $beneficiare->beneficiaireFP = $request->get('beneficiaireFP');
            $beneficiare->beneficiaireFPQuantite = $request->get('beneficiaireFPQuantite');
            $beneficiare->beneficiaireFPHeureRetour = $request->get('beneficiaireFPHeureRetour');
            $beneficiare->beneficiaireFPConvoyeur = $request->get('beneficiaireFPConvoyeur');
            $beneficiare->beneficiairePM = $request->get('beneficiairePM');
            $beneficiare->beneficiairePMQuantite = $request->get('beneficiairePMQuantite');
            $beneficiare->beneficiairePMHeureRetour = $request->get('beneficiairePMHeureRetour');
            $beneficiare->beneficiairePMConvoyeur = $request->get('beneficiairePMConvoyeur');
            $beneficiare->beneficiaireMunition = $request->get('beneficiaireMunition');
            $beneficiare->beneficiaireMunitionQuantite = $request->get('beneficiaireMunitionQuantite');
            $beneficiare->beneficiaireMunitionHeureRetour = $request->get('beneficiaireMunitionHeureRetour');
            $beneficiare->beneficiaireMunitionConvoyeur = $request->get('beneficiaireMunitionConvoyeur');
            $beneficiare->beneficiaireTAG = $request->get('beneficiaireTAG');
            $beneficiare->beneficiaireTAGQuanite = $request->get('beneficiaireTAGQuanite');
            $beneficiare->beneficiaireTAGHeureRetour = $request->get('beneficiaireTAGHeureRetour');
            $beneficiare->beneficiaireTAGConvoyeur = $request->get('beneficiaireTAGConvoyeur');
            $beneficiare->save();
        //}


        return redirect('/materiel-liste')->with('success', 'Matériel enregistré!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id)
    {
        $materiel = SecuriteMateriel::find($id);
        $materiel->delete();
        return redirect('/materiel-liste')->with('success', 'Matériel supprimé!');
    }
}
