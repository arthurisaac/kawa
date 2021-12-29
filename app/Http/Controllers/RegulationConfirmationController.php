<?php

namespace App\Http\Controllers;

use App\Models\RegulationConfirmationClient;
use App\Models\SiteDepartTournee;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;

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
            ->where('localisation_id', Auth::user()->localisation_id)->get();
        return view('.regulation.confirmation.index', compact('sites'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function liste()
    {
        $regulations = RegulationConfirmationClient::with('site')->where('localisation_id', Auth::user()->localisation_id)->get();
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
            'confirmation' => $request->get('confirmation'),
            'remarque' => $request->get('remarque'),
            'dateReception' => $request->get('date'),
            'lieu' => $request->get('lieu'),
            'devise' => $request->get('devise'),
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
        $regulation = RegulationConfirmationClient::with('site')->where('localisation_id', Auth::user()->localisation_id)->find($id);
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
        $data = RegulationConfirmationClient::where('localisation_id', Auth::user()->localisation_id)->find($id);

        $data->bordereau = $request->get('bordereau');
        $data->dateReception = $request->get('date');
        $data->lieu = $request->get('lieu');
        $data->confirmation = $request->get('confirmation');
        $data->remarque = $request->get('remarque');
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
        $data = SiteDepartTournee::where('localisation_id', Auth::user()->localisation_id)->find($id);
        if ($data) $data->delete();
        return redirect("/regulation-confirmation-liste")->with('success', 'Supprimé avec succès');
        /*return response()->json([
            'message' => 'Good!'
        ]);*/
    }
}
