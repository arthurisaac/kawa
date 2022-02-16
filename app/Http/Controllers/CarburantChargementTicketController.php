<?php

namespace App\Http\Controllers;

use App\Models\CarburantCarte;
use App\Models\LogistiqueChargementCarte;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class CarburantChargementTicketController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $chargements = LogistiqueChargementCarte::all();
        $cartes = CarburantCarte::all();
        return view('/logistique/carburant/carb-chargement-ticket.index',
            compact('chargements', 'cartes'));
    }

    public function carbCharg()
    {
        $chargements = LogistiqueChargementCarte::all();
        $cartes = CarburantCarte::all();
        return view('/logistique/carburant/carb-chargement.index',
            compact('chargements', 'cartes'));
    }

    public function carbTicket()
    {
        $cartes = CarburantCarte::all();
        return view('/logistique/carburant/carb-ticket.index',
            compact('cartes'));
    }

    public function carbVehicule()
    {
        $cartes = CarburantCarte::all();
        return view('/logistique/carburant/carb-vehicule.index',
            compact('cartes'));
    }

    public function etatCarburant()
    {
        $cartes = CarburantCarte::all();
        return view('/logistique/carburant/etat-carburant.index',
            compact('cartes'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        $cartes = CarburantCarte::all();
        return view('/logistique/carburant/carb-chargement-ticket.create',
            compact('cartes'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @return Response
     */
    public function store(Request $request)
    {
        $chargement = new \App\Models\LogistiqueChargementCarte([
            'carte' => $request->get('carte'),
            'date' => $request->get('date'),
            'somme' => $request->get('somme'),
            'service' => $request->get('service'),
        ]);
        $chargement->save();
        return redirect('/carb-chargement-ticket-create')->with('success', 'Chargement Carte carburant enregistré!');
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
        $chargement = \App\LogistiqueChargementCarte::find($id);
        $cartes = CarburantCarte::all();
        return view('/logistique/carburant/carb-chargement-ticket.edit',
            compact('cartes', 'chargement'));
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
        $chargement = \App\LogistiqueChargementCarte::find($id);
        $chargement->carte = $request->get('carte');
        $chargement->date = $request->get('date');
        $chargement->somme = $request->get('somme');
        $chargement->service = $request->get('service');
        $chargement->save();
        return redirect('/carb-chargement-ticket')->with('success', 'Chargement Carte carburant modifié!');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id)
    {
        $chargement = \App\LogistiqueChargementCarte::find($id);
        $chargement->delete();
        return redirect('/carb-chargement-ticket')->with('success', 'Chargement Carte carburant supprimé!');
    }
}
