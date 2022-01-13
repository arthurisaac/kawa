<?php

namespace App\Http\Controllers;

use App\Models\SecteurActivite;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SecteurActiviteController extends Controller
{
    public function liste()
    {
        $secteurs = SecteurActivite::where('localisation_id', Auth::user()->localisation_id)->get();
        return view('commercial.secteur.liste', compact('secteurs'));
    }

    public function index()
    {
        return view('commercial.secteur.index');
    }

    public function store(Request $request)
    {
        $request->validate([
            'secteur_activite' => 'required|string|unique:secteur_activites|max:255',
        ]);

        $secteur_activite = new SecteurActivite;

        $secteur_activite->secteur_activite = $request->input('secteur_activite');

        $secteur_activite->save();

        return redirect('secteur-activite')->with('success', "Secteur d'activité ajouté avec succès");

    }

    public function edit($id)
    {
        $secteurActivite = SecteurActivite::where('localisation_id', Auth::user()->localisation_id)->find($id);
        return view('commercial.secteur.edit', compact('secteurActivite'));
    }

    public function update(Request $request, $id)
    {
        $secteurActivite = SecteurActivite::where('localisation_id', Auth::user()->localisation_id)->find($id);

        $secteurActivite->update([
                'secteur_activite' => $request->input('secteur_activite')
        ]);
        return redirect('secteur-activite')->with('success', "Secteur d'activité modifié avec succès");


    }

    public function destroy(Request $request, $id)
    {
        $secteurActivite = SecteurActivite::where('localisation_id', Auth::user()->localisation_id)->find($id);

        $secteurActivite->delete();

        return redirect('secteur-activite')->with('success', "Secteur d'activité supprimé avec succès");
    }
}
