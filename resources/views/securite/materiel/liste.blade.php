@extends('base')

@section('main')
<div class="burval-container">
    <div><h2 class="heading">Matériel</h2></div>
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

    <a href="/materiel" class="btn btn-info btn-sm">Nouveau</a>
    <br>
    <form action="#" method="get">
        @csrf
        <div class="row">
            <div class="col-4">
                <div class="form-group row">
                    <label for="" class="col-sm-5">Date début</label>
                    <input type="date" name="debut" class="form-control col-sm-7">
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col">
                <div class="form-group row">
                    <label for="" class="col-sm-5">Date fin</label>
                    <input type="date" name="fin" class="form-control col-sm-7">
                </div>
            </div>
            <div class="col">
                <button class="btn btn-primary btn-sm">Rechercher</button>
            </div>
            <div class="col"></div>
        </div>
    </form>
    <div class="row">
        <div class="col">
            <table class="table table-bordered" style="width: 100%;" id="listeMateriels">
                <thead>
                <tr>
                    <th>Tournée N°</th>
                    <th>Date</th>
                    <th>Centre régional</th>
                    <th>Centre</th>
                    <th>Opérateur radio</th>
                    <th>Chef de bord</th>
                    <th>Opération Ajout/Modif</th>
                </tr>
                </thead>
                <tbody>
                @foreach ($materiels as $materiel)
                <tr>
                    <td>{{$materiel->tournees->numeroTournee ?? 'Donnée indisponible'}}</td>
                    <td>{{$materiel->date}}</td>
                    <td>{{$materiel->tournees->centre ?? 'Donnée indisponible'}}</td>
                    <td>{{$materiel->tournees->centre_regional ?? 'Donnée indisponible'}}</td>
                    <td>{{$materiel->operateurRadios->nomPrenoms ?? ""}}</td>
                    <td>{{$materiel->cbs->nomPrenoms ?? 'Donnée indisponible'}}</td>
                    <td>
                        <div class="row">
                            <div class="col">
                                <a href="{{ route('materiel.edit',$materiel->id)}}" class="btn btn-primary btn-sm"></a>
                            </div>
                            <div class="col">
                                <form action="{{ route('materiel.destroy', $materiel->id)}}" method="post">
                                    @csrf
                                    @method('DELETE')
                                    <button class="btn btn-danger btn-sm" type="submit"></button>
                                </form>
                            </div>
                        </div>
                    </td>
                </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div><br /><br />


</div>
<script>
    $(document).ready( function () {
        $('#listeMateriels').DataTable({
            "language": {
                "url": "French.json"
            }
        });
    });
</script>
@endsection
