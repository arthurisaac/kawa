@extends('bases.logistique')

@section('main')
    @extends('bases.toolbar', ["title" => "Logistique", "subTitle" => "Produit"])
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
                <table class="table table-striped gy-7 gs-7 pt-0" id="liste">
                    <thead>
                    <tr class="fw-bold fs-6 text-gray-800 border-bottom-2 border-gray-200 bg-gradient" style="background: rgb(148,148,152);
background: linear-gradient(0deg, rgba(148,148,152,0.34217436974789917) 0%, rgba(220,211,172,1) 38%, rgba(255,216,1,1) 100%)!important;">
                            <td>Societe</td>
                            <td>Reference</td>
                            <td>Libelle</td>
                            <td>Description</td>
                            <td>Seuil</td>
                            <td>Stock alert</td>
                            <td>Ves</td>
                            <td>Prix (HT)</td>
                            <td>Actions</td>
                        </tr>
                    </thead>
                    <tbody>
                    @foreach ($produits as $produit)
                        <tr>
                            {{--<td>{{$produit->fournisseur}}</td>--}}
                            <td>{{$produit->fournisseurs->societe}}</td>
                            <td>{{$produit->reference}}</td>
                            <td>{{$produit->libelle}}</td>
                            <td>{{$produit->description}}</td>
                            <td>{{$produit->seuil}}</td>
                            <td>{{$produit->stockAlert}}</td>
                            <td>{{$produit->ves}}</td>
                            <td>{{$produit->prix}}</td>
                            <td>
                                <a href="{{ route('logistique-produit.edit',$produit->id)}}" class="btn btn-primary btn-sm">Modifier</a>
                                <form action="{{ route('logistique-produit.destroy', $produit->id)}}" method="post">
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
