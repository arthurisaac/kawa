<?php

namespace App\Http\Controllers;

use App\CaisseServiceOperatrice;
use App\CaisseVideoSurveillance;
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
        $operatrices = CaisseServiceOperatrice::with('operatrice')->get();
        return view('/caisse/video-surveillance.index',
            compact('operatrices'));
    }

    public function liste()
    {
        $surveillances = CaisseVideoSurveillance::all();
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
        ]);
        $video->save();
        return redirect('/caisse-video-surveillance')->with('success', 'Enregistrement effectué!');
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
        $video = CaisseVideoSurveillance::find($id);
        $operatrices = CaisseServiceOperatrice::with('operatrice')->get();
        return view('/caisse/video-surveillance.edit',
            compact('operatrices', 'video'));
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
        $video = CaisseVideoSurveillance::find($id);
        $video->delete();
        return redirect('/caisse-video-surveillance-liste')->with('success', 'Suppression effectuée!');
    }
}
