<?php

namespace App\Http\Controllers;

use App\Models\LogistiqueSortieCarnetCaisse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;

class LogistiqueSortieCarnetController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        return view('/logistique/fourniture/sortie-carnet.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function liste()
    {
        $sorties = LogistiqueSortieCarnetCaisse::where('localisation_id', Auth::user()->localisation_id)->get();
        return view('/logistique/fourniture/sortie-carnet.liste', compact('sorties'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @return Response
     */
    public function store(Request $request)
    {
        $sortie = new LogistiqueSortieCarnetCaisse([
            'debutSerie' => $request->get('debutSerie'),
            'finSerie' => $request->get('finSerie'),
            'date' => $request->get('date'),
            'service' => $request->get('service'),
            'prixUnitaire' => $request->get('prixUnitaire'),
        ]);
        $sortie->save();
        return redirect('/logistique-sortie-carnet')->with('success', 'Sortie carnet de caisse enregitrée');
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
        $sortie = LogistiqueSortieCarnetCaisse::where('localisation_id', Auth::user()->localisation_id)->find($id);
        return view('/logistique/fourniture/sortie-carnet.edit', compact('sortie'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param int $id
     * @return Response
     */
    public function update(Request $request, $id)
    {
        $sortie = LogistiqueSortieCarnetCaisse::where('localisation_id', Auth::user()->localisation_id)->find($id);
        $sortie->debutSerie = $request->get('debutSerie');
        $sortie->finSerie = $request->get('finSerie');
        $sortie->date = $request->get('date');
        $sortie->service = $request->get('service');
        $sortie->prixUnitaire = $request->get('prixUnitaire');
        $sortie->save();
        return redirect('/logistique-sortie-carnet')->with('success', 'Sortie carnet de caisse enregitrée');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return Response
     */
    public function destroy($id)
    {
        $sortie = LogistiqueSortieCarnetCaisse::where('localisation_id', Auth::user()->localisation_id)->find($id);
        $sortie->delete();
        return redirect('/logistique-sortie-carnet')->with('success', 'Sortie carnet de caisse supprimée');
    }
}
