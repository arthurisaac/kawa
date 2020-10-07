@extends('base')

@section('main')
    <div class="burval-container">
        <div><h2 class="heading">Achat matériel</h2></div>
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
                    <td>ID</td>
                    <td>Cenntre</td>
                    <td>Centre régional</td>
                    <td>Service</td>
                    <td>Date</td>
                    <td>Référence</td>
                    <td>Libellé</td>
                    <td>Quantité</td>
                    <td>Prix unitaire</td>
                    <td>Montant</td>
                    <td>Actions</td>
                </tr>
                </thead>
                <tbody>
                @foreach ($achats as $achat)
                    <tr>
                        <td>{{$achat->id}}</td>
                        <td>{{$achat->centre}}</td>
                        <td>{{$achat->centreRegional}}</td>
                        <td>{{$achat->service}}</td>
                        <td>{{$achat->date}}</td>
                        <td>{{$achat->reference}}</td>
                        <td>{{$achat->libelle}}</td>
                        <td>{{$achat->quantite}}</td>
                        <td>{{$achat->prixUnitaire}}</td>
                        <td>{{$achat->montant}}</td>
                        <td>
                            <a href="{{ route('informatique-achat-materiel.edit',$achat->id)}}" class="btn btn-primary btn-sm">Modifier</a>
                            <form action="{{ route('informatique-achat-materiel.destroy', $achat->id)}}" method="post">
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
