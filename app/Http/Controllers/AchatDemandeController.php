<?php

namespace App\Http\Controllers;

use App\Models\AchatDemande;
use App\Models\AchatFournisseur;
use App\Models\AchatFournisseurConsulte;
use App\Models\Centre;
use App\Models\Centre_regional;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class AchatDemandeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $user = session('user');
        $fournisseurs = AchatFournisseur::where('localisation_id', Auth::user()->localisation_id)->get();
        $numeroDA = DB::table('achat_demandes')->where('localisation_id', Auth::user()->localisation_id)->max('id') + 1;
        $centres = Centre::where('localisation_id', Auth::user()->localisation_id)->get();
        $centres_regionaux = Centre_regional::where('localisation_id', Auth::user()->localisation_id)->get();

        return view('achat.demande.index', compact('fournisseurs', 'numeroDA', 'centres', 'centres_regionaux', 'user'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
    }


    public function liste()
    {
        $demandes = AchatDemande::where('localisation_id', Auth::user()->localisation_id)->get();
        $achatsRefuses = AchatDemande::where('localisation_id', Auth::user()->localisation_id)->get()->where("demande", "=", "Demande refusée");
        $achatsValides = AchatDemande::where('localisation_id', Auth::user()->localisation_id)->get()->where("demande", "=", "Demande validée");
        $achatsEnCours = AchatDemande::where('localisation_id', Auth::user()->localisation_id)->get()->where("demande", "=", "Demande en cours");
        return view('achat.demande.liste', compact('demandes', 'achatsRefuses', 'achatsValides', 'achatsEnCours'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @return Response
     */
    public function store(Request $request)
    {
        $type = !empty($request->get('type_demande')) ? implode(",", $request->get('type_demande')) : null;
        $data = new AchatDemande([
            'date' => $request->get('date'),
            'identite' => $request->get('identite'),
            'service' => $request->get('service'),
            'nom_demandeur' => $request->get('nom_demandeur'),
            'telephone_demandeur' => $request->get('telephone_demandeur'),
            'adresse_electronique_demandeur' => $request->get('adresse_electronique_demandeur'),
            'objet_achat' => $request->get('objet_achat'),
            'sous_famille_achat' => $request->get('sous_famille_achat'),
            'famille_achat' => $request->get('famille_achat'),
            'fournisseur_retenu' => $request->get('fournisseur_retenu'),
            'montant_retenu' => $request->get('montant_retenu'),
            'type_demande' => $type,
            'nature_demande' => $request->get('nature_demande'),
            'numero_da' => $request->get('numero_da'),
            'centre' => $request->get('centre'),
            'centre_regional' => $request->get('centre_regional'),
            'demande' => $request->get('demande'),
            // 'type_demande'  => $request->get('type_demande'),
        ]);
        $data->save();
        $fournisseurs = $request->get('fournisseur');
        $cotation_techniques = $request->get('cotation_technique');
        $prix_proposes = $request->get('prix_propose');
        $choix = $request->get('choix');

        for ($i = 0; $i < count($fournisseurs); $i++) {
            if (!empty($fournisseurs[$i])) {
                $fournisseur = new AchatFournisseurConsulte([
                    'fournisseur' => $fournisseurs[$i],
                    'cotation_technique' => $cotation_techniques[$i],
                    'prix_propose' => $prix_proposes[$i],
                    'choix' => $choix[$i],
                    'achat_demandes_fk' => $data->id,
                ]);
                $fournisseur->save();
            }
        }
        return redirect('achat-demande-liste')->with('success', 'Enregistrement effectué!');
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
        //$demande = AchatDemande::with('fournisseurs')->with('chauffeurs')->find($id);
        $demande = AchatDemande::with('fournisseurs')->where('localisation_id', Auth::user()->localisation_id)->find($id);
        $consultes = AchatFournisseurConsulte::with('fournisseurs')->get()->where('achat_demandes_fk', '=', $id);
        $fournisseurs = AchatFournisseur::where('localisation_id', Auth::user()->localisation_id)->get();
        $centres = Centre::where('localisation_id', Auth::user()->localisation_id)->get();
        $centres_regionaux = Centre_regional::where('localisation_id', Auth::user()->localisation_id)->get();
        return view('achat.demande.edit', compact('demande', 'fournisseurs', 'consultes', 'centres', 'centres_regionaux'));
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
        $data = AchatDemande::where('localisation_id', Auth::user()->localisation_id)->find($id);
        $data->date = $request->get('date');
        $data->identite = $request->get('identite');
        $data->service = $request->get('service');
        $data->nom_demandeur = $request->get('nom_demandeur');
        $data->telephone_demandeur = $request->get('telephone_demandeur');
        $data->adresse_electronique_demandeur = $request->get('adresse_electronique_demandeur');
        $data->objet_achat = $request->get('objet_achat');
        $data->sous_famille_achat = $request->get('sous_famille_achat');
        $data->famille_achat = $request->get('famille_achat');
        $data->fournisseur_retenu = $request->get('fournisseur_retenu');
        $data->montant_retenu = $request->get('montant_retenu');
        if (!empty($request->get('type_demande'))) $data->type_demande = implode(",", $request->get('type_demande'));
        $data->nature_demande = $request->get('nature_demande');
        $data->centre = $request->get('centre');
        $data->centre_regional = $request->get('centre_regional');
        $data->demande = $request->get('demande');
        $data->save();

        $fournisseurs = $request->get('fournisseur');
        $cotation_techniques = $request->get('cotation_technique');
        $prix_proposes = $request->get('prix_propose');
        $choix = $request->get('choix');
        $ids = $request->get('id');

        if ($request->get('fournisseur')) {

            for ($i = 0; $i < count($fournisseurs); $i++) {
                if (!empty($fournisseurs[$i])) {
                    $fournisseur = AchatFournisseurConsulte::find($ids[$i]);
                    $fournisseur->fournisseur = $fournisseurs[$i];
                    $fournisseur->cotation_technique = $cotation_techniques[$i];
                    $fournisseur->prix_propose = $prix_proposes[$i];
                    $fournisseur->choix = $choix[$i];
                    $fournisseur->achat_demandes_fk = $id;
                    $fournisseur->save();
                }
            }
        }

        //nouveau
        $fournisseurs_n = $request->get('fournisseur_n');
        $cotation_techniques_n = $request->get('cotation_technique_n');
        $prix_proposes_n = $request->get('prix_propose_n');
        $choix_n = $request->get('choix_n');
        for ($i = 0; $i < count($fournisseurs_n); $i++) {
            if (!empty($fournisseurs_n[$i])) {
                $fournisseur = new AchatFournisseurConsulte([
                    'fournisseur' => $fournisseurs_n[$i],
                    'cotation_technique' => $cotation_techniques_n[$i],
                    'prix_propose' => $prix_proposes_n[$i],
                    'choix' => $choix_n[$i],
                    'achat_demandes_fk' => $id,
                ]);
                $fournisseur->save();
            }
        }

        return redirect('achat-demande-liste')->with('success', 'Enregistrement modifié!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return Response
     */
    public function destroy($id)
    {
        $demande = AchatDemande::where('localisation_id', Auth::user()->localisation_id)->find($id);
        $demande->delete();
        return redirect('achat-demande-liste')->with('success', 'Enregistrement supprimé!');
    }
}
