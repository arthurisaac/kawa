<?php

namespace App\Http\Controllers;

use App\Models\Centre;
use App\Models\Centre_regional;
use App\Models\RegulationService;
use App\Models\Personnel;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class RegulationServiceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $personnels = Personnel::all();
        $centres = Centre::all();
        $centres_regionaux = Centre_regional::all();
        return view('/regulation.service.index',
            compact('personnels', 'centres', 'centres_regionaux'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function liste()
    {
        $services = RegulationService::with('chargeRegulations')->with('chargeRegulationAdjointes')->get();
        return view('/regulation.service.liste',
            compact('services'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
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
            'chargeeRegulationAdjointHPS' => $request->get('chargeeRegulationAdjointHPS'),
            'chargeeRegulationAdjointHFS' => $request->get('chargeeRegulationAdjointHFS'),
        ]);
        $service->save();
        return redirect('/regulation-service')->with('success', 'Service enregistré!');
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
        $personnels = Personnel::all();
        $centres = Centre::all();
        $centres_regionaux = Centre_regional::all();
        $services = RegulationService::find($id)->with('chargeCaisses')->with('chargeCaisseAdjoints')->get();
        $service = $services[0];
        return view('/regulation.service.edit',
            compact('personnels', 'centres', 'centres_regionaux', 'service'));
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
        $service = RegulationService::find($id);
        $service->date = $request->get('date');
        $service->centre = $request->get('centre');
        $service->centreRegional = $request->get('centreRegional');
        $service->chargeeRegulation = $request->get('chargeeRegulation');
        $service->chargeeRegulationHPS = $request->get('chargeeRegulationHPS');
        $service->chargeeRegulationHFS = $request->get('chargeeRegulationHFS');
        $service->chargeeRegulationAdjoint = $request->get('chargeeRegulationAdjoint');
        $service->chargeeRegulationAdjointHPS = $request->get('chargeeRegulationAdjointHPS');
        $service->chargeeRegulationAdjointHFS = $request->get('chargeeRegulationAdjointHFS');
        $service->save();
        return redirect('/regulation-service-liste')->with('success', 'Service enregistré!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id)
    {
        $service = RegulationService::find($id);
        $service->delete();
        return redirect('/regulation-service-liste')->with('success', 'Service supprimé!');
    }
}
