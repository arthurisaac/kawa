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
        $personnels = DB::table('personnels')->where('service', '=', 'securite')->get();
        $tournees = DepartTournee::with('agentDeGardes')
            ->with('chefDeBords')->with('chauffeurs')
            ->with('vehicules')
            ->orderByDesc('id')
            ->get();
        return view('securite.materiel.index', compact('personnels', 'tournees', 'centres_regionaux', 'centres'));
    }

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function liste(Request $request)
    {
        if(isset($request->debut) && isset($request->fin))
        {
            $materiels = SecuriteMateriel::with('cbs')
            ->with('tournees')
            ->with('operateurRadios')
            ->whereBetween('date', [$request->debut, $request->fin])
            ->orderByDesc('id')
            ->get();
        $remettants = SecuriteMaterielRemettant::with('materiels')->get();
        $beneficiaires = SecuriteMaterielBeneficiaire::with('materiels')->get();
        } else{
            $materiels = SecuriteMateriel::with('cbs')
                ->with('tournees')
                ->with('operateurRadios')
                ->orderByDesc('id')
                ->get();
            $remettants = SecuriteMaterielRemettant::with('materiels')->get();
            $beneficiaires = SecuriteMaterielBeneficiaire::with('materiels')->get();
        }

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
            'remettantPieceVehiculeRemise' => $request->get('remettantPieceVehiculeRemise'),
            'remettantPieceVehiculeConvoyeur' => $request->get('remettantPieceVehiculeConvoyeur'),
            'remettantPieceVehiculeRetour' => $request->get('remettantPieceVehiculeRetour'),
            'remettantCleVehicule' => $request->get('remettantCleVehicule'),
            'remettantCleVehiculeQuantite' => $request->get('remettantCleVehiculeQuantite'),
            'remettantCleVehiculeRemise' => $request->get('remettantCleVehiculeRemise'),
            'remettantCleVehiculeConvoyeur' => $request->get('remettantCleVehiculeConvoyeur'),
            'remettantCleVehiculeRetour' => $request->get('remettantCleVehiculeRetour'),
            'remettantTelephone' => $request->get('remettantTelephone'),
            'remettantTelephoneQuantite' => $request->get('remettantTelephoneQuantite'),
            'remettantTelephoneRemise' => $request->get('remettantTelephoneRemise'),
            'remettantTelephoneConvoyeur' => $request->get('remettantTelephoneConvoyeur'),
            'remettantTelephoneRetour' => $request->get('remettantTelephoneRetour'),
            'remettantRadio' => $request->get('remettantRadio'),
            'remettantRadioQuantite' => $request->get('remettantRadioQuantite'),
            'remettantRadioRemise' => $request->get('remettantRadioRemise'),
            'remettantRadioConvoyeur' => $request->get('remettantRadioConvoyeur'),
            'remettantRadioRetour' => $request->get('remettantRadioRetour'),
            'remettantGBP' => $request->get('remettantGBP'),
            'remettantGBPQuantite' => $request->get('remettantGBPQuantite'),
            'beneficiaireGBPRemise' => $request->get('beneficiaireGBPRemise'),
            'remettantGBPConvoyeur' => $request->get('remettantGBPConvoyeur'),
            'remettantGBPRetour' => $request->get('remettantGBPRetour'),
            'remettantPA' => $request->get('remettantPA'),
            'remettantPAQuantite' => $request->get('remettantPAQuantite'),
            'remettantPARemise' => $request->get('remettantPARemise'),
            'remettantPAConvoyeur' => $request->get('remettantPAConvoyeur'),
            'remettantPARetour' => $request->get('remettantPARetour'),
            'remettantFP' => $request->get('remettantFP'),
            'remettantFPQuantite' => $request->get('remettantFPQuantite'),
            'beneficiaireFPRemise' => $request->get('beneficiaireFPRemise'),
            'remettantFPConvoyeur' => $request->get('remettantFPConvoyeur'),
            'remettantFPRetour' => $request->get('remettantFPRetour'),
            'remettantPM' => $request->get('remettantPM'),
            'remettantPMQuantite' => $request->get('remettantPMQuantite'),
            'remettantPMRemise' => $request->get('remettantPMRemise'),
            'remettantPMConvoyeur' => $request->get('remettantPMConvoyeur'),
            'remettantPMRetour' => $request->get('remettantPMRetour'),
            'remettantMunition' => $request->get('remettantMunition'),
            'remettantMunitionQuantite' => $request->get('remettantMunitionQuantite'),
            'remettantMunitionRemise' => $request->get('remettantMunitionRemise'),
            'remettantMunitionConvoyeur' => $request->get('remettantMunitionConvoyeur'),
            'remettantMunitionRetour' => $request->get('remettantMunitionRetour'),
            'remettantMunitionPA' => $request->get('remettantMunitionPA'),
            'remettantMunitionPAQuantite' => $request->get('remettantMunitionPAQuantite'),
            'remettantMunitionPARemise' => $request->get('remettantMunitionPARemise'),
            'remettantMunitionPAConvoyeur' => $request->get('remettantMunitionPAConvoyeur'),
            'remettantMunitionPARetour' => $request->get('remettantMunitionPARetour'),
            'remettantMunitionFM' => $request->get('remettantMunitionFM'),
            'remettantMunitionFMQuantite' => $request->get('remettantMunitionFMQuantite'),
            'remettantMunitionFMRemise' => $request->get('remettantMunitionFMRemise'),
            'remettantMunitionFMConvoyeur' => $request->get('remettantMunitionFMConvoyeur'),
            'remettantMunitionFMRetour' => $request->get('remettantMunitionFMRetour'),
            'remettantMunitionFP' => $request->get('remettantMunitionFP'),
            'remettantMunitionFPQuantite' => $request->get('remettantMunitionFPQuantite'),
            'remettantMunitionFPRemise' => $request->get('remettantMunitionFPRemise'),
            'remettantMunitionFPConvoyeur' => $request->get('remettantMunitionFPConvoyeur'),
            'remettantMunitionFPRetour' => $request->get('remettantMunitionFPRetour'),
            'remettantTAG' => $request->get('remettantTAG'),
            'remettantTAGQuantite' => $request->get('remettantTAGQuantite'),
            'remettantTAGRemise' => $request->get('remettantTAGRemise'),
            'remettantTAGConvoyeur' => $request->get('remettantTAGConvoyeur'),
            'remettantTAGRetour' => $request->get('remettantTAGRetour'),
        ]);

        $remettant->save();
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
        $personnels = DB::table('personnels')->where('service', 'LIKE', 'SECURITE')->get();
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
            $remettant->remettantPieceVehicule = $request->get('remettantPieceVehicule');
        $remettant->remettantPieceVehiculeQuantite = $request->get('remettantPieceVehiculeQuantite');
        $remettant->remettantPieceVehiculeRemise = $request->get('remettantPieceVehiculeRemise');
        $remettant->remettantPieceVehiculeConvoyeur = $request->get('remettantPieceVehiculeConvoyeur');
        $remettant->remettantPieceVehiculeRetour = $request->get('remettantPieceVehiculeRetour');
        $remettant->remettantCleVehicule = $request->get('remettantCleVehicule');
        $remettant->remettantCleVehiculeQuantite = $request->get('remettantCleVehiculeQuantite');
        $remettant->remettantCleVehiculeRemise = $request->get('remettantCleVehiculeRemise');
        $remettant->remettantCleVehiculeConvoyeur = $request->get('remettantCleVehiculeConvoyeur');
        $remettant->remettantCleVehiculeRetour = $request->get('remettantCleVehiculeRetour');
        $remettant->remettantTelephone = $request->get('remettantTelephone');
        $remettant->remettantTelephoneQuantite = $request->get('remettantTelephoneQuantite');
        $remettant->remettantTelephoneRemise = $request->get('remettantTelephoneRemise');
        $remettant->remettantTelephoneConvoyeur = $request->get('remettantTelephoneConvoyeur');
        $remettant->remettantTelephoneRetour = $request->get('remettantTelephoneRetour');
        $remettant->remettantRadio = $request->get('remettantRadio');
        $remettant->remettantRadioQuantite = $request->get('remettantRadioQuantite');
        $remettant->remettantRadioRemise = $request->get('remettantRadioRemise');
        $remettant->remettantRadioConvoyeur = $request->get('remettantRadioConvoyeur');
        $remettant->remettantRadioRetour = $request->get('remettantRadioRetour');
        $remettant->remettantGBP = $request->get('remettantGBP');
        $remettant->remettantGBPQuantite = $request->get('remettantGBPQuantite');
        $remettant->beneficiaireGBPRemise = $request->get('beneficiaireGBPRemise');
        $remettant->remettantGBPConvoyeur = $request->get('remettantGBPConvoyeur');
        $remettant->remettantGBPRetour = $request->get('remettantGBPRetour');
        $remettant->remettantPA = $request->get('remettantPA');
        $remettant->remettantPAQuantite = $request->get('remettantPAQuantite');
        $remettant->remettantPARemise = $request->get('remettantPARemise');
        $remettant->remettantPAConvoyeur = $request->get('remettantPAConvoyeur');
        $remettant->remettantPARetour = $request->get('remettantPARetour');
        $remettant->remettantFP = $request->get('remettantFP');
        $remettant->remettantFPQuantite = $request->get('remettantFPQuantite');
        $remettant->beneficiaireFPRemise = $request->get('beneficiaireFPRemise');
        $remettant->remettantFPConvoyeur = $request->get('remettantFPConvoyeur');
        $remettant->remettantFPRetour = $request->get('remettantFPRetour');
        $remettant->remettantPM = $request->get('remettantPM');
        $remettant->remettantPMQuantite = $request->get('remettantPMQuantite');
        $remettant->remettantPMRemise = $request->get('remettantPMRemise');
        $remettant->remettantPMConvoyeur = $request->get('remettantPMConvoyeur');
        $remettant->remettantPMRetour = $request->get('remettantPMRetour');
        $remettant->remettantMunition = $request->get('remettantMunition');
        $remettant->remettantMunitionQuantite = $request->get('remettantMunitionQuantite');
        $remettant->remettantMunitionRemise = $request->get('remettantMunitionRemise');
        $remettant->remettantMunitionConvoyeur = $request->get('remettantMunitionConvoyeur');
        $remettant->remettantMunitionRetour = $request->get('remettantMunitionRetour');
        $remettant->remettantMunitionPA = $request->get('remettantMunitionPA');
        $remettant->remettantMunitionPAQuantite = $request->get('remettantMunitionPAQuantite');
        $remettant->remettantMunitionPARemise = $request->get('remettantMunitionPARemise');
        $remettant->remettantMunitionPAConvoyeur = $request->get('remettantMunitionPAConvoyeur');
        $remettant->remettantMunitionPARetour = $request->get('remettantMunitionPARetour');
        $remettant->remettantMunitionFM = $request->get('remettantMunitionFM');
        $remettant->remettantMunitionFMQuantite = $request->get('remettantMunitionFMQuantite');
        $remettant->remettantMunitionFMRemise = $request->get('remettantMunitionFMRemise');
        $remettant->remettantMunitionFMConvoyeur = $request->get('remettantMunitionFMConvoyeur');
        $remettant->remettantMunitionFMRetour = $request->get('remettantMunitionFMRetour');
        $remettant->remettantMunitionFP = $request->get('remettantMunitionFP');
        $remettant->remettantMunitionFPQuantite = $request->get('remettantMunitionFPQuantite');
        $remettant->remettantMunitionFPRemise = $request->get('remettantMunitionFPRemise');
        $remettant->remettantMunitionFPConvoyeur = $request->get('remettantMunitionFPConvoyeur');
        $remettant->remettantMunitionFPRetour = $request->get('remettantMunitionFPRetour');
        $remettant->remettantTAG = $request->get('remettantTAG');
        $remettant->remettantTAGQuantite = $request->get('remettantTAGQuantite');
        $remettant->remettantTAGRemise = $request->get('remettantTAGRemise');
        $remettant->remettantTAGConvoyeur = $request->get('remettantTAGConvoyeur');
        $remettant->remettantTAGRetour = $request->get('remettantTAGRetour');

        $remettant->save();

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
