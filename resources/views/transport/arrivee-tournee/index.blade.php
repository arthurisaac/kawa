@extends('base')

@section('main')
    <div class="burval-container">
        <div><h2 class="heading">Arrivée tournée</h2></div>
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

        <form method="post" action="{{ route('arrivee-tournee.store') }}">
            @csrf
            <div class="row">
                <div class="col">
                    <div class="form-group">
                        <label>N°Tournée</label>
                        <select class="form-control" name="numeroTournee" id="numeroTournee">
                            <option>Selectionnez tournée</option>
                            @foreach($departTournees as $departTournee)
                                <option value="{{$departTournee->id}}">{{$departTournee->numeroTournee}}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="col">
                    <div class="form-group">
                        <label>Date</label>
                        <input type="text" class="form-control" name="date" id="date" readonly/>
                    </div>
                </div>
                <div class="col">
                    <div class="form-group">
                        <label>Véhicule</label>
                        <input type="text" class="form-control" name="vehicule" id="vehicule" readonly/>
                    </div>
                </div>
                <div class="col">
                    <div class="form-group">
                        <label>Km départ</label>
                        <input type="text" class="form-control" name="kmDepart" id="kmDepart" readonly/>
                    </div>
                </div>
                <div class="col">
                    <div class="form-group">
                        <label>Heure départ</label>
                        <input type="time" class="form-control" name="heureDepart" id="heureDepart" readonly/>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col">
                    <div class="form-group">
                        <label>Convoyeur1</label>
                        <input class="form-control" type="text" name="convoyeur1" id="convoyeur1" readonly>
                    </div>
                </div>
                <div class="col">
                    <div class="form-group">
                        <label>Convoyeur 2</label>
                        <input class="form-control" type="text" name="convoyeur2" id="convoyeur2" readonly>
                    </div>
                </div>
                <div class="col">
                    <div class="form-group">
                        <label>Convoyeur 3</label>
                        <input class="form-control" type="text" name="convoyeur3" id="convoyeur3" readonly>
                    </div>
                </div>
            </div>
            <br/>

            {{--<div class="row">
                <div class="col">
                    <div class="row">
                        <div class="col">
                            <div class="form-group">
                                <label>Site 1</label>
                                <input type="text" class="form-control" name="site[]"/>
                            </div>
                        </div>
                        <div class="col">
                            <div class="form-group">
                                <label>Bord</label>
                                <input type="text" class="form-control" name="bord[]"/>
                            </div>
                        </div>
                        <div class="col">
                            <div class="form-group">
                                <label>Montant</label>
                                <input type="text" class="form-control" name="montant[]"/>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col">
                    <div class="row">
                        <div class="col">
                            <div class="form-group">
                                <label>Site 2</label>
                                <input type="text" class="form-control" name="site[]"/>
                            </div>
                        </div>
                        <div class="col">
                            <div class="form-group">
                                <label>Bord</label>
                                <input type="text" class="form-control" name="bord[]"/>
                            </div>
                        </div>
                        <div class="col">
                            <div class="form-group">
                                <label>Montant</label>
                                <input type="text" class="form-control" name="montant[]"/>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col">
                    <div class="row">
                        <div class="col">
                            <div class="form-group">
                                <label>Site 3</label>
                                <input type="text" class="form-control" name="site[]"/>
                            </div>
                        </div>
                        <div class="col">
                            <div class="form-group">
                                <label>Bord</label>
                                <input type="text" class="form-control" name="bord[]"/>
                            </div>
                        </div>
                        <div class="col">
                            <div class="form-group">
                                <label>Montant</label>
                                <input type="text" class="form-control" name="montant[]"/>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col">
                    <div class="row">
                        <div class="col">
                            <div class="form-group">
                                <label>Site 2</label>
                                <input type="text" class="form-control" name="site[]"/>
                            </div>
                        </div>
                        <div class="col">
                            <div class="form-group">
                                <label>Bord</label>
                                <input type="text" class="form-control" name="bord[]"/>
                            </div>
                        </div>
                        <div class="col">
                            <div class="form-group">
                                <label>Montant</label>
                                <input type="text" class="form-control" name="montant[]"/>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col">
                    <div class="row">
                        <div class="col">
                            <div class="form-group">
                                <label>Site 9</label>
                                <input type="text" class="form-control" name="site[]"/>
                            </div>
                        </div>
                        <div class="col">
                            <div class="form-group">
                                <label>Bord</label>
                                <input type="text" class="form-control" name="bord[]"/>
                            </div>
                        </div>
                        <div class="col">
                            <div class="form-group">
                                <label>Montant</label>
                                <input type="text" class="form-control" name="montant[]"/>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col">
                    <div class="row">
                        <div class="col">
                            <div class="form-group">
                                <label>Site 16</label>
                                <input type="text" class="form-control" name="site[]"/>
                            </div>
                        </div>
                        <div class="col">
                            <div class="form-group">
                                <label>Bord</label>
                                <input type="text" class="form-control" name="bord[]"/>
                            </div>
                        </div>
                        <div class="col">
                            <div class="form-group">
                                <label>Montant</label>
                                <input type="text" class="form-control" name="montant[]"/>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col">
                    <div class="row">
                        <div class="col">
                            <div class="form-group">
                                <label>Site 3</label>
                                <input type="text" class="form-control" name="site[]"/>
                            </div>
                        </div>
                        <div class="col">
                            <div class="form-group">
                                <label>Bord</label>
                                <input type="text" class="form-control" name="bord[]"/>
                            </div>
                        </div>
                        <div class="col">
                            <div class="form-group">
                                <label>Montant</label>
                                <input type="text" class="form-control" name="montant[]"/>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col">
                    <div class="row">
                        <div class="col">
                            <div class="form-group">
                                <label>Site 10</label>
                                <input type="text" class="form-control" name="site[]"/>
                            </div>
                        </div>
                        <div class="col">
                            <div class="form-group">
                                <label>Bord</label>
                                <input type="text" class="form-control" name="bord[]"/>
                            </div>
                        </div>
                        <div class="col">
                            <div class="form-group">
                                <label>Montant</label>
                                <input type="text" class="form-control" name="montant[]"/>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col">
                    <div class="row">
                        <div class="col">
                            <div class="form-group">
                                <label>Site 17</label>
                                <input type="text" class="form-control" name="site[]"/>
                            </div>
                        </div>
                        <div class="col">
                            <div class="form-group">
                                <label>Bord</label>
                                <input type="text" class="form-control" name="bord[]"/>
                            </div>
                        </div>
                        <div class="col">
                            <div class="form-group">
                                <label>Montant</label>
                                <input type="text" class="form-control" name="montant[]"/>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col">
                    <div class="row">
                        <div class="col">
                            <div class="form-group">
                                <label>Site 4</label>
                                <input type="text" class="form-control" name="site[]"/>
                            </div>
                        </div>
                        <div class="col">
                            <div class="form-group">
                                <label>Bord</label>
                                <input type="text" class="form-control" name="bord[]"/>
                            </div>
                        </div>
                        <div class="col">
                            <div class="form-group">
                                <label>Montant</label>
                                <input type="text" class="form-control" name="montant[]"/>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col">
                    <div class="row">
                        <div class="col">
                            <div class="form-group">
                                <label>Site 11</label>
                                <input type="text" class="form-control" name="site[]"/>
                            </div>
                        </div>
                        <div class="col">
                            <div class="form-group">
                                <label>Bord</label>
                                <input type="text" class="form-control" name="bord[]"/>
                            </div>
                        </div>
                        <div class="col">
                            <div class="form-group">
                                <label>Montant</label>
                                <input type="text" class="form-control" name="montant[]"/>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col">
                    <div class="row">
                        <div class="col">
                            <div class="form-group">
                                <label>Site 18</label>
                                <input type="text" class="form-control" name="site[]"/>
                            </div>
                        </div>
                        <div class="col">
                            <div class="form-group">
                                <label>Bord</label>
                                <input type="text" class="form-control" name="bord[]"/>
                            </div>
                        </div>
                        <div class="col">
                            <div class="form-group">
                                <label>Montant</label>
                                <input type="text" class="form-control" name="montant[]"/>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col">
                    <div class="row">
                        <div class="col">
                            <div class="form-group">
                                <label>Site 5</label>
                                <input type="text" class="form-control" name="site[]"/>
                            </div>
                        </div>
                        <div class="col">
                            <div class="form-group">
                                <label>Bord</label>
                                <input type="text" class="form-control" name="bord[]"/>
                            </div>
                        </div>
                        <div class="col">
                            <div class="form-group">
                                <label>Montant</label>
                                <input type="text" class="form-control" name="montant[]"/>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col">
                    <div class="row">
                        <div class="col">
                            <div class="form-group">
                                <label>Site 12</label>
                                <input type="text" class="form-control" name="site[]"/>
                            </div>
                        </div>
                        <div class="col">
                            <div class="form-group">
                                <label>Bord</label>
                                <input type="text" class="form-control" name="bord[]"/>
                            </div>
                        </div>
                        <div class="col">
                            <div class="form-group">
                                <label>Montant</label>
                                <input type="text" class="form-control" name="montant[]"/>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col">
                    <div class="row">
                        <div class="col">
                            <div class="form-group">
                                <label>Site 19</label>
                                <input type="text" class="form-control" name="site[]"/>
                            </div>
                        </div>
                        <div class="col">
                            <div class="form-group">
                                <label>Bord</label>
                                <input type="text" class="form-control" name="bord[]"/>
                            </div>
                        </div>
                        <div class="col">
                            <div class="form-group">
                                <label>Montant</label>
                                <input type="text" class="form-control" name="montant[]"/>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col">
                    <div class="row">
                        <div class="col">
                            <div class="form-group">
                                <label>Site 6</label>
                                <input type="text" class="form-control" name="site[]"/>
                            </div>
                        </div>
                        <div class="col">
                            <div class="form-group">
                                <label>Bord</label>
                                <input type="text" class="form-control" name="bord[]"/>
                            </div>
                        </div>
                        <div class="col">
                            <div class="form-group">
                                <label>Montant</label>
                                <input type="text" class="form-control" name="montant[]"/>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col">
                    <div class="row">
                        <div class="col">
                            <div class="form-group">
                                <label>Site 13</label>
                                <input type="text" class="form-control" name="site[]"/>
                            </div>
                        </div>
                        <div class="col">
                            <div class="form-group">
                                <label>Bord</label>
                                <input type="text" class="form-control" name="bord[]"/>
                            </div>
                        </div>
                        <div class="col">
                            <div class="form-group">
                                <label>Montant</label>
                                <input type="text" class="form-control" name="montant[]"/>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col">
                    <div class="row">
                        <div class="col">
                            <div class="form-group">
                                <label>Site 20</label>
                                <input type="text" class="form-control" name="site[]"/>
                            </div>
                        </div>
                        <div class="col">
                            <div class="form-group">
                                <label>Bord</label>
                                <input type="text" class="form-control" name="bord[]"/>
                            </div>
                        </div>
                        <div class="col">
                            <div class="form-group">
                                <label>Montant</label>
                                <input type="text" class="form-control" name="montant[]"/>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col">
                    <div class="row">
                        <div class="col">
                            <div class="form-group">
                                <label>Site 7</label>
                                <input type="text" class="form-control" name="site[]"/>
                            </div>
                        </div>
                        <div class="col">
                            <div class="form-group">
                                <label>Bord</label>
                                <input type="text" class="form-control" name="bord[]"/>
                            </div>
                        </div>
                        <div class="col">
                            <div class="form-group">
                                <label>Montant</label>
                                <input type="text" class="form-control" name="montant[]"/>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col">
                    <div class="row">
                        <div class="col">
                            <div class="form-group">
                                <label>Site 14</label>
                                <input type="text" class="form-control" name="site[]"/>
                            </div>
                        </div>
                        <div class="col">
                            <div class="form-group">
                                <label>Bord</label>
                                <input type="text" class="form-control" name="bord[]"/>
                            </div>
                        </div>
                        <div class="col">
                            <div class="form-group">
                                <label>Montant</label>
                                <input type="text" class="form-control" name="montant[]"/>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col"></div>
            </div>--}}

            <div class="row sitesListes">
                {{--<div class="col-4">
                    <div class="row">
                        <div class="col">
                            <div class="form-group">
                                <label>Site 1</label>
                                <input type="text" class="form-control" name="site[]"/>
                                <input type="hidden" class="form-control" name="id[]"/>
                            </div>
                        </div>
                        <div class="col">
                            <div class="form-group">
                                <label>Bord</label>
                                <input type="text" class="form-control" name="bord[]"/>
                            </div>
                        </div>
                        <div class="col">
                            <div class="form-group">
                                <label>Montant</label>
                                <input type="text" class="form-control" name="montant[]"/>
                            </div>
                        </div>
                    </div>
                </div>--}}

            </div>
            <div class="row">
                <div class="col">
                    <div class="form-group">
                        <label>Km arrivée</label>
                        <input type="text" class="form-control" name="kmArrivee" id="kmArrivee"/>
                    </div>
                </div>
                <div class="col">
                    <div class="form-group">
                        <label>Heure arrivée</label>
                        <input type="time" class="form-control" name="heureArrivee" id="heureArrivee"/>
                    </div>
                </div>

                <div class="col">
                    <div class="row">
                        <div class="col">
                            <div class="form-group">
                                <label>Vidange générale</label>
                                <input type="number" class="form-control" name="vidangeGenerale" id="vidangeGenerale" readonly/>
                            </div>
                        </div>
                        <div class="col">
                            <div class="form-group">
                                <label>Visite technique</label>
                                <input type="number" class="form-control" name="visiteTechnique" readonly/>
                            </div>
                        </div>
                        <div class="col">
                            <div class="form-group">
                                <label>Vidange Courroie</label>
                                <input type="number" class="form-control" name="vidangeCourroie" readonly/>
                            </div>
                        </div>
                        <div class="col">
                            <div class="form-group">
                                <label>Vidange Patente</label>
                                <input type="number" class="form-control" name="patente" readonly/>
                            </div>
                        </div>
                        <div class="col">
                            <div class="form-group">
                                <label>Assurance fin</label>
                                <input type="date" class="form-control" name="assuranceFin" readonly/>
                            </div>
                        </div>
                        <div class="col">
                            <div class="form-group">
                                <label>Assurance pont</label>
                                <input type="number" class="form-control" name="assuranceHeurePont" readonly/>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <button type="submit" class="btn btn-primary">Valider</button>
        </form>
    </div>
    <script>
        let tournees = {!!json_encode($departTournees)!!};
        let personnels = {!!json_encode($personnels)!!};
        let sites = {!! json_encode($sites) !!};
        let vidanges = {!! json_encode($vidanges) !!};

        $(document).ready(function () {
            $("#numeroTournee").on("change", function () {
                const tournee = tournees.find(c => c.id === +this.value);
                const departSites = sites.filter(v => {
                    return parseInt(v.idTourneeDepart) === parseInt(this.value);
                });
                if (departSites) populateSites(departSites);
                if (tournee) {
                    $("#date").val(tournee.date);
                    $("#vehicule").val(tournee.vehicules.immatriculation);
                    $("#kmDepart").val(tournee.kmDepart);
                    $("#kmArrivee").val(tournee.kmArrivee);
                    $("#heureArrivee").val(tournee.heureArrivee);
                    $("#heureDepart").val(tournee.heureDepart);
                    setConvoyeur(1, tournee.agentDeGarde);
                    setConvoyeur(2, tournee.chauffeur);
                    setConvoyeur(3, tournee.chefDeBord);
                    const vidange = vidanges.find(v => v.idVehicule === tournee.vehicules.id);
                    if (vidange) {
                        $("#vidangeGenerale").val(vidange.prochainKm);
                        console.log(vidange);

                    }
                }
            });

            function setConvoyeur(numero, convoyeur) {
                const personnel = personnels.find(p => p.id === convoyeur);
                if (personnel)
                    $("#convoyeur" + numero).val(personnel.nomPrenoms);
                else
                    $("#convoyeur" + numero).val(convoyeur)
            }

            function populateSites(sites) {
                // console.log(sites);
                $(".sitesListes div").remove();
                sites.map( s => {

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
                                <input type="text" class="form-control" name="bordereau[]" value="${s?.bordereau ?? ''}"/>
                            </div>
                        </div>
                        <div class="col">
                            <div class="form-group">
                                <label>Montant</label>
                                <input type="text" class="form-control" min="0" name="montant[]" value="${s?.montant ?? ''}"/>
                            </div>
                        </div>
                    </div>
                </div>`;

                    $(".sitesListes").append(HTML_NODE);
                });
            }

        });
    </script>
@endsection
