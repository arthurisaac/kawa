@extends('base')

@section('main')
<div class="burval-container">
    <div><h2 class="heading">Carburant prévision</h2></div>
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

    <form method="post" action="{{ route('carburant-prevision.store') }}">
        @csrf
        <div class="row">
            <div class="col-3">
                <div class="form-group row">
                    <label class="col-sm-2">Du</label>
                    <input type="date" class="form-control col-sm-10" name="dateDu"/>
                </div>
            </div>
            <div class="col-3">
                <div class="form-group row">
                    <label class="col-sm-2">Au</label>
                    <input type="date" class="form-control col-sm-10" name="dateAu"/>
                </div>
            </div>
            <div class="col">
                <div class="form-group row">
                    <label class="col-sm-2">AXE</label>
                    <input type="text" class="form-control col-sm-10" name="axe"/>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col">
                <div class="form-group row">
                    <label class="col-sm-5">Type véhicule</label>
                    <select class="form-control col-sm-7" name="typeVehicule">
                        <option type="VL">VL</option>
                        <option type="VB">VB</option>
                    </select>
                </div>
            </div>
            <div class="col">
                <div class="form-group row">
                    <label class="col-sm-5">Distance</label>
                    <input type="number" class="form-control col-sm-7" name="distance"/>
                </div>
            </div>
            <div class="col">
                <div class="form-group row">
                    <label class="col-sm-5">Conso/100</label>
                    <input type="number" class="form-control col-sm-7" name="conso100"/>
                </div>
            </div>
            <div class="col">
                <div class="form-group row">
                    <label class="col-sm-5">Litrage</label>
                    <input type="number" class="form-control col-sm-7" name="litrage"/>
                </div>
            </div>
            <div class="col">
                <div class="form-group row">
                    <label class="col-sm-5">Coût carburant</label>
                    <input type="number" class="form-control col-sm-7" name="coutCarburant"/>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col">
                <div class="form-group row">
                    <label class="col-sm-5">Dess/Semaine</label>
                    <input type="number" class="form-control col-sm-7" name="dessSemaine"/>
                </div>
            </div>
            <div class="col">
                <div class="form-group row">
                    <label class="col-sm-5">Coût/Semaine</label>
                    <input type="number" class="form-control col-sm-7" name="coutSemaine"/>
                </div>
            </div>
            <div class="col">
                <div class="form-group row">
                    <label class="col-sm-5">Dess/Mois</label>
                    <input type="number" class="form-control col-sm-7" name="dessMois"/>
                </div>
            </div>
            <div class="col">
                <div class="form-group row">
                    <label class="col-sm-5">Coût/Mois</label>
                    <input type="number" class="form-control col-sm-7" name="coutMois"/>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="form-group">
                <button type="submit" class="btn btn-sm btn-primary"> Valider</button>
                <button type="reset" class="btn btn-sm btn-danger"> Annuler</button>
            </div>
        </div>
        <br/>
        <div class="row">
            <table class="table table-bordered" style="100%" id="liste">
                <thead>
                <tr>
                    <th>Date debut</th>
                    <th>Date fin</th>
                    <th>Axe</th>
                    <th>Type</th>
                    <th>Km</th>
                    <th>Conso/100</th>
                    <th>Litrage</th>
                    <th>Litrage</th>
                    <th>Coût carburant</th>
                    <th>Dess/semaine</th>
                    <th>Cout/semaine</th>
                    <th>Dess/mois</th>
                    <th>Coût/mois</th>
                </tr>
                </thead>
                <tbody>
                @foreach ($carburants as $carburant)
                <tr>
                    <td>{{$carburant->dateDu}}</td>
                    <td>{{$carburant->dateAu}}</td>
                    <td>{{$carburant->dateAu}}</td>
                    <td>{{$carburant->axe}}</td>
                    <td>{{$carburant->typeVehicule}}</td>
                    <td>{{$carburant->distance}}</td>
                    <td>{{$carburant->conso100}}</td>
                    <td>{{$carburant->litrage}}</td>
                    <td>{{$carburant->coutCarburant}}</td>
                    <td>{{$carburant->dessSemaine}}</td>
                    <td>{{$carburant->coutSemaine}}</td>
                    <td>{{$carburant->dessMois}}</td>
                    <td>{{$carburant->coutMois}}</td>
                </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </form>
</div>
<script>
    $(document).ready(function () {
        $('#liste').DataTable({
            "language": {
                "url": "French.json"
            }
        });
    });
</script>
@endsection
