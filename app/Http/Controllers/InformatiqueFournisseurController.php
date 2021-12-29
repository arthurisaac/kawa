<?php

namespace App\Http\Controllers;

use App\Models\InformatiqueFournisseur;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;

class InformatiqueFournisseurController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        return view('informatique.fournisseur.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function liste()
    {
        $fournisseurs = InformatiqueFournisseur::where('localisation_id', Auth::user()->localisation_id)->get();
        return view('informatique.fournisseur.liste', compact('fournisseurs'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @return Response
     */
    public function store(Request $request)
    {
        $fournisseur = new InformatiqueFournisseur([
            'libelleFournisseur' => $request->get('libelleFournisseur'),
            'specialite' => $request->get('specialite'),
            'localisation' => $request->get('localisation'),
            'nationalite' => $request->get('nationalite'),
            'email' => $request->get('email'),
            'contact' => $request->get('contact'),
        ]);
        $fournisseur->save();
        return redirect('/informatique-fournisseur')->with('success','Enregistrement effectué!');
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
        $fournisseur = InformatiqueFournisseur::where('localisation_id', Auth::user()->localisation_id)->find($id);
        return view('informatique.fournisseur.edit', compact('fournisseur'));
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
        $personnel = InformatiqueFournisseur::where('localisation_id', Auth::user()->localisation_id)->find($id);
        $personnel->libelleFournisseur = $request->get('libelleFournisseur');
        $personnel->specialite = $request->get('specialite');
        $personnel->localisation = $request->get('localisation');
        $personnel->nationalite = $request->get('nationalite');
        $personnel->email = $request->get('email');
        $personnel->contact = $request->get('contact');
        $personnel->save();
        return redirect('/informatique-fournisseur-liste')->with('success','Enregistrement effectué!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id)
    {
        $fournisseur = InformatiqueFournisseur::where('localisation_id', Auth::user()->localisation_id)->find($id);
        $fournisseur->delete();
        return redirect('/informatique-fournisseur-liste')->with('success','Enregistrement supprimé!');
    }
}
