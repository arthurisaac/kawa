<?php

namespace App\Http\Controllers;

use App\LogistiqueEntreeBordereaux;
use App\LogistiqueFournisseur;
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
        $founisseurs = LogistiqueFournisseur::all();
        return view('/logistique/fourniture/sortie-bordereau.index', compact('founisseurs'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function liste()
    {
        $sortieBordereaux = LogistiqueEntreeBordereaux::all();
        return view('/logistique/fourniture/sortie-bordereau.liste', compact('sortieBordereaux'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return Response
     */
    public function store(Request $request)
    {
        //
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
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id)
    {
        //
    }
}
