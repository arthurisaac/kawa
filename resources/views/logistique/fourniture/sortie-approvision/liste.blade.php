@extends('base')

@section('main')
<div class="burval-container">
    <div><h2 class="heading">Sortie fiche approvisionnement DAB</h2></div>
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

    <div class="row">
        <div class="col">
            <table class="table table-bordered" style="width: 100%;" id="liste">
                <thead>
                <tr>
                    <td>ID</td>
                    <td>Début série</td>
                    <td>Fin série</td>
                    <td>Date</td>
                    <td>Service</td>
                    <td>Prix</td>
                    <td>Action</td>
                </tr>
                </thead>
                <tbody>
                @foreach ($sorties as $sortie)
                    <tr>
                        <td>{{$sortie->id}}</td>
                        <td>{{$sortie->debutSerie}}</td>
                        <td>{{$sortie->finSerie}}</td>
                        <td>{{$sortie->date}}</td>
                        <td>{{$sortie->service}}</td>
                        <td>{{$sortie->prixUnitaire}}</td>
                        <td>
                            <div class="two-columns">
                                <div>
                                    <a href="{{ route('logistique-sortie-approvision.edit', $sortie->id)}}" class="btn btn-primary btn-sm">Modifier</a>
                                </div>
                                <div>
                                    <form action="{{ route('logistique-sortie-approvision.destroy', $sortie->id)}}" method="post">
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
