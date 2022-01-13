@extends('base')

@section('main')
    <div class="burval-container">
        <div><h2 class="heading">Secteur d'activité</h2></div>
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
        <a class="btn btn-info btn-sm btn" href="{{ route('secteur-activite-create') }}">Ajouter +</a>
        <br><br>
        <div class="row">
            <div class="col">
                <table class="table table-bordered" style="width: 100%;" id="liste">
                    <thead>
                    <tr>
                        <td>ID</td>
                        <td>Secteur Activite</td>
                        <td>Localisation</td>
                        <td>Actions</td>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach ($secteurs as $secteur)
                        <tr>
                            <td>{{$secteur->id}}</td>
                            <td>{{$secteur->secteur_activite}}</td>
                            <td>{{$secteur->localisation->pays}}</td>
                            <td>
                                <a href="{{ route('secteur-activite-edit',$secteur->id)}}" class="btn btn-primary btn-sm">Modifier</a>
                                <form action="{{ route('secteur-activite', $secteur->id)}}" method="post">
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
