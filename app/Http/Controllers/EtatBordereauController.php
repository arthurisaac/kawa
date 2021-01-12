<?php

namespace App\Http\Controllers;

use App\Models\DepartTournee;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\DB;

class EtatBordereauController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        return view('/transport/etat-bordereau.index');
    }

    public function tourneeSurPeriode(Request $request)
    {
        $from = $request->get('from');
        $to = $request->get('to');
        $tournees = isset($from) && isset($to) ? DepartTournee::whereBetween('date', [$from, $to])->get() : DepartTournee::all();

        return view('/transport/etat-bordereau.tournee-sur-periode', compact('tournees'));
    }

    public function surPeriode(Request $request)
    {
        $from = $request->get('from');
        $to = $request->get('to');
        $tournees = isset($from) && isset($to) ? DepartTournee::whereBetween('date', [$from, $to])->get() :
            DepartTournee::with('vehicules')->get();
        return view('/transport/etat-bordereau.sur-periode', compact('tournees'));
    }

    public function rentabiliteTournee()
    {
        return view('/transport/etat-bordereau.rentabilite-tournee', compact('tournees'));
    }

    public function parSite(Request $request)
    {
        $from = $request->get('from');
        $to = $request->get('to');
        $tournees = isset($from) && isset($to) ? DepartTournee::whereBetween('date', [$from, $to])->get() :
            DepartTournee::with('vehicules')->get();
        return view('/transport/etat-bordereau.par-site', compact('tournees'));
    }

    public function parClient(Request $request)
    {
        $from = $request->get('from');
        $to = $request->get('to');
        $tournees = isset($from) && isset($to) ? DepartTournee::whereBetween('date', [$from, $to])->get() :
            DepartTournee::with('vehicules')->get();
        return view('/transport/etat-bordereau.par-client', compact('tournees'));
    }

    public function parVehicule(Request $request)
    {
        $from = $request->get('from');
        $to = $request->get('to');
        $tournees = isset($from) && isset($to) ? DepartTournee::whereBetween('date', [$from, $to])->get() :
            DepartTournee::with('vehicules')->get();
        return view('/transport/etat-bordereau.par-vehicule', compact('tournees'));
    }

    public function parConvoyeur(Request $request)
    {
        $from = $request->get('from');
        $to = $request->get('to');
        $tournees = isset($from) && isset($to) ? DepartTournee::whereBetween('date', [$from, $to])->get() :
            DepartTournee::with('vehicules')->get();
        return view('/transport/etat-bordereau.par-convoyeur', compact('tournees'));
    }

    public function fondTransport(Request $request)
    {
        $from = $request->get('from');
        $to = $request->get('to');
        $tournees = isset($from) && isset($to) ? DepartTournee::whereBetween('date', [$from, $to])->get() :
            DepartTournee::with('vehicules')->get();
        $total = isset($from) && isset($to) ?
            DB::table("depart_tournees")
                ->select(DB::raw("SUM(coutTournee) as total"))
                ->whereBetween('date', [$from, $to])
                ->get() :
            DB::table("depart_tournees")
                ->select(DB::raw("SUM(coutTournee) as total"))
                ->get();

        return view('/transport/etat-bordereau.fond-transport-periode', compact('tournees', 'total'));
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
