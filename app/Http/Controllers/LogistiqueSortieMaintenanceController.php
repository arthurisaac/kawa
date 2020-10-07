<?php

namespace App\Http\Controllers;

use App\Models\LogistiqueSortieMaintenance;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class LogistiqueSortieMaintenanceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        return view('/logistique/fourniture/sortie-maintenance.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function liste()
    {
        $sorties = LogistiqueSortieMaintenance::all();
        return view('/logistique/fourniture/sortie-maintenance.liste', compact('sorties'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @return Response
     */
    public function store(Request $request)
    {
        $sortie = new LogistiqueSortieMaintenance([
            'debutSerie' => $request->get('debutSerie'),
            'finSerie' => $request->get('finSerie'),
            'date' => $request->get('date'),
            'service' => $request->get('service'),
            'prixUnitaire' => $request->get('prixUnitaire'),
        ]);
        $sortie->save();
        return redirect('/logistique-sortie-maintenance')->with('success', 'Sortie fiche de maintenance enregitrée');
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
        $sortie = LogistiqueSortieMaintenance::find($id);
        return view('/logistique/fourniture/sortie-maintenance.edit', compact('sortie'));
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
        $sortie = LogistiqueSortieMaintenance::find($id);
        $sortie->debutSerie = $request->get('debutSerie');
        $sortie->finSerie = $request->get('finSerie');
        $sortie->date = $request->get('date');
        $sortie->service = $request->get('service');
        $sortie->prixUnitaire = $request->get('prixUnitaire');
        $sortie->save();
        return redirect('/logistique-sortie-maintenance-liste')->with('success', 'Sortie fiche de maintenance DAB enregitrée');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id)
    {
        $sortie = LogistiqueSortieMaintenance::find($id);
        $sortie->delete();
        return redirect('/logistique-sortie-maintenance-liste')->with('success', 'Sortie fiche de maintenance DAB supprimée');
    }
}
