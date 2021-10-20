@extends('base')

@section('main')
    <div class="burval-container">
        <div><h2 class="heading">Service</h2></div>
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

        <a href="/caisse-service-liste" class="btn btn-info btn-sm">Nouveau</a>
        <br>
        <br>
        <div class="row">
            <div class="col">
                <table class="table table-bordered" style="width: 100%;" id="liste">
                    <thead>
                    <tr>
                        <td>Date</td>
                        <td>Centre</td>
                        <td>Centre Régional</td>
                        <td>Chargée de Caisse</td>
                        <td>Heure prise service</td>
                        <td>Heure fin service</td>
                        <td>Chargée de Caisse adjointe</td>
                        <td>Heure prise service</td>
                        <td>Heure fin service</td>
                        <td>Actions</td>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach ($services as $service)
                        <tr>
                            <td>{{$service->date}}</td>
                            <td>{{$service->centre}}</td>
                            <td>{{$service->centreRegional}}</td>
                            <td>{{$service->chargeCaisses->nomPrenoms ?? ""}}</td>
                            <td>{{$service->chargeCaisseHPS}}</td>
                            <td>{{$service->chargeCaisseHFS}}</td>
                            <td>{{$service->chargeCaisseAdjoints->nomPrenoms ?? ""}}</td>
                            <td>{{$service->chargeCaisseAdjointHPS}}</td>
                            <td>{{$service->chargeCaisseAdjointHFS}}</td>
                            <td>
                                <a href="{{ route('caisse-service.edit',$service->id)}}" class="btn btn-primary btn-sm"></a>
                                <form action="{{ route('caisse-service.destroy', $service->id)}}" method="post">
                                    @csrf
                                    @method('DELETE')
                                    <button class="btn btn-danger btn-sm" type="submit"></button>
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
