<?php

namespace App\Http\Controllers;

use App\Centre;
use App\Centre_regional;
use App\InformatiqueMateriel;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class InformatiqueMaterielController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $centres = Centre::all();
        $centres_regionaux = Centre_regional::all();
        return view('informatique.achat-materiel.index', compact('centres', 'centres_regionaux'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function liste()
    {
        $achats = InformatiqueMateriel::all();
        return view('informatique.achat-materiel.liste', compact('achats'));
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
