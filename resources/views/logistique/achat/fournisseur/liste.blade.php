@extends('base')

@section('main')
    <div class="burval-container">
        <div><h2 class="heading">Fournisseur</h2></div>
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
                            <td>Societe</td>
                            <td>Civilite</td>
                            <td>Nom</td>
                            <td>Prénom</td>
                            <td>Adresse</td>
                            <td>Pays</td>
                            <td>Téléphone</td>
                            <td>Mobile</td>
                            <td>Fax</td>
                            <td>Email</td>
                            <td>Observation</td>
                            <td>Domaine</td>
                            <td>Delai de livraison</td>
                            <td>Condition de paiement</td>
                            <td>Actions</td>
                        </tr>
                    </thead>
                    <tbody>
                    @foreach ($fournisseurs as $fournisseur)
                        <tr>
                            <td>{{$fournisseur->societe}}</td>
                            <td>{{$fournisseur->civilite}}</td>
                            <td>{{$fournisseur->nom}}</td>
                            <td>{{$fournisseur->prenom}}</td>
                            <td>{{$fournisseur->adresse}}</td>
                            <td>{{$fournisseur->pays}}</td>
                            <td>{{$fournisseur->telephone}}</td>
                            <td>{{$fournisseur->mobile}}</td>
                            <td>{{$fournisseur->fax}}</td>
                            <td>{{$fournisseur->email}}</td>
                            <td>{{$fournisseur->observation}}</td>
                            <td>{{$fournisseur->domaine}}</td>
                            <td>{{$fournisseur->delaiLivraison}}</td>
                            <td>{{$fournisseur->conditionPaiement}}</td>
                            <td>
                                <a href="{{ route('logistique-fournisseur.edit',$fournisseur->id)}}" class="btn btn-primary btn-sm">Modifier</a>
                                <form action="{{ route('logistique-fournisseur.destroy', $fournisseur->id)}}" method="post">
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
