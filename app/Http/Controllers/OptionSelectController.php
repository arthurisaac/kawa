<?php

namespace App\Http\Controllers;

use App\Models\OptionBordereau;
use App\Models\OptionDevise;
use App\Models\OptionNiveauCarburant;
use Illuminate\Http\Request;

class OptionSelectController extends Controller
{
    //
    public function index()
    {
        return view('parametre.index');
    }

    public function optionCarburant()
    {
        $options = OptionNiveauCarburant::all();
        return view('parametre.option.niveau-carburant', compact('options'));
    }

    public function storeCarburant(Request $request)
    {
        $data = new OptionNiveauCarburant([
            'option' => $request->get('option')
        ]);
        $data->save();
        return redirect()->back()->with('success', 'Enregistré avec succès');
    }

    public function destroyCarburant(Request $request, $id)
    {

        if ($request->ajax()) {
            $data = OptionNiveauCarburant::find($id);
            if ($data) $data->delete();
            return \response()->json([
                'message' => 'ok'
            ]);
        }
    }

    // BORDEREAU

    public function optionBordereau()
    {
        $options = OptionBordereau::all();
        return view('parametre.option.bordereau', compact('options'));
    }

    public function storeBordereau(Request $request)
    {
        $data = new OptionBordereau([
            'numero' => $request->get('option')
        ]);
        $data->save();
        return redirect()->back()->with('success', 'Enregistré avec succès');
    }

    public function destroyBordereau(Request $request, $id)
    {

        if ($request->ajax()) {
            $data = OptionBordereau::find($id);
            if ($data) $data->delete();
            return \response()->json([
                'message' => 'ok'
            ]);
        }
    }

    // DEVISE

    public function optionDevise()
    {
        $options = OptionDevise::all();
        return view('parametre.option.devise', compact('options'));
    }

    public function storeDevise(Request $request)
    {
        $data = new OptionDevise([
            'devise' => $request->get('option')
        ]);
        $data->save();
        return redirect()->back()->with('success', 'Enregistré avec succès');
    }

    public function destroyDevise(Request $request, $id)
    {

        if ($request->ajax()) {
            $data = OptionDevise::find($id);
            if ($data) $data->delete();
            return \response()->json([
                'message' => 'ok'
            ]);
        }
    }
}
