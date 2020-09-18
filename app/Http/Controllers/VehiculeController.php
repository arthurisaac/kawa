<?php

namespace App\Http\Controllers;

use App\Centre;
use App\Centre_regional;
use App\Personnel;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Vehicule;

class VehiculeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $vehicule = Vehicule::all();
        $centres = Centre::all();
        $centres_regionaux = Centre_regional::all();
        $personnels = Personnel::all();
        return view('transport/vehicule.index',
            compact('vehicule','centres', 'centres_regionaux', 'personnels'));
    }

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function liste()
    {
        $vehicules = Vehicule::all();
        return view('transport/vehicule.liste', compact('vehicules'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return Response
     */
    public function store(Request $request)
    {
        $photo = 'user.png';
        if($request->file()) {
            $fileName = time().'_'.$request->photo->getClientOriginalName();
            $request->file('photo')->storeAs('uploads', $fileName, 'public');
            $photo = $fileName;
        }

        $vehicule = new Vehicule([
            'immatriculation' => $request->get('immatriculation'),
            'photo' => $photo, // TODO
            'marque' => $request->get('marque'),
            'type' => $request->get('type'),
            'code' => $request->get('code'),
            'num_chassis' => $request->get('num_chassis'),
            'DPMC' => $request->get('DPMC'),
            'dateAcquisition' => $request->get('dateAcquisition'),
            'centre' => $request->get('centre'),
            'centreRegional' => $request->get('centreRegional'),
            'chauffeurTitulaire' => $request->get('chauffeurTitulaire'),
            'chauffeurSuppleant' => $request->get('chauffeurSuppleant'),
        ]);
        $vehicule->save();
        return redirect('/vehicule')->with('success', 'Véhicule enregistré!');
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
        //
    }
}
