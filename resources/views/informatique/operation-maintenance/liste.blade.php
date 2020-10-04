@extends('base')

@section('main')
    <div class="burval-container">
        <div><h2 class="heading">Opération maintenance</h2></div>
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
                    <td>Nombre de jours</td>
                    <td>Objet de la mission</td>
                    <td>Intervention effectuée</td>
                    <td>Rapport sur la mission</td>
                </tr>
                </thead>
                <tbody>
                @foreach ($maintenances as $maintenance)
                    <tr>
                        <td>{{$maintenance->id}}</td>
                        <td>{{$maintenance->centre}}</td>
                        <td>{{$maintenance->centreRegional}}</td>
                        <td>{{$maintenance->service}}</td>
                        <td>{{$maintenance->date}}</td>
                        <td>{{$maintenance->materielDefectueux}}</td>
                        <td>{{$maintenance->rapportMateriel}}</td>
                        <td>{{$maintenance->dateDebut}}</td>
                        <td>{{$maintenance->dateFin}}</td>
                        <td>{{$maintenance->opérationEffectuee}}</td>
                        <td>
                            <a href="{{ route('informatique-maintenance.edit',$maintenance->id)}}" class="btn btn-primary btn-sm">Modifier</a>
                            <form action="{{ route('informatique-maintenance.destroy', $maintenance->id)}}" method="post">
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
