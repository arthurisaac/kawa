@extends('base')

@section('main')
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
            </tr>
            </thead>
            <tbody>
            @foreach($vehicules as $vehicule)
            <tr>
                <td>{{$vehicule->immatriculation}}</td>
                <td>{{$vehicule->marque}}</td>
                <td>{{$vehicule->type}}</td>
                <td>{{$vehicule->code}}</td>
                <td>{{$vehicule->num_chassis}}</td>
                <td>{{$vehicule->DPMC}}</td>
                <td>{{$vehicule->dateAcquisition}}</td>
                <td>{{$vehicule->centre}}</td>
                <td>{{$vehicule->centreRegional}}</td>
            </tr>
            @endforeach
            </tbody>
        </table>
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
