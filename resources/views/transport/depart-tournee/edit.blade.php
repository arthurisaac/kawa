@extends('base')

@section('main')
    <div class="burval-container">
        <div><h2 class="heading">Départ tournée</h2></div>
        <br/>
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
            <br/>
        @endif

        @if(session()->get('success'))
            <div class="alert alert-success">
                {{ session()->get('success') }}
            </div>
        @endif

        <form method="post" action="{{ route('depart-tournee.update', $tournee->id) }}">
            @csrf
            @method('PATCH')

            <div class="row">
                <div class="col">
                    <div class="form-group">
                        <label>N°Tournée:</label>
                        <input type="text" class="form-control" name="numeroTournee" value="{{$tournee->numeroTournee}}"
                               readonly/>
                    </div>
                </div>
                <div class="col">
                    <div class="form-group">
                        <label>Date</label>
                        <input type="date" class="form-control" name="date" value="{{$tournee->date}}"/>
                    </div>
                </div>
                <div class="col">
                    <div class="form-group">
                        <label>Véhicule</label>
                        <select class="form-control" name="idVehicule" id="vehicule">
                            <option value="{{$tournee->idVehicule}}">{{$tournee->vehicules->immatriculation}}</option>
                            @foreach($vehicules as $vehicule)
                                <option value="{{$vehicule->id}}">{{$vehicule->immatriculation}}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="col">
                    <div class="form-group">
                        <label>Kilométrage départ</label>
                        <input type="number" class="form-control" name="kmDepart" value="{{$tournee->kmDepart}}"
                               id="kmDepart" min="0"/>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col">
                    <div class="form-group">
                        <label>Chauffeur</label>
                        <select class="form-control" name="chauffeur" id="chauffeur">
                            <option value="{{$tournee->chauffeur}}">{{$tournee->chauffeurs->nomPrenoms}}</option>
                        </select>
                    </div>
                </div>
                <div class="col">
                    <div class="form-group">
                        <label>Agent de garde</label>
                        <select class="form-control" name="agentDeGarde">
                            <option value="{{$tournee->agentDeGarde}}">{{$tournee->agentDeGardes->nomPrenoms}}</option>
                            @foreach($agents as $agent)
                                <option value="{{$agent->id}}">{{$agent->nomPrenoms}}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="col">
                    <div class="form-group">
                        <label>Chef de bord</label>
                        <select class="form-control" name="chefDeBord">
                            <option value="{{$tournee->chefDeBord}}">{{$tournee->chefDeBords->nomPrenoms}}</option>
                            @foreach($chefBords as $chef)
                                <option value="{{$chef->id}}">{{$chef->nomPrenoms}}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="col">
                    <div class="form-group">
                        <label>Coût tournée</label>
                        <input type="number" class="form-control" min="0" name="coutTournee"
                               value="{{$tournee->coutTournee}}" id="coutTournee"/>
                    </div>
                </div>
            </div>
            <br/>

            <div class="row">
                @foreach ($sites as $site)
                    <div class="col-4">
                        <div class="row">
                            <div class="col">
                                <div class="form-group">
                                    <label>Site</label>
                                    <select class="form-control" name="site[]">
                                        <option>{{$site->sites->site}}</option>
                                        @foreach ($commercial_sites as $commercial)
                                            <option value="{{$commercial->id}}">{{$commercial->site}}</option>
                                        @endforeach
                                    </select>
                                    <input type="hidden" name="site_id[]" value="{{$site->id}}">
                                </div>
                            </div>
                            <div class="col">
                                <div class="form-group">
                                    <label>heure</label>
                                    <input type="time" class="form-control" name="heure[]"
                                           value="{{$site->heure}}"/>
                                </div>
                            </div>
                            <div class="col">
                                <div class="form-group">
                                    <label>type</label>
                                    <select class="form-control" name="type[]">
                                        <option>{{$site->type}}</option>
                                        <option value="oo_vb_extamuros_bitume">VB extramuros bitume</option>
                                        <option value="oo_vb_extramuros_piste">VB extramuros piste</option>
                                        <option value="oo_vl_extramuros_bitume">VL extramuros bitume</option>
                                        <option value="oo_vl_extramuros_piste">VL extramuros piste</option>
                                        <option value="oo_vb_intramuros">VB</option>
                                        <option value="oo_vl_intramuros">VL</option>
                                    </select>
                                </div>
                            </div>
                        </div>

                    </div>
                @endforeach
                <div class="col-4">
                    <div class="col">
                        <br/>
                        <button class="btn btn-primary">Enregistrer</button>
                        <button class="btn btn-danger">Annuler</button>
                    </div>
                </div>
            </div>

            <div class="row sitesListes"></div>

        </form>
    </div>
    <script>
        let vehicules = {!! json_encode($vehicules) !!};
        let sites = {!! json_encode($sites) !!};

        let cout = 0;
        let site = null;

        $("#vehicule").on("change", function () {
            $("#chauffeur option").remove();
            const vehicule = vehicules.find(v => v.id === parseInt(this.value));
            if (vehicule) {
                $('#chauffeur').append($('<option>', {
                    value: vehicule.chauffeur_titulaire.id,
                    text: vehicule.chauffeur_titulaire.nomPrenoms
                }));
                $('#chauffeur').append($('<option>', {
                    value: vehicule.chauffeur_suppleant.id,
                    text: vehicule.chauffeur_suppleant.nomPrenoms
                }));
            }
        });


        $("select[name='type[]']").on("change", function () {
            cout = 0;

            $.each($("select[name='type[]']"), function () {
                console.log(this.value);
                site = sites.find(s => s.id === parseInt(this.value));
                if (site) {
                    cout += parseInt(site[this.value]);
                    console.log(site[this.value]);
                    $("#coutTournee").val(cout);
                }
            });
        });

        /* $("select[name='site[]']").on("change", function() {
             site = sites.find(s => s.id === parseInt(this.value));
         });

         $("select[name='type[]']").on("change", function() {
             console.log(this);
             if (site) {
                 cout += parseInt(site[this.value]);
                 console.log(site[this.value]);
                 $("#coutTournee").val(cout);
             }
         });*/

        $("#kmDepart").on("change", function () {
            $("#coutTournee").val(cout * parseInt(this.value));
        });

        $(document).ready(function () {

        });

        function populateSites(sites) {
            // console.log(sites);
            $(".sitesListes div").remove();
            sites.map(s => {

                let HTML_NODE = `<div class="col-4">
                    <div class="row">
                        <div class="col">
                            <div class="form-group">
                                <label>Site</label>
                                <input type="text" class="form-control" name="site[]" value="${s.sites.site}" readonly/>
                                <input type="hidden" class="form-control" name="site_id[]" value="${s.id}"/>
                            </div>
                        </div>
                        <div class="col">
                            <div class="form-group">
                                <label>Bordereau</label>
                                <input type="text" class="form-control" name="bordereau[]" value="${s?.bordereau}"/>
                            </div>
                        </div>
                        <div class="col">
                            <div class="form-group">
                                <label>Montant</label>
                                <input type="text" class="form-control" min="0" name="montant[]" value="${s?.montant}"/>
                            </div>
                        </div>
                    </div>
                </div>`;

                $(".sitesListes").append(HTML_NODE);
            });
        }

    </script>
@endsection
