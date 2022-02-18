@extends('bases.logistique')

@section('main')
    @extends('bases.toolbar', ["title" => "Logistique", "subTitle" => "Entrée ticket visiteur"])
<div class="burval-container">
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


    <div class="row">
        <div class="col">
            <table class="table table-bordered" style="width: 100%;" id="liste">
                <thead>
                <tr>
                    <td>ID</td>
                    <td>Début série</td>
                    <td>Fin série</td>
                    <td>Date</td>
                    <td>Fournisseur</td>
                    <td>Prix unitaire</td>
                    <td>Action</td>
                </tr>
                </thead>
                <tbody>
                @foreach ($entrees as $entree)
                    <tr>
                        <td>{{$entree->id}}</td>
                        <td>{{$entree->debutSerie}}</td>
                        <td>{{$entree->finSerie}}</td>
                        <td>{{$entree->date}}</td>
                        <td>{{$entree->fournisseur}}</td>
                        <td>{{$entree->prixUnitaire}}</td>
                        <td>
                            <div class="two-columns">
                                <div>
                                    <a href="{{ route('logistique-entree-ticket.edit', $entree->id)}}" class="btn btn-primary btn-sm">Modifier</a>
                                </div>
                                <div>
                                    <form action="{{ route('logistique-entree-ticket.destroy', $entree->id)}}" method="post">
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
