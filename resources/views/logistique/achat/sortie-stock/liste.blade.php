@extends('bases.logistique')

@section('main')
    @extends('bases.toolbar', ["title" => "Logistique", "subTitle" => "Sortie stock"])
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
                <table class="table table-striped gy-7 gs-7 pt-0" style="width: 100%;" id="liste">
                    <thead>
                    <tr class="fw-bold fs-6 text-gray-800 border-bottom-2 border-gray-200 bg-gradient" style="background: rgb(148,148,152);
background: linear-gradient(0deg, rgba(148,148,152,0.34217436974789917) 0%, rgba(220,211,172,1) 38%, rgba(255,216,1,1) 100%)!important;">
                            <td>ID Produit</td>
                            <td>Quantité</td>
                            <td>Date de sortie</td>
                            <td>Motif</td>
                            <td>Date de saisie</td>
                            <td>Observation</td>
                            <td>Service / Centre</td>
                            <td>Actions</td>
                        </tr>
                    </thead>
                    <tbody>
                    @foreach ($stocks as $stock)
                        <tr>
                            <td>{{$stock->produit}}</td>
                            <td>{{$stock->quantite}}</td>
                            <td>{{$stock->dateSortie}}</td>
                            <td>{{$stock->motif}}</td>
                            <td>{{$stock->dateSaisie}}</td>
                            <td>{{$stock->observation}}</td>
                            <td>{{$stock->service}}</td>
                            <td>
                                <div class="two-columns">
                                    <div>
                                        <a href="{{ route('logistique-sortie-stock.edit', $stock->id)}}" class="btn btn-primary btn-sm">Modifier</a>
                                    </div>
                                    <div>
                                        <form action="{{ route('logistique-sortie-stock.destroy', $stock->id)}}" method="post">
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
