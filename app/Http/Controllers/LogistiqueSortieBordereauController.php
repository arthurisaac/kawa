<?php

namespace App\Http\Controllers;

use App\Models\LogistiqueSortieBordereaux;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class LogistiqueSortieBordereauController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        return view('/logistique/fourniture/sortie-bordereau.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function liste()
    {
        $sortieBordereaux = LogistiqueSortieBordereaux::all();
        return view('/logistique/fourniture/sortie-bordereau.liste', compact('sortieBordereaux'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return Response
     */
    public function store(Request $request)
    {
        $sortie = new LogistiqueSortieBordereaux([
            'debutSerie' => $request->get('debutSerie'),
            'finSerie' => $request->get('finSerie'),
            'date' => $request->get('date'),
            'service' => $request->get('service'),
            'prix' => $request->get('prix'),
        ]);
        $sortie->save();
        return redirect('/logistique-sortie-bordereau')->with('success', 'Sortie bordereau enregistrée!');
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
        $sortie = LogistiqueSortieBordereaux::find($id);
        return view('/logistique/fourniture/sortie-bordereau.edit', compact('sortie'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return Response
     */
    public function update(Request $request, $id)
    {
        $sortie = LogistiqueSortieBordereaux::find($id);
        $sortie->debutSerie = $request->get('debutSerie');
        $sortie->finSerie = $request->get('finSerie');
        $sortie->date = $request->get('date');
        $sortie->service = $request->get('service');
        $sortie->prix = $request->get('prix');
        $sortie->save();
        return redirect('/logistique-sortie-bordereau-liste')->with('success', 'Sortie bordereau enregistrée!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return Response
     */
    public function destroy($id)
    {
        $sortie = LogistiqueSortieBordereaux::find($id);
        $sortie->delete();
        return redirect('/logistique-sortie-bordereau-liste')->with('success', 'Sortie bordereau supprimée!');
    }
}
