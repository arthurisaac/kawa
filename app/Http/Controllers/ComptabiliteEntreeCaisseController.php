<?php

namespace App\Http\Controllers;

use App\ComptabiliteEntreeCaisse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class ComptabiliteEntreeCaisseController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        return view('/comptabilite/entree-caisse.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function liste()
    {
        $entreeCaisses = ComptabiliteEntreeCaisse::all();
        return view('/comptabilite/entree-caisse.liste', compact('entreeCaisses'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @return Response
     */
    public function store(Request $request)
    {
        $caisse = new ComptabiliteEntreeCaisse([
            'date' => $request->get('date'),
            'somme' => $request->get('somme'),
            'motif' => $request->get('motif'),
            'deposant' => $request->get('deposant'),
            'service' => $request->get('service'),
        ]);
        $caisse->save();
        return redirect('/comptabilite-entree-caisse')->with('success', 'Entrée caisse enregistrée!');
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
        $entreeCaisse = ComptabiliteEntreeCaisse::find($id);
        return view('/comptabilite/entree-caisse.edit', compact('entreeCaisse'));

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
        $caisse = ComptabiliteEntreeCaisse::find($id);
        $caisse->date = $request->get('date');
        $caisse->somme = $request->get('somme');
        $caisse->motif = $request->get('motif');
        $caisse->deposant = $request->get('deposant');
        $caisse->service = $request->get('service');
        $caisse->save();
        return redirect('/comptabilite-entree-caisse-liste')->with('success', 'Entrée caisse enregistrée!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id)
    {
        $caisse = ComptabiliteEntreeCaisse::find($id);
        $caisse->delete();
        return redirect('/comptabilite-entree-caisse-liste')->with('success', 'Entrée caisse supprimée!');
    }
}
