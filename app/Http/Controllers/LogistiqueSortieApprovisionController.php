<?php

namespace App\Http\Controllers;

use App\Models\LogistiqueSortieApprovision;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class LogistiqueSortieApprovisionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        return view('/logistique/fourniture/sortie-approvision.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function liste()
    {
        $sorties = LogistiqueSortieApprovision::all();
        return view('/logistique/fourniture/sortie-approvision.liste', compact('sorties'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @return Response
     */
    public function store(Request $request)
    {
        $sortie = new LogistiqueSortieApprovision([
            'debutSerie' => $request->get('debutSerie'),
            'finSerie' => $request->get('finSerie'),
            'date' => $request->get('date'),
            'service' => $request->get('service'),
            'prixUnitaire' => $request->get('prixUnitaire'),
        ]);
        $sortie->save();
        return redirect('/logistique-sortie-approvision-liste')->with('success', 'Sortie approvisionnement enregitrée');
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
        $sortie = LogistiqueSortieApprovision::find($id);
        return view('/logistique.fourniture.sortie-approvision.edit', compact('sortie'));
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
        $sortie = LogistiqueSortieApprovision::find($id);
        $sortie->debutSerie = $request->get('debutSerie');
        $sortie->finSerie = $request->get('finSerie');
        $sortie->date = $request->get('date');
        $sortie->service = $request->get('service');
        $sortie->prixUnitaire = $request->get('prixUnitaire');
        $sortie->save();
        return redirect('/logistique-sortie-approvision-liste')->with('success', 'Sortie fiche approvionnement DAB enregitrée');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id)
    {
        $sortie = LogistiqueSortieApprovision::find($id);
        $sortie->delete();
        return redirect('/logistique-sortie-approvision-liste')->with('success', 'Sortie fiche approvisionnement DAB supprimée');
    }
}
