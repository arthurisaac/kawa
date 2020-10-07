<?php

namespace App\Http\Controllers;

use App\Models\LogistiqueSortieSecuripack;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class LogistiqueSortieSecuripackController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        return view('/logistique/fourniture/sortie-securipack.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function liste()
    {
        $sorties = LogistiqueSortieSecuripack::all();
        return view('/logistique.fourniture.sortie-securipack.liste', compact('sorties'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return Response
     */
    public function store(Request $request)
    {
        $sortie = new LogistiqueSortieSecuripack([
            'debutSerie' => $request->get('debutSerie'),
            'finSerie' => $request->get('finSerie'),
            'date' => $request->get('date'),
            'centre' => $request->get('centre'),
            'prixUnitaire' => $request->get('prixUnitaire'),
            'reference' => $request->get('reference'),
        ]);
        $sortie->save();
        return redirect('/logistique-sortie-securipack')->with('success', 'Sortie enregistrée!');
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

        $sortie = LogistiqueSortieSecuripack::find($id);
        return view('/logistique/fourniture/sortie-securipack.edit', compact('sortie'));
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
        $sortie = LogistiqueSortieSecuripack::find($id);
        $sortie->debutSerie = $request->get('debutSerie');
        $sortie->finSerie = $request->get('finSerie');
        $sortie->date = $request->get('date');
        $sortie->centre = $request->get('centre');
        $sortie->prixUnitaire = $request->get('prixUnitaire');
        $sortie->reference = $request->get('reference');
        $sortie->save();
        return redirect('/logistique-sortie-securipack-liste')->with('success', 'Sortie enregistrée!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id)
    {
        $sortie = LogistiqueSortieSecuripack::find($id);
        $sortie->delete();
        return redirect('/logistique-sortie-securipack-liste')->with('success', 'Sortie supprimée!');
    }
}
