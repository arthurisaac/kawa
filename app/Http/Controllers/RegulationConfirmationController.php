<?php

namespace App\Http\Controllers;

use App\Models\RegulationConfirmationClient;
use App\Models\SiteDepartTournee;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class RegulationConfirmationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $sites = SiteDepartTournee::with('sites')
            ->with('tournees')
            ->whereNotNull('bordereau')
            ->orderBy('site')
            ->get();
        return view('.regulation.confirmation.index', compact('sites'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function liste()
    {
        $regulations = RegulationConfirmationClient::with('site')->get();
        return view('.regulation.confirmation.liste', compact('regulations'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return Response
     */
    public function store(Request $request)
    {
        $data = new RegulationConfirmationClient([
            'bordereau' => $request->get('bordereau'),
            'dateReception' => $request->get('date'),
            'lieu' => $request->get('lieu')
        ]);
        $data->save();
        return redirect("/regulation-confirmation-liste")->with('success', 'Enregistré avec succès');
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
        $sites = SiteDepartTournee::with('sites')
            ->with('tournees')
            ->whereNotNull('bordereau')
            ->orderBy('site')
            ->get();
        $regulation = RegulationConfirmationClient::with('site')->find($id);
        return view('.regulation.confirmation.edit', compact('sites', 'regulation'));
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
        $data = RegulationConfirmationClient::find($id);

        $data->bordereau = $request->get('bordereau');
        $data->dateReception = $request->get('date');
        $data->lieu = $request->get('lieu');
        $data->save();
        return redirect("/regulation-confirmation-liste")->with('success', 'Enregistré avec succès');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id)
    {
        $data = SiteDepartTournee::find($id);
        if ($data) $data->delete();
        return redirect("/regulation-confirmation-liste")->with('success', 'Supprimé avec succès');
        /*return response()->json([
            'message' => 'Good!'
        ]);*/
    }
}
