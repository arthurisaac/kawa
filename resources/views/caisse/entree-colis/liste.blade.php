@extends('base')

@section('main')
    <div class="burval-container">
        <div><h2 class="heading">Entrée colis</h2></div>
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
                            <td>Date</td>
                            <td>Heure</td>
                            <td>Agent de régulation</td>
                            <td>Actions</td>
                        </tr>
                    </thead>
                    <tbody>
                    @foreach ($colis as $coli)
                        <tr>
                            <td>{{$coli->date}}</td>
                            <td>{{$coli->heure}}</td>
                            <td>{{$coli->agents->nomPrenoms ?? "Donnée indisponible"}}</td>
                            <td>
                                <a href="{{ route('caisse-entree-colis.edit',$coli->id)}}" class="btn btn-primary btn-sm"></a>
                                <a class="btn btn-danger btn-sm"></a>
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
