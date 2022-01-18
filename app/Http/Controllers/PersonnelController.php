<?php

namespace App\Http\Controllers;

use App\Models\Centre;
use App\Models\Centre_regional;
use App\Models\Personnel;
use App\Models\PersonnelConge;
use App\Models\PersonnelGestionAbsences;
use App\Models\PersonnelGestionAffectations;
use App\Models\PersonnelGestionConge;
use App\Models\PersonnelGestionContrats;
use App\Models\PersonnelGestionExplications;
use App\Models\PersonnelGestionMission;
use App\Models\PersonnelGestionSanction;
use App\Models\PersonnelSanction;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class PersonnelController extends Controller
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
        $personnels = Personnel::all();
        $nextId = DB::table('personnels')->max('id') + 1;
        return view('/rh/personnel.index', compact('centres', 'centres_regionaux', 'personnels', 'nextId'));
    }

    public function liste()
    {
        $personnels = Personnel::all();
        return view('/rh/personnel.liste',
            compact('personnels'));
    }

    public function listeDetaillee(Request $request)
    {
        $personnels = Personnel::all();
        $centre = $request->get('centre');
        $centre_regional = $request->get('centre_regional');
        $fonction = $request->get('fonction');
        $service = $request->get('service');
        $nature = $request->get('nature');
        $situation_matrimonial = $request->get('situation_matrimonial');

        $centres = Centre::all();
        $centres_regionaux = Centre_regional::all();

        if (isset($fonction)) {
            $personnels = Personnel::query()->where("fonction", 'like', "%" . $fonction . "%")->get();
        }
        if (isset($service)) {
            $personnels = Personnel::query()->where("service", 'like', "%" . $service . "%")->get();
        }
        if (isset($nature)) {
            $personnels = Personnel::query()->where("natureContrat", 'like', "%" . $nature . "%")->get();
        }
        if (isset($situation_matrimonial)) {
            $personnels = Personnel::query()->where("situationMatrimoniale", 'like', "%" . $situation_matrimonial . "%")->get();
        }
        if (isset($centre)) {
            $personnels = Personnel::query()->where("centre", 'like', "%" . $centre . "%")->get();
        }
        if (isset($centre_regional)) {
            $personnels = Personnel::query()->where("centreRegional", 'like', "%" . $centre_regional . "%")->get();
        }
        if (isset($centre) && isset($centre_regional)) {
            $personnels = Personnel::query()
                ->where("centreRegional", 'like', "%" . $centre_regional . "%")
                ->where("centre", 'like', "%" . $centre . "%")
                ->get();
        }
        // Recherche par centre
        if (isset($centre) && isset($fonction)) {
            $personnels = Personnel::query()
                ->where("centre", 'like', "%" . $centre . "%")
                ->where("fonction", 'like', "%" . $fonction . "%")
                ->get();
        }
        if (isset($centre) && isset($service)) {
            $personnels = Personnel::query()
                ->where("centre", 'like', "%" . $centre . "%")
                ->where("service", 'like', "%" . $service . "%")
                ->get();
        }
        if (isset($centre) && isset($nature)) {
            $personnels = Personnel::query()
                ->where("centre", 'like', "%" . $centre . "%")
                ->where("natureContrat", 'like', "%" . $nature . "%")
                ->get();
        }
        if (isset($centre) && isset($situation_matrimonial)) {
            $personnels = Personnel::query()
                ->where("centre", 'like', "%" . $centre . "%")
                ->where("situationMatrimoniale", 'like', "%" . $situation_matrimonial . "%")
                ->get();
        }
        // Recherche par centre fonction
        if (isset($centre) && isset($fonction) && isset($service)) {
            $personnels = Personnel::query()
                ->where("centre", 'like', "%" . $centre . "%")
                ->where("fonction", 'like', "%" . $fonction . "%")
                ->where("service", 'like', "%" . $service . "%")
                ->get();
        }
        if (isset($centre) && isset($fonction) && isset($nature)) {
            $personnels = Personnel::query()
                ->where("centre", 'like', "%" . $centre . "%")
                ->where("fonction", 'like', "%" . $fonction . "%")
                ->where("natureContrat", 'like', "%" . $nature . "%")
                ->get();
        }
        if (isset($centre) && isset($fonction) && isset($situation_matrimonial)) {
            $personnels = Personnel::query()
                ->where("centre", 'like', "%" . $centre . "%")
                ->where("fonction", 'like', "%" . $fonction . "%")
                ->where("situationMatrimoniale", 'like', "%" . $situation_matrimonial . "%")
                ->get();
        }
        // Recherche par centre service
        if (isset($centre) && isset($service) && isset($nature)) {
            $personnels = Personnel::query()
                ->where("centre", 'like', "%" . $centre . "%")
                ->where("service", 'like', "%" . $service . "%")
                ->where("natureContrat", 'like', "%" . $nature . "%")
                ->get();
        }
        if (isset($centre) && isset($service) && isset($situation_matrimonial)) {
            $personnels = Personnel::query()
                ->where("centre", 'like', "%" . $centre . "%")
                ->where("service", 'like', "%" . $service . "%")
                ->where("situationMatrimoniale", 'like', "%" . $situation_matrimonial . "%")
                ->get();
        }
        // Recherche par centre regional
        if (isset($centre_regional) && isset($fonction)) {
            $personnels = Personnel::query()
                ->where("centreRegional", 'like', "%" . $centre_regional . "%")
                ->where("fonction", 'like', "%" . $fonction . "%")
                ->get();
        }
        if (isset($centre_regional) && isset($service)) {
            $personnels = Personnel::query()
                ->where("centreRegional", 'like', "%" . $centre_regional . "%")
                ->where("service", 'like', "%" . $service . "%")
                ->get();
        }
        if (isset($centre_regional) && isset($nature)) {
            $personnels = Personnel::query()
                ->where("centreRegional", 'like', "%" . $centre_regional . "%")
                ->where("natureContrat", 'like', "%" . $nature . "%")
                ->get();
        }
        if (isset($centre_regional) && isset($situation_matrimonial)) {
            $personnels = Personnel::query()
                ->where("centreRegional", 'like', "%" . $centre_regional . "%")
                ->where("situationMatrimoniale", 'like', "%" . $situation_matrimonial . "%")
                ->get();
        }
        // Recherche par centre régional fonction
        if (isset($centre_regional) && isset($fonction) && isset($service)) {
            $personnels = Personnel::query()
                ->where("centreRegional", 'like', "%" . $centre_regional . "%")
                ->where("fonction", 'like', "%" . $fonction . "%")
                ->where("service", 'like', "%" . $service . "%")
                ->get();
        }
        if (isset($centre_regional) && isset($fonction) && isset($nature)) {
            $personnels = Personnel::query()
                ->where("centreRegional", 'like', "%" . $centre_regional . "%")
                ->where("fonction", 'like', "%" . $fonction . "%")
                ->where("natureContrat", 'like', "%" . $nature . "%")
                ->get();
        }
        if (isset($centre_regional) && isset($fonction) && isset($situation_matrimonial)) {
            $personnels = Personnel::query()
                ->where("centreRegional", 'like', "%" . $centre_regional . "%")
                ->where("fonction", 'like', "%" . $fonction . "%")
                ->where("situationMatrimoniale", 'like', "%" . $situation_matrimonial . "%")
                ->get();
        }
        // Recherche par centre régional service
        if (isset($centre_regional) && isset($service) && isset($nature)) {
            $personnels = Personnel::query()
                ->where("centreRegional", 'like', "%" . $centre_regional . "%")
                ->where("service", 'like', "%" . $service . "%")
                ->where("natureContrat", 'like', "%" . $nature . "%")
                ->get();
        }
        if (isset($centre_regional) && isset($service) && isset($situation_matrimonial)) {
            $personnels = Personnel::query()
                ->where("centreRegional", 'like', "%" . $centre_regional . "%")
                ->where("service", 'like', "%" . $service . "%")
                ->where("situationMatrimoniale", 'like', "%" . $situation_matrimonial . "%")
                ->get();
        }// Recherche par centre regional et centre
        if (isset($centre_regional) && isset($centre) && isset($fonction)) {
            $personnels = Personnel::query()
                ->where("centreRegional", 'like', "%" . $centre_regional . "%")
                ->where("centre", 'like', "%" . $centre . "%")
                ->where("fonction", 'like', "%" . $fonction . "%")
                ->get();
        }
        if (isset($centre_regional) && isset($centre) && isset($service)) {
            $personnels = Personnel::query()
                ->where("centreRegional", 'like', "%" . $centre_regional . "%")
                ->where("centre", 'like', "%" . $centre . "%")
                ->where("service", 'like', "%" . $service . "%")
                ->get();
        }
        if (isset($centre_regional) && isset($centre) && isset($nature)) {
            $personnels = Personnel::query()
                ->where("centreRegional", 'like', "%" . $centre_regional . "%")
                ->where("centre", 'like', "%" . $centre . "%")
                ->where("natureContrat", 'like', "%" . $nature . "%")
                ->get();
        }
        if (isset($centre_regional) && isset($centre) && isset($situation_matrimonial)) {
            $personnels = Personnel::query()
                ->where("centreRegional", 'like', "%" . $centre_regional . "%")
                ->where("centre", 'like', "%" . $centre . "%")
                ->where("situationMatrimoniale", 'like', "%" . $situation_matrimonial . "%")
                ->get();
        }
        // Recherche par centre régional fonction
        if (isset($centre_regional) && isset($fonction) && isset($service)) {
            $personnels = Personnel::query()
                ->where("centreRegional", 'like', "%" . $centre_regional . "%")
                ->where("centre", 'like', "%" . $centre . "%")
                ->where("fonction", 'like', "%" . $fonction . "%")
                ->where("service", 'like', "%" . $service . "%")
                ->get();
        }
        if (isset($centre_regional) && isset($centre) && isset($fonction) && isset($nature)) {
            $personnels = Personnel::query()
                ->where("centreRegional", 'like', "%" . $centre_regional . "%")
                ->where("centre", 'like', "%" . $centre . "%")
                ->where("fonction", 'like', "%" . $fonction . "%")
                ->where("natureContrat", 'like', "%" . $nature . "%")
                ->get();
        }
        if (isset($centre_regional) && isset($centre) && isset($fonction) && isset($situation_matrimonial)) {
            $personnels = Personnel::query()
                ->where("centreRegional", 'like', "%" . $centre_regional . "%")
                ->where("centre", 'like', "%" . $centre . "%")
                ->where("fonction", 'like', "%" . $fonction . "%")
                ->where("situationMatrimoniale", 'like', "%" . $situation_matrimonial . "%")
                ->get();
        }
        // Recherche par centre régional service
        if (isset($centre_regional) && isset($centre) && isset($service) && isset($nature)) {
            $personnels = Personnel::query()
                ->where("centreRegional", 'like', "%" . $centre_regional . "%")
                ->where("centre", 'like', "%" . $centre . "%")
                ->where("service", 'like', "%" . $service . "%")
                ->where("natureContrat", 'like', "%" . $nature . "%")
                ->get();
        }
        if (isset($centre_regional) && isset($centre) && isset($service) && isset($situation_matrimonial)) {
            $personnels = Personnel::query()
                ->where("centreRegional", 'like', "%" . $centre_regional . "%")
                ->where("centre", 'like', "%" . $centre . "%")
                ->where("service", 'like', "%" . $service . "%")
                ->where("situationMatrimoniale", 'like', "%" . $situation_matrimonial . "%")
                ->get();
        }
        // Recherche tous les champs
        if (isset($centre_regional) && isset($centre) && isset($service) && isset($nature) && isset($situation_matrimonial)) {
            $personnels = Personnel::query()
                ->where("centreRegional", 'like', "%" . $centre_regional . "%")
                ->where("centre", 'like', "%" . $centre . "%")
                ->where("service", 'like', "%" . $service . "%")
                ->where("natureContrat", 'like', "%" . $nature . "%")
                ->where("situationMatrimoniale", 'like', "%" . $situation_matrimonial . "%")
                ->get();
        }
        if (isset($centre_regional) && isset($centre) && isset($service) && isset($fonction) && isset($situation_matrimonial)) {
            $personnels = Personnel::query()
                ->where("centreRegional", 'like', "%" . $centre_regional . "%")
                ->where("centre", 'like', "%" . $centre . "%")
                ->where("service", 'like', "%" . $service . "%")
                ->where("fonction", 'like', "%" . $fonction . "%")
                ->where("situationMatrimoniale", 'like', "%" . $situation_matrimonial . "%")
                ->get();
        }
        if (isset($centre_regional) && isset($centre) && isset($service) && isset($fonction) && isset($nature)) {
            $personnels = Personnel::query()
                ->where("centreRegional", 'like', "%" . $centre_regional . "%")
                ->where("centre", 'like', "%" . $centre . "%")
                ->where("service", 'like', "%" . $service . "%")
                ->where("fonction", 'like', "%" . $fonction . "%")
                ->where("natureContrat", 'like', "%" . $nature . "%")
                ->get();
        }
        if (isset($centre_regional) && isset($centre) && isset($service) && isset($fonction) && isset($nature) && isset($situation_matrimonial)) {
            $personnels = Personnel::query()
                ->where("centreRegional", 'like', "%" . $centre_regional . "%")
                ->where("centre", 'like', "%" . $centre . "%")
                ->where("service", 'like', "%" . $service . "%")
                ->where("fonction", 'like', "%" . $fonction . "%")
                ->where("natureContrat", 'like', "%" . $nature . "%")
                ->where("situationMatrimoniale", 'like', "%" . $situation_matrimonial . "%")
                ->get();
        }

        return view('/rh.personnel.liste-detaillee',
            compact('personnels', 'centres', 'centres_regionaux', 'centre', 'centre_regional', 'fonction', 'service', 'nature', 'situation_matrimonial'));
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

        $photo = null;
        if ($files = $request->file('photo')) {
            // $name = $files->getClientOriginalName();
            // $files->move('images', $name); //Save to public dir
            $fileName = time() . '_' . $request->photo->getClientOriginalName();
            $filePath = $request->file('photo')->storeAs('/', $fileName, 'ftp');
            $photo = $filePath;
        }

        $personnel = new Personnel([
            'matricule' => $request->get('matricule'),
            'centre' => $request->get('centre'),
            'centreRegional' => $request->get('centreRegional'),
            'securite' => $request->get('securite'),
            'transport' => $request->get('transport'),
            'caisse' => $request->get('caisse'),
            'regulation' => $request->get('regulation'),
            'siegeService' => $request->get('siegeService'),
            'siegeDirection' => $request->get('siegeDirection'),
            'siegeDirectionGenerale' => $request->get('siegeDirectionGenerale'),
            'nomPrenoms' => $request->get('nomPrenoms'),
            'dateNaissance' => $request->get('dateNaissance'),
            'dateEntreeSociete' => $request->get('dateEntreeSociete'),
            'dateSortie' => $request->get('dateSortie'),
            'typeSortie' => $request->get('typeSortie'),
            'fonction' => $request->get('fonction'),
            'service' => $request->get('service'),
            'natureContrat' => $request->get('natureContrat'),
            'numeroCNPS' => $request->get('numeroCNPS'),
            'situationMatrimoniale' => $request->get('situationMatrimoniale'),
            'nombreEnfants' => $request->get('nombreEnfants'),
            //'photo' => base64_encode($request->get('photo')),
            'adresseGeographique' => $request->get('adresseGeographique'),
            'contactPersonnel' => $request->get('contactPersonnel'),
            'nomPere' => $request->get('nomPere'),
            'nomMere' => $request->get('nomMere'),
            'nomConjoint' => $request->get('nomConjoint'),
            'personneContacter' => $request->get('personneContacter'),
            'photo' => $photo
        ]);
        $personnel->save();

        /* missions */
        if (!empty($request->get('missions_debut')) && !empty($request->get('missions_fin'))) {
            $missions_debut = $request->get('missions_debut');
            $missions_fin = $request->get('missions_fin');
            $missions_nbre_jours = $request->get('missions_nbre_jours');
            $missions_lieu = $request->get('missions_lieu');
            $missions_motif = $request->get('missions_motif');
            $missions_frais = $request->get('missions_frais');

            for ($i = 0; $i < count($missions_debut); $i++) {
                if ($missions_debut[$i] != null && !empty($missions_debut[$i])) {
                    $mission = new PersonnelGestionMission([
                        "debut_mission" => $missions_debut[$i],
                        "fin_mission" => $missions_fin[$i],
                        "nombre_jours" => $missions_nbre_jours[$i],
                        "lieu" => $missions_lieu[$i],
                        "motif" => $missions_motif[$i],
                        "frais" => $missions_frais[$i],
                        "personnel" => $personnel->id,
                    ]);
                    $mission->save();
                }
            }
        }

        /* absences */
        if (!empty($request->get('absence_debut')) && !empty($request->get('absence_fin'))) {
            $contrat_ = $request->get('absence_debut');
            $absence_fin = $request->get('absence_fin');
            $absence_nombre_jours = $request->get('absence_nombre_jours');
            $absence_motif = $request->get('absence_motif');
            //$absence_frais = $request->get('absence_frais');

            for ($i = 0; $i < count($contrat_); $i++) {
                if ($contrat_[$i] != null && !empty($contrat_[$i])) {
                    $absence = new PersonnelGestionAbsences([
                        "debut_absence" => $contrat_[$i],
                        "fin_absence" => $absence_fin[$i],
                        "nombre_jours" => $absence_nombre_jours[$i],
                        "motif" => $absence_motif[$i],
                        //"frais" => $absence_frais[$i],
                        "personnel" => $personnel->id,
                    ]);
                    $absence->save();
                }
            }
        }

        /* contrats */
        if (!empty($request->get('contrat_type_contrat')) && !empty($request->get('contrat_debut_contrat'))) {
            $contrat_type = $request->get('contrat_type_contrat');
            $contrat_debut = $request->get('contrat_debut_contrat');
            $contrat_fin = $request->get('contrat_fin_contrat');
            $contrat_nombre_jours = $request->get('contrat_nombre_jours');
            $contrat_fonction = $request->get('contrat_fonction');
            $contrat_salaire = $request->get('contrat_salaire');


            for ($i = 0; $i < count($contrat_type); $i++) {
                if ($contrat_type[$i] != null && !empty($contrat_debut[$i])) {
                    $data = new PersonnelGestionContrats([
                        "type_contrat" => $contrat_type[$i],
                        "debut_contrat" => $contrat_debut[$i],
                        "fin_contrat" => $contrat_fin[$i],
                        "nombre_jours" => $contrat_nombre_jours[$i],
                        "fonction" => $contrat_fonction[$i],
                        "salaire" => $contrat_salaire[$i],
                        "personnel" => $personnel->id,
                    ]);
                    $data->save();
                }
            }
        }

        /* explications */
        if (!empty($request->get('demande_date_demande')) && !empty($request->get('demande_motif'))) {
            $sanction_ = $request->get('demande_date_demande');
            $affectation_centre = $request->get('demande_motif');
            $affectation_motif = $request->get('demande_sanctions');


            for ($i = 0; $i < count($sanction_); $i++) {
                if ($sanction_[$i] != null && !empty($sanction_[$i])) {
                    $data = new PersonnelGestionExplications([
                        "date_demande" => $sanction_[$i],
                        "motif" => $affectation_centre[$i],
                        "sanctions" => $affectation_motif[$i],
                        "personnel" => $personnel->id,
                    ]);
                    $data->save();
                }
            }
        }

        /* affectation */
        if (!empty($request->get('affectation_date')) && !empty($request->get('affectation_centre'))) {
            $sanction_ = $request->get('affectation_date');
            $affectation_centre = $request->get('affectation_centre');
            $affectation_motif = $request->get('affectation_motif');


            for ($i = 0; $i < count($sanction_); $i++) {
                if ($sanction_[$i] != null && !empty($sanction_[$i])) {
                    $data = new PersonnelGestionAffectations([
                        "date_affectation" => $sanction_[$i],
                        "centre" => $affectation_centre[$i],
                        "motif" => $affectation_motif[$i],
                        "personnel" => $personnel->id,
                    ]);
                    $data->save();
                }
            }
        }

        /* sanctions */
        if (!empty($request->get('sanction_date')) && !empty($request->get('sanction_sanction'))) {
            $sanction_date = $request->get('sanction_date');
            $sanction_sanction = $request->get('sanction_sanction');
            $sanction_motif = $request->get('sanction_motif');


            for ($i = 0; $i < count($sanction_date); $i++) {
                if ($sanction_date[$i] != null && !empty($sanction_date[$i])) {
                    $data = new PersonnelGestionSanction([
                        "date" => $sanction_date[$i],
                        "sanction" => $sanction_sanction[$i],
                        "motif" => $sanction_motif[$i],
                        "personnel" => $personnel->id,
                    ]);
                    $data->save();
                }
            }
        }

        /* congés */
        if (!empty($request->get('dateDernierDepartConge')) && !empty($request->get('dateProchainDepartConge'))) {
            $dernier = $request->get('dateDernierDepartConge');
            $dateProchainDepartConge = $request->get('dateProchainDepartConge');
            $nombreJourPris = $request->get('nombreJourPris');


            for ($i = 0; $i < count($dernier); $i++) {
                if ($dernier[$i] != null && !empty($dernier[$i])) {
                    $data = new PersonnelGestionConge([
                        'dernier' => $dernier[$i],
                        'prochain' => $dateProchainDepartConge[$i],
                        'jourPris' => $nombreJourPris[$i],
                        "personnel" => $personnel->id,
                    ]);
                    $data->save();
                }
            }
        }

        return redirect('/personnel')->with('success', 'Personnel enregistré!');
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
        $centres = Centre::all();
        $centres_regionaux = Centre_regional::all();
        $gestionMission = PersonnelGestionMission::all()->where('personnel', '=', $id);
        $gestionAbsences = PersonnelGestionAbsences::all()->where('personnel', '=', $id);
        $gestionContrats = PersonnelGestionContrats::all()->where('personnel', '=', $id);
        $gestionExplications = PersonnelGestionExplications::all()->where('personnel', '=', $id);
        $gestionAffectation = PersonnelGestionAffectations::all()->where('personnel', '=', $id);
        $gestionSanction = PersonnelGestionSanction::all()->where('personnel', '=', $id);
        $gestionConge = PersonnelGestionConge::all()->where('personnel', '=', $id);
        $personnel = Personnel::find($id);
        return view('/rh/personnel.edit', compact('personnel', 'centres', 'centres_regionaux', 'gestionMission', 'gestionAbsences', 'gestionContrats', 'gestionExplications', 'gestionAffectation', 'gestionSanction', 'gestionConge'));
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

        $personnel = Personnel::find($id);
        $personnel->matricule = $request->get('matricule');
        $personnel->centre = $request->get('centre');
        $personnel->centreRegional = $request->get('centreRegional');
        $personnel->securite = $request->get('securite');
        $personnel->transport = $request->get('transport');
        $personnel->caisse = $request->get('caisse');
        $personnel->regulation = $request->get('regulation');
        $personnel->siegeService = $request->get('siegeService');
        $personnel->siegeDirection = $request->get('siegeDirection');
        $personnel->siegeDirectionGenerale = $request->get('siegeDirectionGenerale');
        $personnel->nomPrenoms = $request->get('nomPrenoms');
        $personnel->dateNaissance = $request->get('dateNaissance');
        $personnel->dateEntreeSociete = $request->get('dateEntreeSociete');
        $personnel->dateSortie = $request->get('dateSortie');
        $personnel->typeSortie = $request->get('typeSortie');
        $personnel->fonction = $request->get('fonction');
        $personnel->service = $request->get('service');
        $personnel->natureContrat = $request->get('natureContrat');
        $personnel->numeroCNPS = $request->get('numeroCNPS');
        $personnel->situationMatrimoniale = $request->get('situationMatrimoniale');
        $personnel->nombreEnfants = $request->get('nombreEnfants');
        $personnel->adresseGeographique = $request->get('adresseGeographique');
        $personnel->contactPersonnel = $request->get('contactPersonnel');
        $personnel->nomPere = $request->get('nomPere');
        $personnel->nomMere = $request->get('nomMere');
        $personnel->nomConjoint = $request->get('nomConjoint');
        $personnel->personneContacter = $request->get('personneContacter');
        if ($files = $request->file('photo')) {
            // $name = $files->getClientOriginalName();
            // $files->move('images', $name); //Save to public dir
            $fileName = time() . '_' . $request->photo->getClientOriginalName();
            $filePath = $request->file('photo')->storeAs('/', $fileName, 'ftp');
            $personnel->photo = $filePath;
        }
        $personnel->save();
        // return redirect('/personnel-liste')->with('success', 'Personnel enregistré!');

        /* missions */
        if (!empty($request->get('missions_debut')) && !empty($request->get('missions_fin'))) {
            $missions_debut = $request->get('missions_debut');
            $missions_fin = $request->get('missions_fin');
            $missions_nbre_jours = $request->get('missions_nbre_jours');
            $missions_lieu = $request->get('missions_lieu');
            $missions_motif = $request->get('missions_motif');
            $missions_frais = $request->get('missions_frais');

            for ($i = 0; $i < count($missions_debut); $i++) {
                if ($missions_debut[$i] != null && !empty($missions_debut[$i])) {
                    $mission = new PersonnelGestionMission([
                        "debut_mission" => $missions_debut[$i],
                        "fin_mission" => $missions_fin[$i],
                        "nombre_jours" => $missions_nbre_jours[$i],
                        "lieu" => $missions_lieu[$i],
                        "motif" => $missions_motif[$i],
                        "frais" => $missions_frais[$i],
                        "personnel" => $personnel->id,
                    ]);
                    $mission->save();
                }
            }
        }

        if (!empty($request->get('missions_debut_edit')) && !empty($request->get('missions_fin_edit'))) {
            $missions_debut_edit = $request->get('missions_debut_edit');
            $missions_fin_edit = $request->get('missions_fin_edit');
            $missions_nbre_jours_edit = $request->get('missions_nbre_jours_edit');
            $missions_lieu_edit = $request->get('missions_lieu_edit');
            $missions_motif_edit = $request->get('missions_motif_edit');
            $missions_frais_edit = $request->get('missions_frais_edit');
            $missions__ids = $request->get('missions_ids_edit');

            for ($i = 0; $i < count($missions_debut_edit); $i++) {
                if ($missions_debut_edit[$i] != null && !empty($missions_debut_edit[$i])) {
                    $mission = PersonnelGestionMission::find($missions__ids[$i]);
                    $mission->debut_mission = $missions_debut_edit[$i];
                    $mission->fin_mission = $missions_fin_edit[$i];
                    $mission->nombre_jours = $missions_nbre_jours_edit[$i];
                    $mission->lieu = $missions_lieu_edit[$i];
                    $mission->motif = $missions_motif_edit[$i];
                    $mission->frais = $missions_frais_edit[$i];
                    $mission->personnel = $personnel->id;

                    $mission->save();
                }
            }
        }

        /* absences */
        if (!empty($request->get('absence_debut')) && !empty($request->get('absence_fin'))) {
            $contrat_ = $request->get('absence_debut');
            $absence_fin = $request->get('absence_fin');
            $absence_nombre_jours = $request->get('absence_nombre_jours');
            $absence_motif = $request->get('absence_motif');
            $absence_frais = $request->get('absence_frais');

            for ($i = 0; $i < count($contrat_); $i++) {
                if ($contrat_[$i] != null && !empty($contrat_[$i])) {
                    $absence = new PersonnelGestionAbsences([
                        "debut_absence" => $contrat_[$i],
                        "fin_absence" => $absence_fin[$i],
                        "nombre_jours" => $absence_nombre_jours[$i],
                        "motif" => $absence_motif[$i],
                        "frais" => $absence_frais[$i],
                        "personnel" => $personnel->id,
                    ]);
                    $absence->save();
                }
            }
        }

        /* contrats */
        if (!empty($request->get('contrat_type_contrat')) && !empty($request->get('contrat_debut_contrat'))) {
            $contrat_type = $request->get('contrat_type_contrat');
            $contrat_debut = $request->get('contrat_debut_contrat');
            $contrat_fin = $request->get('contrat_fin_contrat');
            $contrat_nombre_jours = $request->get('contrat_nombre_jours');
            $contrat_fonction = $request->get('contrat_fonction');
            $contrat_salaire = $request->get('contrat_salaire');


            for ($i = 0; $i < count($contrat_type); $i++) {
                if ($contrat_type[$i] != null && !empty($contrat_debut[$i])) {
                    $data = new PersonnelGestionContrats([
                        "type_contrat" => $contrat_type[$i],
                        "debut_contrat" => $contrat_debut[$i],
                        "fin_contrat" => $contrat_fin[$i],
                        "nombre_jours" => $contrat_nombre_jours[$i],
                        "fonction" => $contrat_fonction[$i],
                        "salaire" => $contrat_salaire[$i],
                        "personnel" => $personnel->id,
                    ]);
                    $data->save();
                }
            }
        }

        if (!empty($request->get('contrat_type_contrat_edit')) && !empty($request->get('contrat_debut_contrat_edit'))) {
            $contrat_type_edit = $request->get('contrat_type_contrat_edit');
            $contrat_debut_edit = $request->get('contrat_debut_contrat_edit');
            $contrat_fin_edit = $request->get('contrat_fin_contrat_edit');
            $contrat_nombre_jours_edit = $request->get('contrat_nombre_jours_edit');
            $contrat_fonction_edit = $request->get('contrat_fonction_edit');
            $contrat_salaire_edit = $request->get('contrat_salaire_edit');
            $contrat_ids = $request->get('contrat_id');


            for ($i = 0; $i < count($contrat_type_edit); $i++) {
                if ($contrat_type_edit[$i] != null && !empty($contrat_debut_edit[$i])) {
                    $data = PersonnelGestionContrats::find($contrat_ids[$i]);
                    $data->type_contrat = $contrat_type_edit[$i];
                    $data->debut_contrat = $contrat_debut_edit[$i];
                    $data->fin_contrat = $contrat_fin_edit[$i];
                    $data->nombre_jours = $contrat_nombre_jours_edit[$i];
                    $data->fonction = $contrat_fonction_edit[$i];
                    $data->salaire = $contrat_salaire_edit[$i];

                    $data->save();
                }
            }
        }

        /* explications */
        if (!empty($request->get('demande_date_demande')) && !empty($request->get('demande_motif'))) {
            $affectation_date = $request->get('demande_date_demande');
            $affectation_centre = $request->get('demande_motif');
            $affectation_motif = $request->get('demande_sanctions');


            for ($i = 0; $i < count($affectation_date); $i++) {
                if ($affectation_date[$i] != null && !empty($affectation_date[$i])) {
                    $data = new PersonnelGestionExplications([
                        "date_demande" => $affectation_date[$i],
                        "motif" => $affectation_centre[$i],
                        "sanctions" => $affectation_motif[$i],
                        "personnel" => $personnel->id,
                    ]);
                    $data->save();
                }
            }
        }

        if (!empty($request->get('demande_date_demande_edit')) && !empty($request->get('demande_motif_edit'))) {
            $affectation_date_edit = $request->get('demande_date_demande_edit');
            $demande_motif_edit = $request->get('demande_motif_edit');
            $demande_sanctions_edit = $request->get('demande_sanctions_edit');
            $demande_ids = $request->get('demande_id');


            for ($i = 0; $i < count($affectation_date_edit); $i++) {
                if ($affectation_date_edit[$i] != null && !empty($demande_motif_edit[$i])) {
                    $data = PersonnelGestionExplications::find($demande_ids[$i]);
                    $data->date_demande = $affectation_date_edit[$i];
                    $data->motif = $demande_motif_edit[$i];
                    $data->sanctions = $demande_sanctions_edit[$i];
                    $data->save();
                }
            }
        }

        /* affectation */
        if (!empty($request->get('affectation_date')) && !empty($request->get('affectation_centre'))) {
            $affectation_date = $request->get('affectation_date');
            $affectation_centre = $request->get('affectation_centre');
            $affectation_motif = $request->get('affectation_motif');


            for ($i = 0; $i < count($affectation_date); $i++) {
                if ($affectation_date[$i] != null && !empty($affectation_date[$i])) {
                    $data = new PersonnelGestionAffectations([
                        "date_affectation" => $affectation_date[$i],
                        "centre" => $affectation_centre[$i],
                        "motif" => $affectation_motif[$i],
                        "personnel" => $personnel->id,
                    ]);
                    $data->save();
                }
            }
        }

        if (!empty($request->get('affectation_date_edit')) && !empty($request->get('affectation_centre_edit'))) {
            $affectation_date = $request->get('affectation_date_edit');
            $affectation_centre = $request->get('affectation_centre_edit');
            $affectation_motif = $request->get('affectation_motif_edit');
            $affectation_ids = $request->get('affectation_id');


            for ($i = 0; $i < count($affectation_date); $i++) {
                if ($affectation_date[$i] != null && !empty($affectation_motif[$i])) {
                    $data = PersonnelGestionAffectations::find($affectation_ids[$i]);
                    $data->date_affectation = $affectation_date[$i];
                    $data->centre = $affectation_centre[$i];
                    $data->motif = $affectation_motif[$i];
                    $data->save();
                }
            }
        }

        /* sanctions */
        if (!empty($request->get('sanction_date')) && !empty($request->get('sanction_sanction'))) {
            $sanction_date = $request->get('sanction_date');
            $sanction_sanction = $request->get('sanction_sanction');
            $sanction_motif = $request->get('sanction_motif');


            for ($i = 0; $i < count($sanction_date); $i++) {
                if ($sanction_date[$i] != null && !empty($sanction_date[$i])) {
                    $data = new PersonnelGestionSanction([
                        "date" => $sanction_date[$i],
                        "sanction" => $sanction_sanction[$i],
                        "motif" => $sanction_motif[$i],
                        "personnel" => $personnel->id,
                    ]);
                    $data->save();
                }
            }
        }

        if (!empty($request->get('sanction_date_edit')) && !empty($request->get('sanction_sanction_edit'))) {
            $sanction_date = $request->get('sanction_date_edit');
            $sanction_sanction = $request->get('sanction_sanction_edit');
            $sanction_motif = $request->get('sanction_motif_edit');
            $sanction_ids = $request->get('sanction_id');


            for ($i = 0; $i < count($sanction_date); $i++) {
                if ($sanction_date[$i] != null && !empty($sanction_date[$i])) {
                    $data = PersonnelGestionSanction::find($sanction_ids[$i]);
                    $data->date = $sanction_date[$i];
                    $data->sanction = $sanction_sanction[$i];
                    $data->motif = $sanction_motif[$i];
                    $data->save();
                }
            }
        }

        if (!empty($request->get('sanction_date_edit')) && !empty($request->get('sanction_sanction_edit'))) {
            $sanction_date = $request->get('sanction_date_edit');
            $sanction_sanction = $request->get('sanction_sanction_edit');
            $sanction_motif = $request->get('sanction_motif_edit');
            $sanction_ids = $request->get('sanction_id');


            for ($i = 0; $i < count($sanction_date); $i++) {
                if ($sanction_date[$i] != null && !empty($sanction_date[$i])) {
                    $data = PersonnelGestionSanction::find($sanction_ids[$i]);
                    $data->date = $sanction_date[$i];
                    $data->sanction = $sanction_sanction[$i];
                    $data->motif = $sanction_motif[$i];
                    $data->save();
                }
            }
        }

        /* congés */
        if (!empty($request->get('dateDernierDepartConge')) && !empty($request->get('dateProchainDepartConge'))) {
            $dernier = $request->get('dateDernierDepartConge');
            $dateProchainDepartConge = $request->get('dateProchainDepartConge');
            $nombreJourPris = $request->get('nombreJourPris');


            for ($i = 0; $i < count($dernier); $i++) {
                if ($dernier[$i] != null && !empty($dernier[$i])) {
                    $data = new PersonnelGestionConge([
                        'dernier' => $dernier[$i],
                        'prochain' => $dateProchainDepartConge[$i],
                        'jourPris' => $nombreJourPris[$i],
                        "personnel" => $personnel->id,
                    ]);
                    $data->save();
                }
            }
        }

        if (!empty($request->get('dateDernierDepartConge_edit')) && !empty($request->get('dateProchainDepartConge_edit'))) {
            $dernier = $request->get('dateDernierDepartConge_edit');
            $dateProchainDepartConge = $request->get('dateProchainDepartConge_edit');
            $nombreJourPris = $request->get('nombreJourPris_edit');
            $conge_id = $request->get('conge_id');

            for ($i = 0; $i < count($dernier); $i++) {
                if ($dernier[$i] != null && !empty($dernier[$i])) {
                    $data = PersonnelGestionConge::find($conge_id[$i]);
                    $data->dernier = $dernier[$i];
                    $data->prochain = $dateProchainDepartConge[$i];
                    $data->jourPris = $nombreJourPris[$i];
                    $data->save();
                }
            }
        }


        return redirect('/personnel-liste')->with('success', 'Personnel enregistré!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return Response
     */
    public function destroy($id)
    {
        $personnel = Personnel::find($id);
        $personnel->delete();
        return response()->json([
            'message' => 'Good!'
        ]);
        //return redirect('/personnel-liste')->with('success', 'Personnel supprimé!');
    }

    public function destroyCongeItem($id)
    {
        $data = PersonnelConge::find($id);
        $data->delete();
        return response()->json([
            'message' => 'Good!'
        ]);
    }
}
