@extends('bases.achat')

@section('main')
    @extends('bases.toolbar', ["title" => "Achat", "subTitle" => "Produit"])
    <div class="burval-container">
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
                <table  class="table table-striped gy-7 gs-7 pt-0" style="width: 100%" id="liste">
                    <thead>
                    <tr class="fw-bold fs-6 text-gray-800 border-bottom-2 border-gray-200 bg-gradient" style="background: rgb(148,148,152);
background: linear-gradient(0deg, rgba(148,148,152,0.34217436974789917) 0%, rgba(220,211,172,1) 38%, rgba(255,216,1,1) 100%)!important;">
                        <td>ID</td>
                        <td>Date</td>
                        <td>Produit</td>
                        <td>Service</td>
                        <td>Direction</td>
                        <td>Direction générale</td>
                        <td>Centre</td>
                        <td>Centre régional</td>
                        <td>Quantité</td>
                        <td>Montant</td>
                        <td>Montant TTC</td>
                        <td>Montant HT</td>
                        <td>Suivi budgetaire</td>
                        <td>Actions</td>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach ($produits as $produit)
                        <tr class="fw-bold fs-6 text-gray-800 border-bottom-2 border-gray-200 bg-gradient" style="background: rgb(148,148,152);
background: linear-gradient(0deg, rgba(148,148,152,0.34217436974789917) 0%, rgba(220,211,172,1) 38%, rgba(255,216,1,1) 100%)!important;">
                            <td>{{$produit->id}}</td>
                            <td>{{$produit->date}}</td>
                            <td>{{$produit->produit}}</td>
                            <td>{{$produit->affectationService}}</td>
                            <td>{{$produit->affectationDirection}}</td>
                            <td>{{$produit->affectationDirectionGenerale}}</td>
                            <td>{{$produit->centre}}</td>
                            <td>{{$produit->centreRegional}}</td>
                            <td>{{$produit->quantite}}</td>
                            <td>{{$produit->montant}}</td>
                            <td>{{$produit->montantTTC}}</td>
                            <td>{{$produit->montantHT}}</td>
                            <td>{{$produit->suiviBudgetaire}}</td>
                            <td>
                                <a href="{{ route('achat-produit.edit',$produit->id)}}"
                                   class="btn btn-primary btn-sm">Modifier</a>
                                <form action="{{ route('achat-produit.destroy', $produit->id)}}"
                                      method="post">
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
