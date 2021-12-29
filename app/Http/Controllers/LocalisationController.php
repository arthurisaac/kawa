<?php

namespace App\Http\Controllers;

use App\Models\Localisation;
use Illuminate\Http\Request;

class LocalisationController extends Controller
{
    public function index ()
    {
        $localisations = Localisation::all();
        return view('localisation.index', compact('localisations'));
    }

    public function create()
    {
        return view('localisation.create');
    }

    public function store(Request $request)
    {
        $localisation = new Localisation();
        $localisation->pays = $request->input('pays');
        $localisation->save();
        return redirect('user-localisation')->with('success', 'Localisation ajouté avec succès');
    }

    public function edit ($id)
    {
        $localisation = Localisation::find($id);
        dd($localisation);
    }

    public function update (Request $request, $id)
    {

    }

    public function destroy(Request $request, $id)
    {
        dd($request->all());
    }
}
