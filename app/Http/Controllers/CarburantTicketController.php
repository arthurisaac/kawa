<?php

namespace App\Http\Controllers;

use App\Models\CarburantCarte;
use App\Models\CarburantTicket;
use App\Models\Centre;
use App\Models\Centre_regional;
use App\Models\Vehicule;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;

class CarburantTicketController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $vehicules = Vehicule::where('localisation_id', Auth::user()->localisation_id)->get();
        $cartes = CarburantCarte::where('localisation_id', Auth::user()->localisation_id)->get();
        $centres = Centre::where('localisation_id', Auth::user()->localisation_id)->get();
        $centres_regionaux = Centre_regional::where('localisation_id', Auth::user()->localisation_id)->get();
        return view('/transport/ticket-carburant.index',
            compact('vehicules','cartes', 'centres', 'centres_regionaux'));
    }

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function liste(Request $request)
    {
        $debut = $request->get("debut");
        $fin = $request->get("fin");
        $q = $request->get('q');

        $carburants = CarburantTicket::where('localisation_id', Auth::user()->localisation_id)->get();
        if (isset($debut) && isset($fin)) {
            $carburants = CarburantTicket::whereBetween('date', [$debut, $fin])->get();
        }
        if (isset($q)) {
            $carburants = CarburantTicket::where('centre', $q)
                ->orWhere('centre_regional', 'like', '%' . $q . '%')
                ->orWhere('numeroTicket', 'like', '%' . $q . '%')
                ->orWhere('numeroCarteCarburant', 'like', '%' . $q . '%')
                ->orWhere('soldePrecedent', 'like', '%' . $q . '%')
                ->where('localisation_id', Auth::user()->localisation_id)
                ->get();
        }
        return view('/transport/ticket-carburant.liste',
            compact('carburants'));
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
        $carburant = new CarburantTicket([
            'date' => $request->get('date'),
            'heure' => $request->get('heure'),
            'lieu' => $request->get('lieu'),
            'numeroTicket' => $request->get('numeroTicket'),
            'numeroCarteCarburant' => $request->get('numeroCarteCarburant'),
            'idVehicule' => $request->get('idVehicule'),
            'solde' => $request->get('solde'),
            'soldePrecedent' => $request->get('soldePrecedent'),
            'utilisation' => $request->get('utilisation'),
            'kilometrage' => $request->get('kilometrage'),
            'litrage' => $request->get('litrage'),
            'centre' => $request->get('centre'),
            'centre_regional' => $request->get('centre_regional'),
        ]);
        $carburant->save();
        return redirect('/ticket-carburant-liste')->with('success', 'Ticket carburant enregistré!');
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
        $carburant = CarburantTicket::where('localisation_id', Auth::user()->localisation_id)->find($id);
        $vehicules = Vehicule::where('localisation_id', Auth::user()->localisation_id)->get();
        $cartes = CarburantCarte::where('localisation_id', Auth::user()->localisation_id)->get();
        $centres = Centre::where('localisation_id', Auth::user()->localisation_id)->get();
        $centres_regionaux = Centre_regional::where('localisation_id', Auth::user()->localisation_id)->get();
        return view('transport.ticket-carburant.edit',
            compact('vehicules','cartes', 'centres', 'centres_regionaux', 'id', 'carburant'));
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
        $carburant = CarburantTicket::where('localisation_id', Auth::user()->localisation_id)->find($id);
        if ($carburant) {
            $carburant->date = $request->get('date');
            $carburant->heure = $request->get('heure');
            $carburant->lieu = $request->get('lieu');
            $carburant->numeroTicket = $request->get('numeroTicket');
            $carburant->numeroCarteCarburant = $request->get('numeroCarteCarburant');
            $carburant->idVehicule = $request->get('idVehicule');
            $carburant->solde = $request->get('solde');
            $carburant->soldePrecedent = $request->get('soldePrecedent');
            $carburant->utilisation = $request->get('utilisation');
            $carburant->kilometrage = $request->get('kilometrage');
            $carburant->litrage = $request->get('litrage');
            $carburant->centre = $request->get('centre');
            $carburant->centre_regional = $request->get('centre_regional');
        }
        $carburant->save();
        return redirect('/ticket-carburant-liste')->with('success', 'Ticket carburant enregistré!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id)
    {
        $data = CarburantTicket::where('localisation_id', Auth::user()->localisation_id)->find($id);
        if ($data) $data->delete();
        return response()->json([
            'message' => 'Good!'
        ]);
    }
}
