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
                    <input type="text" class="form-control" name="date" id="date"/>
                </div>
            </div>
            <div class="col">
                <div class="form-group">
                    <label>Véhicule</label>
                    <input type="text" class="form-control" name="vehicule" id="vehicule"/>
                </div>
            </div>
            <div class="col">
                <div class="form-group">
                    <label>Km départ</label>
                    <input type="text" class="form-control" name="kmDepart"/>
                </div>
            </div>
            <div class="col">
                <div class="form-group">
                    <label>Heure départ</label>
                    <input type="time" class="form-control" name="heureDepart"/>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col">
                <div class="form-group">
                    <label>Convoyeur1</label>
                    <select class="form-control" name="convoyeur1" >
                        <option>Selectionnez convoyeur</option>
                        @foreach($convoyeurs as $convoyeur)
                        <option value="{{$convoyeur->id}}">{{$convoyeur->nomPrenoms}}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="col">
                <div class="form-group">
                    <label>Convoyeur 2</label>
                    <select class="form-control" name="convoyeur2" >
                        <option>Selectionnez convoyeur</option>
                        @foreach($convoyeurs as $convoyeur)
                        <option value="{{$convoyeur->id}}">{{$convoyeur->nomPrenoms}}</option>
                        @endforeach
                    </select>

                </div>
            </div>
            <div class="col">
                <div class="form-group">
                    <label>Convoyeur 3</label>
                    <select class="form-control" name="convoyeur3" >
                        <option>Selectionnez convoyeur</option>
                        @foreach($convoyeurs as $convoyeur)
                        <option value="{{$convoyeur->id}}">{{$convoyeur->nomPrenoms}}</option>
                        @endforeach
                    </select>
                </div>
            </div>
        </div><br/>

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
                    <label>kmArrivee</label>
                    <input type="text" class="form-control" name="kmArrivee"/>
                </div>
            </div>
            <div class="col">
                <div class="form-group">
                    <label>heureArrivee</label>
                    <input type="time" class="form-control" name="heureArrivee"/>
                </div>
            </div>

            <div class="col">
                <div class="row">
                    <div class="col">
                        <div class="form-group">
                            <label>vidangeGenerale</label>
                            <input type="number" class="form-control" name="vidangeGenerale"/>
                        </div>
                    </div>
                    <div class="col">
                        <div class="form-group">
                            <label>visiteTechnique</label>
                            <input type="number" class="form-control" name="visiteTechnique"/>
                        </div>
                    </div>
                    <div class="col">
                        <div class="form-group">
                            <label>vidangeCourroie</label>
                            <input type="number" class="form-control" name="vidangeCourroie"/>
                        </div>
                    </div>
                    <div class="col">
                        <div class="form-group">
                            <label>patente</label>
                            <input type="number" class="form-control" name="patente"/>
                        </div>
                    </div>
                    <div class="col">
                        <div class="form-group">
                            <label>assuranceFin</label>
                            <input type="number" class="form-control" name="assuranceFin"/>
                        </div>
                    </div>
                    <div class="col">
                        <div class="form-group">
                            <label>assuranceHeurePont</label>
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

    $(document).ready(function () {
        $("#numeroTournee").on("change", function () {
            const tournee = tournees.find(c => c.id === +this.value);
            if (tournee) {
                console.log(tournee);
                $("#date").val(tournee.date);
                $("#vehicule").val(tournee.idVehicule);
            }
        });
    });
</script>
@endsection
