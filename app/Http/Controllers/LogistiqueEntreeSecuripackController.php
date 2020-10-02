<?php

namespace App\Http\Controllers;

use App\LogistiqueEntreeBordereaux;
use App\LogistiqueFournisseur;
use App\LogistiqueEntreeSecuripack;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class LogistiqueEntreeSecuripackController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $fournisseurs = LogistiqueFournisseur::all();
        return view('/logistique/fourniture/entree-securipack.index', compact('fournisseurs'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function liste()
    {
        $entreeBordereaux =  LogistiqueEntreeSecuripack::all();
        return view('/logistique/fourniture/entree-securipack.liste', compact('entreeBordereaux'));
    }

    public function rechercher()
    {
        $entreeBordereaux =  LogistiqueEntreeBordereaux::all();
        return view('/logistique/fourniture/entree-securipack.liste', compact('entreeBordereaux'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
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
     * @param Request $request
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
