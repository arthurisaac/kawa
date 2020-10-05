<?php

namespace App\Http\Controllers;

use App\Models\LogistiqueSortieTicketVisite;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class LogistiqueSortieTicketController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        return view('/logistique.fourniture.sortie-ticket-visiteur.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function liste()
    {
        $sorties = LogistiqueSortieTicketVisite::all();
        return view('/logistique.fourniture.sortie-ticket-visiteur.liste', compact('sorties'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @return Response
     */
    public function store(Request $request)
    {
        $sortie = new LogistiqueSortieTicketVisite([
            'debutSerie' => $request->get('debutSerie'),
            'finSerie' => $request->get('finSerie'),
            'date' => $request->get('date'),
            'centre' => $request->get('centre'),
            'prixUnitaire' => $request->get('prixUnitaire'),
        ]);
        $sortie->save();
        return redirect('/logistique-sortie-ticket')->with('success', 'Sortie ticket visiteur enregitrée');
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
        $sortie = LogistiqueSortieTicketVisite::find($id);
        return view('/logistique.fourniture.sortie-ticket-visiteur.edit', compact('sortie'));
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
        $sortie = LogistiqueSortieTicketVisite::find($id);
        $sortie->debutSerie = $request->get('debutSerie');
        $sortie->finSerie = $request->get('finSerie');
        $sortie->date = $request->get('date');
        $sortie->centre = $request->get('centre');
        $sortie->prixUnitaire = $request->get('prixUnitaire');
        $sortie->save();
        return redirect('/logistique-sortie-ticket-liste')->with('success', 'Sortie ticket visiteur enregitrée');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id)
    {
        $sortie = LogistiqueSortieTicketVisite::find($id);
        $sortie->delete();
        return redirect('/logistique-sortie-ticket-liste')->with('success', 'Sortie ticket visiteur supprimée');
    }
}
