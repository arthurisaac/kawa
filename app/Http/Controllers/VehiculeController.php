<?php

namespace App\Http\Controllers;

use App\Models\Centre;
use App\Models\Centre_regional;
use App\Models\Vehicule;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\DB;
use PhpParser\Builder;

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
        $personnels = DB::table('personnels')->where('transport', '!=', null)->get();
        return view('transport.vehicule.index',
            compact('vehicule','centres', 'centres_regionaux', 'personnels'));
    }

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function liste(Request $request)
    {
        $centre_regional = $request->get("centre_regional");
        $centre = $request->get("centre");
        $type = $request->get("type");
        $marque = $request->get("marque");

        if (isset($centre_regional)){
            $vehicules = Vehicule::where('centreRegional',$centre_regional)->get();
        }elseif (isset($centre)){
            $vehicules = Vehicule::where('centre', $centre)->get();
        }elseif(isset($type)){
            $vehicules = Vehicule::where('type', $type)->get();
        }elseif(isset($marque)){
            $vehicules = Vehicule::where('marque', $marque)->get();
        }elseif (isset($centre) && isset($centre_regional)){
            $vehicules = Vehicule::where('centre',$centre)
                ->AndWhere('centreRegional', 'like',$centre_regional)
                ->get();
        }elseif (isset($centre) && isset($type)){
            $vehicules = Vehicule::where('centre',$centre)
                ->where('type',$type)
                ->get();
        }elseif (isset($centre) && isset($marque)){
            $vehicules = Vehicule::where('centre',$centre)
                ->where('marque',$marque)
                ->get();
        }elseif (isset($centre) && isset($centre_regional) && isset($type)){
            $vehicules = Vehicule::where('centre',$centre)
                ->where('centreRegional',$centre_regional)
                ->where('type',$type)
                ->get();
        }elseif (isset($centre) && isset($centre_regional) && isset($type) && isset($marque) ){
            $vehicules = Vehicule::where('centre',$centre)
                ->where('centreRegional', $centre_regional)
                ->AndWhere('type', 'like', $type)
                ->AndWhere('marque',  $marque)
                ->get();
        }else{
            $vehicules = Vehicule::all();
        }
        $centres = Centre::all();

        $vls = DB::table('vehicules')->where('type', 'VL')->get();
        $vbs = DB::table('vehicules')->where('type', 'VB')->get();
        $motos = DB::table('vehicules')->where('type', 'moto')->get();

        $centres_regionaux = Centre_regional::all();
        $types = DB::table('vehicules')->select('type')->distinct('type')->get();
        $marques = DB::table('vehicules')->select('marque')->distinct('marque')->get();
        return view('transport/vehicule.liste', compact('vbs', 'vls', 'motos', 'vehicules', 'centres', 'centres_regionaux', 'marques', 'types'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return void
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
        return redirect('/vehicule-liste')->with('success', 'Véhicule enregistré!');
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return void
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
        $vehicule = Vehicule::with('chauffeurTitulaires')->with('chauffeurSuppleants')->find($id);
        $centres = Centre::all();
        $centres_regionaux = Centre_regional::all();
        $personnels = DB::table('personnels')->where('transport', '!=', null)->get();
        return view('transport.vehicule.edit',
            compact('vehicule','centres', 'centres_regionaux', 'personnels'));
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
        $vehicule = Vehicule::find($id);
        if($request->file()) {
            $fileName = time().'_'.$request->photo->getClientOriginalName();
            $request->file('photo')->storeAs('uploads', $fileName, 'public');
            $photo = $fileName;
            $vehicule->photo = $photo;
        }


        $vehicule->immatriculation = $request->get('immatriculation');

        $vehicule->marque = $request->get('marque');
        $vehicule->type = $request->get('type');
        $vehicule->code = $request->get('code');
        $vehicule->num_chassis = $request->get('num_chassis');
        $vehicule->DPMC = $request->get('DPMC');
        $vehicule->dateAcquisition = $request->get('dateAcquisition');
        $vehicule->centre = $request->get('centre');
        $vehicule->centreRegional = $request->get('centreRegional');
        $vehicule->chauffeurTitulaire = $request->get('chauffeurTitulaire');
        $vehicule->chauffeurSuppleant = $request->get('chauffeurSuppleant');
        $vehicule->save();
        return redirect('/vehicule-liste')->with('success', 'Véhicule modififé!');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id)
    {
        $vehicule = Vehicule::find($id);
        $vehicule->delete();
        return redirect('/vehicule-liste')->with('success', 'Véhicule supprimé!');
    }
}
