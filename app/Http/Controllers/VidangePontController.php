<?php

namespace App\Http\Controllers;

use App\Models\Centre;
use App\Models\Centre_regional;
use App\Models\Vehicule;
use App\Models\VidangeHuilePont;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;

class VidangePontController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $vehicules = Vehicule::where('localisation_id', Auth::user()->localisation_id)->get();
        $centres = Centre::where('localisation_id', Auth::user()->localisation_id)->get();
        $centres_regionaux = Centre_regional::where('localisation_id', Auth::user()->localisation_id)->get();
        $vidanges = VidangeHuilePont::where('localisation_id', Auth::user()->localisation_id)->get();
        return view('/transport/entretien-vehicule/vidange-pont.index',
            compact('vehicules', 'centres', 'centres_regionaux', 'vidanges'));
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
        $vidanges = new VidangeHuilePont([
            'date' => $request->get('date'),
            'idVehicule' => $request->get('idVehicule'),
            'kmActuel' => $request->get('kmActuel'),
            'prochainKm' => $request->get('prochainKm'),
            'huilePont' => $request->get('huilePont'),
            'huilePontMarque' => $request->get('huilePontMarque'),
            'huilePontKm' => $request->get('huilePontKm'),
            'huilePontFournisseur' => $request->get('huilePontFournisseur'),
            'huilePontmontant' => $request->get('huilePontmontant'),
        ]);
        $vidanges->save();
        //return redirect('/vidange-pont')->with('success', 'Vidange pont enregistrée!');
        return redirect()->back()->with('success', 'Vidange pont enregistrée!');
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
        $vidange = VidangeHuilePont::where('localisation_id', Auth::user()->localisation_id)->find($id);
        return view('transport.entretien-vehicule.vidange-pont.edit', compact('vidange'));
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
        $vidanges = VidangeHuilePont::where('localisation_id', Auth::user()->localisation_id)->find($id);
        $vidanges->kmActuel = $request->get('kmActuel');
        $vidanges->prochainKm = $request->get('prochainKm');
        $vidanges->save();
        return redirect("/entretien-vehicule")->with('success', 'Vidange pont enregistrée!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return JsonResponse
     */
    public function destroy($id)
    {
        $data = VidangeHuilePont::where('localisation_id', Auth::user()->localisation_id)->find($id);
        if ($data) {
            $data->delete();
        }
        return \response()->json([
            "message" => "good"
        ]);
    }
}
