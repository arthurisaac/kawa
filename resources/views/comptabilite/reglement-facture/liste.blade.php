@extends('base')

@section('main')
    <div class="burval-container">
        <div><h2 class="heading">Règlement Facture</h2></div>
        <br/>
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

        <div class="row">
            <div class="col">
                <table class="table table-bordered" style="width: 100%;" id="liste">
                    <thead>
                        <tr>
                            <td>Facture</td>
                            <td>Date</td>
                            <td>Mode règlement</td>
                            <td>Piece comptable</td>
                            <td>Montant versé</td>
                            <td>Montant restant</td>
                            <td>Actions</td>
                        </tr>
                    </thead>
                    <tbody>
                    @foreach ($reglements as $reglement)
                        <tr>
                            <td>{{$reglement->facture}}</td>
                            <td>{{$reglement->date}}</td>
                            <td>{{$reglement->modeReglement}}</td>
                            <td>{{$reglement->pieceComptable}}</td>
                            <td>{{$reglement->montantVerse}}</td>
                            <td>{{$reglement->montantRestant}}</td>
                            <td>
                                <div class="two-columns">
                                    <div>
                                        <a href="{{ route('comptabilite-reglement-fature.update', $reglement->id)}}" class="btn btn-primary btn-sm">Modifier</a>
                                    </div>
                                    <div>
                                        <form action="{{ route('comptabilite-reglement-fature.destroy', $reglement->id)}}" method="post">
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
