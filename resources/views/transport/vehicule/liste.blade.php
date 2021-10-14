@extends('base')

@section('main')

<div class="burval-container">
    <div><h2 class="heading">Véhicule</h2></div>
    <br />
    @if(session()->get('success'))
        <div class="alert alert-success">
            {{ session()->get('success') }}
        </div>
    @endif
    <br />
    <a href="/caisse-service-liste" class="btn btn-info btn-sm">Nouveau</a>
    <br>
    <br>
    <div class="row">
        <div class="col-sm-12">
            <table class="table table-bordered table-hover" style="width: 100%" id="liste">
                <thead>
                <tr>
                    <td>Immatriculation</td>
                    <td>Marque</td>
                    <td>Type</td>
                    <td>Code</td>
                    <td>N°Chassis</td>
                    <td>DPMC</td>
                    <td>Date acquisition</td>
                    <td>centre</td>
                    <td>Centre Régional</td>
                    <td>Actions</td>
                </tr>
                </thead>
                <tbody>
                @foreach($vehicules as $vehicule)
                <tr>
                    <td>{{strtoupper($vehicule->immatriculation)}}</td>
                    <td>{{$vehicule->marque}}</td>
                    <td>{{$vehicule->type}}</td>
                    <td>{{$vehicule->code}}</td>
                    <td>{{$vehicule->num_chassis}}</td>
                    <td>{{date('d/m/Y', strtotime($vehicule->DPMC))}}</td>
                    <td>{{date('d/m/Y', strtotime($vehicule->dateAcquisition))}}</td>
                    <td>{{$vehicule->centre}}</td>
                    <td>{{$vehicule->centreRegional}}</td>
                    <td>
                        <div class="row">
                            <div class="col">
                                <a href="{{ route('vehicule.edit',$vehicule->id)}}" class="btn btn-primary btn-sm"></a>
                            </div>
                            <div class="col">
                                <form action="{{ route('vehicule.destroy', $vehicule->id)}}" method="post">
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
    </div>
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
