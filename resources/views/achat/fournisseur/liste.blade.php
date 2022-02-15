@extends('bases.achat')

@section('main')
    @extends('bases.toolbar', ["title" => "Achat", "subTitle" => "Fournisseur"])
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
                <table class="table table-striped gy-7 gs-7 pt-0" style="width: 100%" id="liste">
                    <thead>
                    <tr class="fw-bold fs-6 text-gray-800 border-bottom-2 border-gray-200 bg-gradient" style="background: rgb(148,148,152);
background: linear-gradient(0deg, rgba(148,148,152,0.34217436974789917) 0%, rgba(220,211,172,1) 38%, rgba(255,216,1,1) 100%)!important;">
                        <td>ID</td>
                        <td>Denomination</td>
                        <td>Sigle</td>
                        <td>Secteur d'activité</td>
                        <td>Nom</td>
                        <td>Prenoms</td>
                        <td>Téléphone</td>
                        <td>Email</td>
                        <td>Email entreprise</td>
                        <td>Actions</td>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach ($fournisseurs as $fournisseur)
                        <tr class="fw-bold fs-6 text-gray-800 border-bottom-2 border-gray-200 bg-gradient" style="background: rgb(148,148,152);
background: linear-gradient(0deg, rgba(148,148,152,0.34217436974789917) 0%, rgba(220,211,172,1) 38%, rgba(255,216,1,1) 100%)!important;">
                            <td>{{$fournisseur->id}}</td>
                            <td>{{$fournisseur->denomination}}</td>
                            <td>{{$fournisseur->sigle}}</td>
                            <td>{{$fournisseur->secteur_activite}}</td>
                            <td>{{$fournisseur->nom}}</td>
                            <td>{{$fournisseur->prenoms}}</td>
                            <td>{{$fournisseur->telephone}}</td>
                            <td>{{$fournisseur->email}}</td>
                            <td>{{$fournisseur->email_entreprise}}</td>
                            <td>
                                <a href="{{ route('achat-fournisseur.edit',$fournisseur->id)}}"
                                   class="btn btn-primary btn-sm">Modifier</a>
                                <form action="{{ route('achat-fournisseur.destroy', $fournisseur->id)}}"
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
