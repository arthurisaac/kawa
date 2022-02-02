<?php

namespace App\Http\Controllers;

use App\Models\Centre;
use App\Models\Centre_regional;
use App\Models\Commercial_client;
use App\Models\Commercial_site;
use App\Models\RegulationConfirmationClient;
use App\Models\SiteDepartTournee;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class RegulationConfirmationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $sites = SiteDepartTournee::with('sites')
            ->with('tournees')
            ->whereNotNull('bordereau')
            ->orderBy('site')
            ->get();
        return view('.regulation.confirmation.index', compact('sites'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @param Request $request
     * @return Response
     */
    public function liste(Request $request)
    {
        $regulations = RegulationConfirmationClient::with('site')->get();
        $debut = $request->get("debut");
        $fin = $request->get("fin");
        $client = $request->get("client");
        $site = $request->get("site");
        $centres = Centre::all();
        $centres_regionaux = Centre_regional::all();
        $clients_com = Commercial_client::query()->orderBy('client_nom')->get();
        $sites_com = Commercial_site::query()->orderBy('site')->get();
        $centre = $request->get("centre");
        $centre_regional = $request->get("centre_regional");

        if ($site) {
            $regulations = RegulationConfirmationClient::with('site')
                ->whereHas("site", function (Builder $builder1) use ($site) {
                    $builder1->where("site", $site);
                })->get();
        }

        if ($client) {
            $regulations = RegulationConfirmationClient::with('site')
                ->whereHas("site", function (Builder $builder1) use ($client) {
                    $builder1->whereHas("sites", function (Builder $builder2) use ($client) {
                         $builder2->where("client", $client);
                    });
                })->get();
        }

        if ($centre) {
            $regulations = RegulationConfirmationClient::with('site')
                ->whereHas("site", function (Builder $builder1) use ($centre) {
                    $builder1->whereHas("tournees", function (Builder $builder2) use ($centre) {
                        $builder2->where("centre", $centre);
                    });
                })->get();
        }

        if ($centre_regional) {
            $regulations = RegulationConfirmationClient::with('site')
                ->whereHas("site", function (Builder $builder1) use ($centre_regional) {
                    $builder1->whereHas("tournees", function (Builder $builder2) use ($centre_regional) {
                        $builder2->where("centre_regional", $centre_regional);
                    });
                })->get();
        }

        if ($centre && $centre_regional) {
            $regulations = RegulationConfirmationClient::with('site')
                ->whereHas("site", function (Builder $builder1) use ($centre_regional, $debut, $fin, $centre) {
                    $builder1->whereHas("tournees", function (Builder $builder2) use ($centre_regional, $fin, $debut, $centre) {
                        $builder2->where("centre", $centre);
                        $builder2->where("centre_regional", $centre_regional);
                    });
                })->get();
        }

        if ($debut && $fin) {
            $regulations = RegulationConfirmationClient::with('site')
                ->whereHas("site", function (Builder $builder1) use ($debut, $fin, $centre_regional) {
                    $builder1->whereHas("tournees", function (Builder $builder2) use ($fin, $debut, $centre_regional) {
                        $builder2->whereBetween('date', [$debut, $fin]);
                    });
                })->get();
        }

        if ($debut && $fin && $centre_regional) {
            $regulations = RegulationConfirmationClient::with('site')
                ->whereHas("site", function (Builder $builder1) use ($debut, $fin, $centre_regional) {
                    $builder1->whereHas("tournees", function (Builder $builder2) use ($fin, $debut, $centre_regional) {
                        $builder2->whereBetween('date', [$debut, $fin]);
                        $builder2->where("centre_regional", $centre_regional);
                    });
                })->get();
        }

        if ($debut && $fin && $centre) {
            $regulations = RegulationConfirmationClient::with('site')
                ->whereHas("site", function (Builder $builder1) use ($debut, $fin, $centre) {
                    $builder1->whereHas("tournees", function (Builder $builder2) use ($fin, $debut, $centre) {
                        $builder2->whereBetween('date', [$debut, $fin]);
                        $builder2->where("centre", $centre);
                    });
                })->get();
        }

        if ($debut && $fin && $centre && $centre_regional) {
            $regulations = RegulationConfirmationClient::with('site')
                ->whereHas("site", function (Builder $builder1) use ($centre_regional, $debut, $fin, $centre) {
                    $builder1->whereHas("tournees", function (Builder $builder2) use ($centre_regional, $fin, $debut, $centre) {
                        $builder2->whereBetween('date', [$debut, $fin]);
                        $builder2->where("centre", $centre);
                        $builder2->where("centre_regional", $centre_regional);
                    });
                })->get();
        }

        if ($debut && $fin && $client) {
            $regulations = RegulationConfirmationClient::with('site')
                ->whereHas("site", function (Builder $builder1) use ($debut, $fin, $client) {
                    $builder1->where("client", $client);
                    $builder1->whereHas("tournees", function (Builder $builder2) use ($fin, $debut, $client) {
                        $builder2->whereBetween('date', [$debut, $fin]);
                    });
                })->get();
        }

        return view('.regulation.confirmation.liste', compact('regulations', 'debut', 'fin', 'client', 'site',
            'centres', 'centres_regionaux', 'sites_com', 'clients_com', 'centre', 'centre_regional'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return Response
     */
    public function store(Request $request)
    {
        $data = new RegulationConfirmationClient([
            'bordereau' => $request->get('bordereau'),
            'confirmation' => $request->get('confirmation'),
            'remarque' => $request->get('remarque'),
            'dateReception' => $request->get('date'),
            'lieu' => $request->get('lieu'),
            'devise' => $request->get('devise'),
        ]);
        $data->save();
        return redirect("/regulation-confirmation-liste")->with('success', 'Enregistré avec succès');
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return Response
     */
    public function edit($id)
    {
        $sites = SiteDepartTournee::with('sites')
            ->with('tournees')
            ->whereNotNull('bordereau')
            ->orderBy('site')
            ->get();
        $regulation = RegulationConfirmationClient::with('site')->find($id);
        return view('.regulation.confirmation.edit', compact('sites', 'regulation'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return Response
     */
    public function update(Request $request, $id)
    {
        $data = RegulationConfirmationClient::find($id);

        $data->bordereau = $request->get('bordereau');
        $data->dateReception = $request->get('date');
        $data->lieu = $request->get('lieu');
        $data->confirmation = $request->get('confirmation');
        $data->remarque = $request->get('remarque');
        $data->save();
        return redirect("/regulation-confirmation-liste")->with('success', 'Enregistré avec succès');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return Response
     */
    public function destroy($id)
    {
        $data = SiteDepartTournee::find($id);
        if ($data) $data->delete();
        return redirect("/regulation-confirmation-liste")->with('success', 'Supprimé avec succès');
        /*return response()->json([
            'message' => 'Good!'
        ]);*/
    }
}
