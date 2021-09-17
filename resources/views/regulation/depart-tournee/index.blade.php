@extends('base')

@section('main')
    <div class="burval-container">
        <div><h2 class="heading">Régulation départ tournée</h2></div>
        <br/>
        <br/>

        <div class="row">
            <div class="col">
                <div class="form-group row">
                    <label for="date" class="col-sm-4">Date départ</label>
                    <input type="text" name="date" id="date" value="{{$date}}" class="form-control col-sm-8"/>
                </div>
            </div>
            <div class="col">
                <div class="form-group row">
                    <label for="date" class="col-sm-4">Heure départ</label>
                    <input type="text" name="date" id="date" value="{{$heure}}" class="form-control col-sm-8"/>
                </div>
            </div>
            <div class="col"></div>
            <div class="col"></div>
        </div>
        <div class="row">
            <div class="col-3">
                <div class="form-group row">
                    <label for="no_tournee" class="col-sm-4">N°Tournée</label>
                    <select class="form-control col-sm-8" name="noTournee" id="noTournee">
                        <option></option>
                        @foreach($tournees as $tournee)
                            <option value="{{$tournee->id}}">{{$tournee->numeroTournee}}</option>
                        @endforeach
                    </select>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col">
                <div class="form-group row">
                    <label class="col-sm-4">Véhicule</label>
                    <input class="form-control col-sm-8" name="vehicule" id="vehicule" readonly/>
                </div>
            </div>
            <div class="col">
                <div class="form-group row">
                    <label class="col-sm-4">Chauffeur:</label>
                    <input class="form-control col-sm-8" name="chauffeur" id="chauffeur" readonly/>
                </div>
            </div>
            <div class="col">
                <div class="form-group row">
                    <label class="col-sm-4">Agent garde</label>
                    <input class="form-control col-sm-8" name="agentDeGarde" id="agentDeGarde" readonly/>
                </div>
            </div>
            <div class="col">
                <div class="form-group row">
                    <label class="col-sm-4">Chef de bord</label>
                    <input class="form-control col-sm-8" name="chefDeBord" id="chefDeBord" readonly/>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col">
                <div class="form-group row">
                    <label for="centre" class="col-sm-4">Centre</label>
                    <input name="centre" id="centre" class="form-control col-sm-8" readonly/>
                </div>
            </div>
            <div class="col">
                <div class="form-group row">
                    <label for="centre_regional" class="col-sm-4">Centre régional</label>
                    <input id="centre_regional" name="centre_regional" class="form-control col-sm-8" readonly/>
                </div>
            </div>
            <div class="col"></div>
            <div class="col"></div>
        </div>
    </div>
    <script>
        let tournees = {!! json_encode($tournees) !!};
        let sites = {!! json_encode($sites) !!};
        $(document).ready(function () {
            $("#noTournee").on("change", function () {
                $("#vehicule").val("");
                $("#chauffeur").val("");
                $("#chefDeBord").val("");
                $("#agentDeGarde").val("");
                $("#centre_regional option").remove();

                const tournee = tournees.find(t => t.id === parseInt(this.value ?? 0));
                if (tournee) {
                    $("#vehicule").val(tournee.vehicules.immatriculation);
                    $("#chauffeur").val(tournee.chauffeurs.nomPrenoms);
                    $("#chefDeBord").val(tournee.chef_de_bords.nomPrenoms);
                    $("#agentDeGarde").val(tournee.agent_de_gardes.nomPrenoms);
                    $("#centre").val(tournee.centre);
                    $("#centre_regional").val(tournee.centre_regional);

                    const commerciaux = sites.filter(site => {
                        return site.centre === tournee.centre;
                    });
                    console.log(commerciaux);
                    commerciaux.map(({id, site, clients}) => {
                        $('#asSite').append($('<option>', {
                            value: id,
                            text: `${site} (${clients.client_nom})`
                        }));
                    })
                }
            });
        });
    </script>
@endsection
