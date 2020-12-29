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

        <table class="table table-bordered table-hover" id="table" style="width: 100%">
            <thead>
            <tr>
                <td>Date</td>
                <td>N°Tournée</td>
                <td>Véhicule</td>
                <td>Chauffeur</td>
                <td>Coût tournée</td>
                <td>Action</td>
            </tr>
            </thead>
            <tbody>
            @foreach ($departTournee as $depart)
                <tr>
                    <td>{{$depart->date}}</td>
                    <td>{{$depart->numeroTournee}}</td>
                    <td>{{strtoupper($depart->vehicules->immatriculation) ?? 'vehicule supprimé ' . $depart->idVehicule}}</td>
                    <td>{{$depart->chauffeurs->nomPrenoms ?? 'Peronnel non disponible ' . $depart->chauffeur}}</td>
                    <td>{{$depart->coutTournee}}</td>
                    <td>
                        <div class="row">
                            <div class="col">
                                <a href="{{ route('depart-tournee.edit',$depart->id)}}" class="btn btn-primary btn-sm">Modifier</a>
                            </div>
                            <div class="col">
                                <form action="{{ route('depart-tournee.destroy', $depart->id)}}" method="post">
                                    @csrf
                                    @method('DELETE')
                                    <button class="btn btn-danger btn-sm" type="submit">Supprimer</button>
                                </form>
                            </div>
                        </div>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>

        <script>
            $(document).ready(function () {
                $('#table').DataTable({
                    "language": {
                        "url": "French.json"
                    }
                });
            });
        </script>
@endsection
