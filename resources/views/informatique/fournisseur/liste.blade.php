@extends('bases.informatique')

@section('main')
    @extends('bases.toolbar', ["title" => "Informatique", "subTitle" => "Liste Fournisseur"])
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
            <table class="table table-bordered table-hover" style="width: 100%" id="liste">
                <thead>
                <tr class="fw-bold fs-6 text-gray-800 border-bottom-2 border-gray-200 bg-gradient" style="background: rgb(148,148,152);
background: linear-gradient(0deg, rgba(148,148,152,0.34217436974789917) 0%, rgba(220,211,172,1) 38%, rgba(255,216,1,1) 100%)!important;">
                    <td>ID</td>
                    <td>Libellé</td>
                    <td>Spécialité</td>
                    <td>Localisation</td>
                    <td>Nationalité</td>
                    <td>Email</td>
                    <td>Contact</td>

                </tr>
                </thead>
                <tbody>
                @foreach ($fournisseurs as $fournisseur)
                    <tr>
                        <td>{{$fournisseur->id}}</td>
                        <td>{{$fournisseur->libelleFournisseur}}</td>
                        <td>{{$fournisseur->specialite}}</td>
                        <td>{{$fournisseur->localisation}}</td>
                        <td>{{$fournisseur->nationalite}}</td>
                        <td>{{$fournisseur->email}}</td>
                        <td>
                            <a href="{{ route('informatique-fournisseur.edit', $fournisseur->id)}}" class="btn btn-primary btn-sm">Modifier</a>
                            <form action="{{ route('informatique-fournisseur.destroy', $fournisseur->id)}}" method="post">
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
