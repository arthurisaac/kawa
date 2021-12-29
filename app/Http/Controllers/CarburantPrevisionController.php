<?php

namespace App\Http\Controllers;

use App\Models\CarburantPrevision;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CarburantPrevisionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $carburants = CarburantPrevision::where('localisation_id', Auth::user()->localisation_id)->get();
        return view('/transport/carburant-prevision.index',
            compact('carburants'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $carburant = new CarburantPrevision([
            'dateDu' => $request->get('dateDu'),
            'dateAu' => $request->get('dateAu'),
            'axe' => $request->get('axe'),
            'typeVehicule' => $request->get('typeVehicule'),
            'distance' => $request->get('distance'),
            'conso100' => $request->get('conso100'),
            'litrage' => $request->get('litrage'),
            'coutCarburant' => $request->get('coutCarburant'),
            'dessSemaine' => $request->get('dessSemaine'),
            'coutSemaine' => $request->get('coutSemaine'),
            'dessMois' => $request->get('dessMois'),
            'coutMois' => $request->get('coutMois'),
        ]);
        $carburant->save();
        return redirect('/carburant-prevision')->with('success', 'Carburant prévision enregistré!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
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
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
