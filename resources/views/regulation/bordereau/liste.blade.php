@extends('base')

@section('main')
    <div class="burval-container">
        <div><h2 class="heading">Bordereau</h2></div>
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
            <br/>contrat_objet
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
                        <td>Date</td>
                        <td>Stock initial</td>
                        <td>N° début</td>
                        <td>N° fin</td>
                        <td>Quantité</td>
                        <td>Stock total</td>
                        <td>Seuil alerte 1</td>
                        <td>Seuil alerte 2</td>
                        <td>Seuil alerte 3</td>
                        <td>Centre</td>
                        <td>Centre régional</td>
                        <td>Actions</td>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach ($bordereaux as $bordereau)
                        <tr>
                            <td>{{$bordereau->date}}</td>
                            <td>{{$bordereau->stockInitial}}</td>
                            <td>{{$bordereau->numeroDebut}}</td>
                            <td>{{$bordereau->numeroFin}}</td>
                            <td>{{$bordereau->quantite}}</td>
                            <td>{{$bordereau->seuilAlerte1}}</td>
                            <td>{{$bordereau->seuilAlerte2}}</td>
                            <td>{{$bordereau->seuilAlerte3}}</td>
                            <td>{{$bordereau->centre}}</td>
                            <td>{{$bordereau->centreRegional}}</td>
                            <td>
                                <a href="{{ route('regulation-bordereau.edit',$bordereau->id)}}" class="btn btn-primary btn-sm">Modifier</a>
                                <form action="{{ route('regulation-bordereau.destroy', $bordereau->id)}}" method="post">
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
