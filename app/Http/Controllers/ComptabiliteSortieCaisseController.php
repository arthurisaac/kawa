<?php

namespace App\Http\Controllers;

use App\Models\ComptabiliteSortieCaisse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ComptabiliteSortieCaisseController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('/comptabilite/sortie-caisse.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function liste()
    {
        $sortieCaisses = ComptabiliteSortieCaisse::where('localisation_id', Auth::user()->localisation_id)->get();
        return view('/comptabilite/sortie-caisse.liste', compact('sortieCaisses'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $caisse = new ComptabiliteSortieCaisse([
            'date' => $request->get('date'),
            'somme' => $request->get('somme'),
            'motif' => $request->get('motif'),
            'beneficiaire' => $request->get('beneficiaire'),
            'service' => $request->get('service'),
        ]);
        $caisse->save();
        return redirect('/comptabilite-sortie-caisse')->with('success', 'Sortie caisse enregistrée!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $sortieCaisse = ComptabiliteSortieCaisse::where('localisation_id', Auth::user()->localisation_id)->find($id);
        return view('/comptabilite/sortie-caisse.edit', compact('sortieCaisse'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $caisse = ComptabiliteSortieCaisse::where('localisation_id', Auth::user()->localisation_id)->find($id);
        $caisse->date = $request->get('date');
        $caisse->somme = $request->get('somme');
        $caisse->motif = $request->get('motif');
        $caisse->beneficiaire = $request->get('beneficiaire');
        $caisse->service = $request->get('service');
        $caisse->save();
        return redirect('/comptabilite-sortie-caisse-liste')->with('success', 'Sortie caisse enregistrée!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $caisse = ComptabiliteSortieCaisse::where('localisation_id', Auth::user()->localisation_id)->find($id);
        $caisse->delete();
        return redirect('/comptabilite-sortie-caisse-liste')->with('success', 'Sortie caisse enregistrée!');
    }
}
