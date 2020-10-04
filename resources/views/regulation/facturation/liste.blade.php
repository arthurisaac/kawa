@extends('base')

@section('main')
    <div class="burval-container">
        <div><h2 class="heading">Facturation</h2></div>
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
                        <td>Date</td>
                        <td>Type</td>
                        <td>Client</td>
                        <td>Site</td>
                        <td>N° début</td>
                        <td>N° fin</td>
                        <td>Quantité</td>
                        <td>Prix unitaire</td>
                        <td>Prix total</td>
                        <td>Actions</td>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach ($regulations as $regulation)
                        <tr>
                            <td>{{$regulation->date}}</td>
                            <td>{{$regulation->typeSecuripack}}</td>
                            <td>{{$regulation->client}}</td>
                            <td>{{$regulation->site}}</td>
                            <td>{{$bordereau->numeroDebut}}</td>
                            <td>{{$bordereau->numeroFin}}</td>
                            <td>{{$bordereau->quantite}}</td>
                            <td>{{$bordereau->prixUnitaire}}</td>
                            <td>{{$bordereau->prixTotal}}</td>
                            <td>
                                <a href="{{ route('regulation-facturation.edit',$regulation->id)}}" class="btn btn-primary btn-sm">Modifier</a>
                                <form action="{{ route('regulation-facturation.destroy', $regulation->id)}}" method="post">
                                    @csrf
                                    @method('DELETE')
                                    <button class="btn btn-danger btn-sm" type="submit">Supprimer</button>
                                </form>
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
