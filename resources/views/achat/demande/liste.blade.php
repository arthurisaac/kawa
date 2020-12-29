@extends('base')

@section('main')
    <div class="burval-container">
        <div><h2 class="heading">Demande Achat</h2></div>
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
                        <td>date</td>
                        <td>identite</td>
                        <td>service</td>
                        <td>nom_demandeur</td>
                        <td>telephone_demandeur</td>
                        <td>objet_achat</td>
                        <td>montant_retenu</td>
                        <td>Actions</td>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach ($demandes as $demande)
                        <tr>
                            <td>{{$demande->id}}</td>
                            <td>{{$demande->date}}</td>
                            <td>{{$demande->identite}}</td>
                            <td>{{$demande->service}}</td>
                            <td>{{$demande->nom_demandeur}}</td>
                            <td>{{$demande->telephone_demandeur}}</td>
                            <td>{{$demande->objet_achat}}</td>
                            <td>{{$demande->montant_retenu}}</td>
                            <td>
                                <a href="{{ route('achat-demande.edit',$demande->id)}}"
                                   class="btn btn-primary btn-sm">Modifier</a>
                                <form action="{{ route('achat-demande.destroy', $demande->id)}}"
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
