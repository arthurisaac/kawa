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
                        {{--<select class="form-control" name="convoyeur1" >
                            <option>Selectionnez convoyeur</option>
                            @foreach($convoyeurs as $convoyeur)
                            <option value="{{$convoyeur->id}}">{{$convoyeur->nomPrenoms}}</option>
                            @endforeach
                        </select>--}}
                    </div>
                </div>
                <div class="col">
                    <div class="form-group">
                        <label>Convoyeur 2</label>
                        <input class="form-control" type="text" name="convoyeur2" id="convoyeur2" readonly>
                        {{--<select class="form-control" name="convoyeur2" >
                            <option>Selectionnez convoyeur</option>
                            @foreach($convoyeurs as $convoyeur)
                            <option value="{{$convoyeur->id}}">{{$convoyeur->nomPrenoms}}</option>
                            @endforeach
                        </select>--}}
                    </div>
                </div>
                <div class="col">
                    <div class="form-group">
                        <label>Convoyeur 3</label>
                        <input class="form-control" type="text" name="convoyeur3" id="convoyeur3" readonly>
                        {{--<select class="form-control" name="convoyeur3" >
                            <option>Selectionnez convoyeur</option>
                            @foreach($convoyeurs as $convoyeur)
                            <option value="{{$convoyeur->id}}">{{$convoyeur->nomPrenoms}}</option>
                            @endforeach
                        </select>--}}
                    </div>
                </div>
            </div>
            <br/>

            <div class="row">
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
            </div>

            <div class="row">
                <div class="col">
                    <div class="form-group">
                        <label>Km arrivée</label>
                        <input type="text" class="form-control" name="kmArrivee"/>
                    </div>
                </div>
                <div class="col">
                    <div class="form-group">
                        <label>Heure arrivée</label>
                        <input type="time" class="form-control" name="heureArrivee"/>
                    </div>
                </div>

                <div class="col">
                    <div class="row">
                        <div class="col">
                            <div class="form-group">
                                <label>Vidange générale</label>
                                <input type="number" class="form-control" name="vidangeGenerale"/>
                            </div>
                        </div>
                        <div class="col">
                            <div class="form-group">
                                <label>Visite technique</label>
                                <input type="number" class="form-control" name="visiteTechnique"/>
                            </div>
                        </div>
                        <div class="col">
                            <div class="form-group">
                                <label>Vidange Courroie</label>
                                <input type="number" class="form-control" name="vidangeCourroie"/>
                            </div>
                        </div>
                        <div class="col">
                            <div class="form-group">
                                <label>Patente</label>
                                <input type="number" class="form-control" name="patente"/>
                            </div>
                        </div>
                        <div class="col">
                            <div class="form-group">
                                <label>Assurance fin</label>
                                <input type="date" class="form-control" name="assuranceFin"/>
                            </div>
                        </div>
                        <div class="col">
                            <div class="form-group">
                                <label>Assurance pont</label>
                                <input type="number" class="form-control" name="assuranceHeurePont"/>
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

        $(document).ready(function () {
            $("#numeroTournee").on("change", function () {
                const tournee = tournees.find(c => c.id === +this.value);
                if (tournee) {
                    console.log(tournee);
                    $("#date").val(tournee.date);
                    $("#vehicule").val(tournee.idVehicule);
                    $("#kmDepart").val(tournee.kmDepart);
                    setConvoyeur(1, tournee.agentDeGarde);
                    setConvoyeur(2, tournee.chauffeur);
                    setConvoyeur(3, tournee.chefDeBord);
                }
            });

            function setConvoyeur(numero, convoyeur) {
                const personnel = personnels.find(p => p.id === convoyeur);
                console.log(personnel);
                 if (personnel)
                     $("#convoyeur" + numero).val(personnel.nomPrenoms);
                else
                     $("#convoyeur" + numero).val(convoyeur)
            }
        });
    </script>
@endsection
