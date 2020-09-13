@extends('base')

@section('main')
<div class="burval-container">
    <div><h2 class="heading">Convoyeur</h2></div><br />
    @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div><br />
    @endif

    <div class="row">
        <div class="col">
            <table class="table table-bordered" style="width: 100%;" id="liste">
                <thead>
                <tr>
                    <td>Matricule</td>
                    <td>Nom et prénoms</td>
                    <td>Né le</td>
                    <td>Spécialité</td>
                    <td>Date embauche</td>
                    <td>Photo</td>
                </tr>
                </thead>
                <tbody>
                @foreach ($convoyeurs as $convoyeur)
                <tr>
                    <td>{{$convoyeur->matricule}}</td>
                    <td>{{$convoyeur->nomPrenoms}}</td>
                    <td>{{$convoyeur->dateNaissance}}</td>
                    <td>{{$convoyeur->fonction}}</td>
                    <td>{{$convoyeur->dateEmbauche}}</td>
                    <td><img src="{{ asset('storage/uploads/'.$convoyeur->photo) }}" style="height: 30px; width: auto; object-fit: cover; border-radius: 50%;" /> </td>
                </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
<script>
    $(document).ready( function () {
        $('#liste').DataTable({
            "language": {
                "url": "French.json"
            }
        });
    });
</script>
@endsection
