<?php

namespace App\Http\Controllers;

use App\Models\CaisseServiceOperatrice;
use App\Models\CaisseVideoSurveillance;
use App\Models\Centre;
use App\Models\Centre_regional;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class CaisseVideoSurveillanceController extends Controller
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
        $operatrices = CaisseServiceOperatrice::with('operatrice')->get();
        return view('/caisse/video-surveillance.index',
            compact('operatrices', 'centres', 'centres_regionaux'));
    }

    public function liste(Request $request)
    {
        $debut = $request->get("debut");
        $fin = $request->get("fin");
        $surveillances = CaisseVideoSurveillance::orderBy('id', 'desc')->get();
        if (isset($debut) && isset($fin)) {
            $surveillances = CaisseVideoSurveillance::whereBetween('date', [$debut, $fin])->get();
        }
        return view('/caisse/video-surveillance.liste',
            compact('surveillances'));
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
        $video = new CaisseVideoSurveillance([
            'date' => $request->get('date'),
            'heureDebut' => $request->get('heureDebut'),
            'heureFin' => $request->get('heureFin'),
            'numeroBox' => $request->get('numeroBox'),
            'operatrice' => $request->get('operatrice'),
            'securipack' => $request->get('securipack'),
            'sacjute' => $request->get('sacjute'),
            'numeroScelle' => $request->get('numeroScelle'),
            'ecart' => $request->get('ecart'),
            'erreur' => $request->get('erreur'),
            'absence' => $request->get('absence'),
            'commentaire' => $request->get('commentaire'),
            'centre' => $request->get('centre'),
            'centre_regional' => $request->get('centre_regional'),
            'numero_bord' => $request->get('numero_bord'),
            'remarque' => $request->get('remarque'),
        ]);
        $video->save();
        return redirect('/caisse-video-surveillance-liste')->with('success', 'Enregistrement effectué!');
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
        $video = CaisseVideoSurveillance::find($id);
        $operatrices = CaisseServiceOperatrice::with('operatrice')->get();
        return view('/caisse/video-surveillance.edit',
            compact('operatrices', 'video', 'centres', 'centres_regionaux'));
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
        $caisse = CaisseVideoSurveillance::find($id);
        $caisse->date = $request->get('date');
        $caisse->heureDebut = $request->get('heureDebut');
        $caisse->heureFin = $request->get('heureFin');
        $caisse->numeroBox = $request->get('numeroBox');
        $caisse->operatrice = $request->get('operatrice');
        $caisse->securipack = $request->get('securipack');
        $caisse->sacjute = $request->get('sacjute');
        $caisse->numeroScelle = $request->get('numeroScelle');
        $caisse->ecart = $request->get('ecart');
        $caisse->erreur = $request->get('erreur');
        $caisse->absence = $request->get('absence');
        $caisse->commentaire = $request->get('commentaire');
        $caisse->centre = $request->get('centre');
        $caisse->centre_regional = $request->get('centre_regional');
        $caisse->numero_bord = $request->get('numero_bord');
        $caisse->remarque = $request->get('remarque');
        $caisse->save();
        return redirect('/caisse-video-surveillance-liste')->with('success', 'Enregistrement effectué!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id)
    {
        $video = CaisseVideoSurveillance::find($id);
        $video->delete();
        return redirect('/caisse-video-surveillance-liste')->with('success', 'Suppression effectuée!');
    }
}
