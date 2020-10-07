<?php

namespace App\Http\Controllers;

use App\Models\Convoyeur;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class ConvoyeurController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        return view('/rh/convoyeur.index');
    }

    public function liste()
    {
        $convoyeurs = Convoyeur::all();
        return view('/rh/convoyeur.liste', compact('convoyeurs'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return Response
     */
    public function store(Request $request)
    {
        $photo = 'user.png';
        if($request->file()) {
            $fileName = time().'_'.$request->photo->getClientOriginalName();
            $request->file('photo')->storeAs('uploads', $fileName, 'public');
            // $filePath = $request->file('photo')->storeAs('uploads', $fileName, 'public');
            // $photo = '/storage/' . $filePath;
            $photo = $fileName;
        }
        $convoyeur = new Convoyeur([
            'matricule' => $request->get('matricule'),
            'nomPrenoms' => $request->get('nomPrenoms'),
            'dateNaissance' => $request->get('dateNaissance'),
            'fonction' => $request->get('fonction'),
            'dateEmbauche' => $request->get('dateEmbauche'),
            'photo' => $photo,
        ]);
        $convoyeur->save();
        return redirect('/convoyeur')->with('success', 'Convoyeur enregistré!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function show($id)
    {


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
