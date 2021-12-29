<?php

namespace App\Http\Controllers;

use App\Models\Centre;
use App\Models\Centre_regional;
use App\Models\Personnel;
use App\Models\RegulationService;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;

class RegulationServiceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $personnels = Personnel::where('localisation_id', Auth::user()->localisation_id)->get();
        $centres = Centre::where('localisation_id', Auth::user()->localisation_id)->get();
        $centres_regionaux = Centre_regional::where('localisation_id', Auth::user()->localisation_id)->get();
        return view('/regulation.service.index',
            compact('personnels', 'centres', 'centres_regionaux'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @param Request $request
     * @return Response
     */
    public function liste(Request $request)
    {
        $debut = $request->get("debut");
        $fin = $request->get("fin");
        $services = RegulationService::with('chargeRegulations')->with('chargeRegulationAdjointes')->where('localisation_id', Auth::user()->localisation_id)->get();
        if (isset($debut) && isset($fin)) {
            $services = RegulationService::with('chargeRegulations')
                ->with('chargeRegulationAdjointes')
                ->whereBetween('date', [$debut, $fin])
                ->where('localisation_id', Auth::user()->localisation_id)->get();
        }
        return view('/regulation.service.liste',
            compact('services'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return Response
     */
    public function store(Request $request)
    {
        $service = new RegulationService([
            'date' => $request->get('date'),
            'centre' => $request->get('centre'),
            'centreRegional' => $request->get('centreRegional'),
            'chargeeRegulation' => $request->get('chargeeRegulation'),
            'chargeeRegulationHPS' => $request->get('chargeeRegulationHPS'),
            'chargeeRegulationHFS' => $request->get('chargeeRegulationHFS'),
            'chargeeRegulationAdjointe' => $request->get('chargeeRegulationAdjointe'),
            'chargeeRegulationAdjointeHPS' => $request->get('chargeeRegulationAdjointeHPS'),
            'chargeeRegulationAdjointeHFS' => $request->get('chargeeRegulationAdjointeHFS'),
        ]);
        $service->save();
        return redirect('/regulation-service-liste')->with('success', 'Service enregistré!');
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
        $personnels = Personnel::where('localisation_id', Auth::user()->localisation_id)->get();
        $centres = Centre::where('localisation_id', Auth::user()->localisation_id)->get();
        $centres_regionaux = Centre_regional::where('localisation_id', Auth::user()->localisation_id)->get();
        $service = RegulationService::with('chargeRegulations')->with('chargeRegulationAdjointes')->where('localisation_id', Auth::user()->localisation_id)->find($id);
        //$service = $services[0];
        return view('/regulation.service.edit',
            compact('personnels', 'centres', 'centres_regionaux', 'service', 'id'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return Response
     */
    public function update(Request $request, $id)
    {
        $service = RegulationService::where('localisation_id', Auth::user()->localisation_id)->find($id);
        $service->centre = $request->get('centre');
        $service->centreRegional = $request->get('centreRegional');
        $service->chargeeRegulation = $request->get('chargeeRegulation');
        $service->chargeeRegulationHPS = $request->get('chargeeRegulationHPS');
        $service->chargeeRegulationHFS = $request->get('chargeeRegulationHFS');
        $service->chargeeRegulationAdjointe = $request->get('chargeeRegulationAdjointe');
        $service->chargeeRegulationAdjointeHPS = $request->get('chargeeRegulationAdjointeHPS');
        $service->chargeeRegulationAdjointeHFS = $request->get('chargeeRegulationAdjointeHFS');
        $service->save();
        return redirect('/regulation-service-liste')->with('success', 'Service enregistré!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return Response
     */
    public function destroy($id)
    {
        $service = RegulationService::where('localisation_id', Auth::user()->localisation_id)->find($id);
        $service->delete();
        return redirect('/regulation-service-liste')->with('success', 'Service supprimé!');
    }
}
