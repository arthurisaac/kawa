<?php

namespace App\Http\Controllers;

use App\Models\HeureSupp;
use App\Models\Personnel;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class SaisieHSController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $personnels = Personnel::all();
        return view('securite/saisie.index', compact('personnels'));
    }

    public function liste()
    {
        $saisies = HeureSupp::with('personnels')->get();
        return view('securite/saisie.liste', compact('saisies'));
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
        $saisie = new HeureSupp([
            'date' => $request->get('date'),
            'typeDate' => $request->get('typeDate'),
            'idPersonnel' => $request->get('idPersonnel'),
            'heureArrivee' => $request->get('heureArrivee'),
            'heureArrivee1' => $request->get('heureArrivee1'),
            'heureArrivee2' => $request->get('heureArrivee2'),
            'heureArrivee3' => $request->get('heureArrivee3'),
            'heureDepart' => $request->get('heureDepart'),
            'heureDepart1' => $request->get('heureDepart1'),
            'heureDepart2' => $request->get('heureDepart2'),
            'heureDepart3' => $request->get('heureDepart3'),
        ]);
        $saisie->save();
        return redirect('/saisie-liste')->with('success', 'Saisie enregistré!');
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
        $saisie = HeureSupp::find($id);
        $personnels = Personnel::all();
        return view('securite.saisie.edit', compact('personnels', 'saisie'));
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
        $saisie = HeureSupp::find($id);
        $saisie->date = $request->get('date');
        $saisie->typeDate = $request->get('typeDate');
        $saisie->idPersonnel = $request->get('idPersonnel');
        $saisie->heureArrivee = $request->get('heureArrivee');
        $saisie->heureArrivee1 = $request->get('heureArrivee1');
        $saisie->heureArrivee2 = $request->get('heureArrivee2');
        $saisie->heureArrivee3 = $request->get('heureArrivee3');
        $saisie->heureDepart = $request->get('heureDepart');
        $saisie->heureDepart1 = $request->get('heureDepart1');
        $saisie->heureDepart2 = $request->get('heureDepart2');
        $saisie->heureDepart3 = $request->get('heureDepart3');

        $saisie->save();
        return redirect('/saisie-liste')->with('success', 'Enregistrement modifiée!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id)
    {
        $saisie = HeureSupp::find($id);
        $saisie->delete();
        return redirect('/saisie-liste')->with('success', 'Enregistrement modifiée!');
    }
}
