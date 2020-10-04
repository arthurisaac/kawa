@extends('base')

@section('main')
    <div class="burval-container">
        <div><h2 class="heading">Commercial</h2></div>
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
                        <td>Nom du client</td>
                        <td>Situation géographique</td>
                        <td>Tel</td>
                        <td>Régime impot</td>
                        <td>BP</td>
                        <td>Ville</td>
                        <td>RC</td>
                        <td>NCC</td>
                        <td>Nom contact</td>
                        <td>Email</td>
                        <td>Fonction</td>
                        <td>Tel</td>
                        <td>Secteur activite</td>
                        <td>N°Contrat</td>
                        <td>Actions</td>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach ($ssb as $item)
                        <tr>
                            <td>{{$item->id}}</td>
                            <td>{{$item->nomClient}}</td>
                            <td>{{$item->situationGeographique}}</td>
                            <td>{{$item->telephoneClient}}</td>
                            <td>{{$item->regimeImpot}}</td>
                            <td>{{$item->boitePostale}}</td>
                            <td>{{$item->ville}}</td>
                            <td>{{$item->rc}}</td>
                            <td>{{$item->ncc}}</td>
                            <td>{{$item->nomContact}}</td>
                            <td>{{$item->emailContact}}</td>
                            <td>{{$item->fonction}}</td>
                            <td>{{$item->secteurActivite}}</td>
                            <td>{{$item->numeroContrat}}</td>
                            <td>
                                <a href="{{ route('ssb-commercial.edit',$item->id)}}" class="btn btn-primary btn-sm">Modifier</a>
                                <form action="{{ route('ssb-commercial.destroy', $item->id)}}" method="post">
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
