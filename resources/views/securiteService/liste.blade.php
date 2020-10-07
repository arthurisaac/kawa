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
            <br/>
        @endif

        @if(session()->get('success'))
            <div class="alert alert-success">
                {{ session()->get('success') }}
            </div>
        @endif
        <div class="row">
            <div class="col-sm-12">
                <table class="table table-bordered table-hover" id="liste">
                    <thead>
                    <tr>
                        <td>Date</td>
                        <td>Centre</td>
                        <td>Cs Nom</td>
                        <td>Cs HPS</td>
                        <td>Cs HFS</td>
                        <td>EQ1 OR1 Nom</td>
                        <td>EQ1 OR1 HPS</td>
                        <td>EQ1 OR1 HFS</td>
                        <td>EQ1 OR2 Nom</td>
                        <td>EQ1 OR2 HPS</td>
                        <td>EQ1 OR2 HFS</td>
                        <td>EQ2 OR1 Nom</td>
                        <td>EQ2 OR1 HPS</td>
                        <td>EQ2 OR1 HFS</td>
                        <td>EQ2 OR2 Nom</td>
                        <td>EQ2 OR2 HPS</td>
                        <td>EQ2 OR2 HFS</td>
                        <td>EQ3 OR1 Nom</td>
                        <td>EQ3 OR1 HPS</td>
                        <td>EQ3 OR1 HFS</td>
                        <td>EQ3 OR2 Nom</td>
                        <td>EQ3 OR2 HPS</td>
                        <td>EQ3 OR2 HFS</td>
                        <td>Action</td>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($securiteServices as $service)
                        <tr>
                            <td>{{$service->date}}</td>
                            <td>{{$service->centre}}</td>
                            <td>{{$service->nomChargeDeSecurite}}</td>
                            <td>{{$service->heureDePriseServiceCs}}</td>
                            <td>{{$service->csHeureDeFinDeService}}</td>
                            <td>{{$service->eop11Nom}}</td>
                            <td>{{$service->eop11HeurePriseServ}}</td>
                            <td>{{$service->eop11HeureFinService}}</td>
                            <td>{{$service->eop112Nom}}</td>
                            <td>{{$service->eop12HeurePriseServ}}</td>
                            <td>{{$service->eop12HeureFinService}}</td>
                            <td>{{$service->eop21Nom}}</td>
                            <td>{{$service->eop21HeurePriseServ}}</td>
                            <td>{{$service->eop21HeureFinService}}</td>
                            <td>{{$service->eop22Nom}}</td>
                            <td>{{$service->eop22HeurePriseServ}}</td>
                            <td>{{$service->eop22HeureFinService}}</td>
                            <td>{{$service->eop31Nom}}</td>
                            <td>{{$service->eop31HeurePriseServ}}</td>
                            <td>{{$service->eop31HeureFinService}}</td>
                            <td>{{$service->eop32Nom}}</td>
                            <td>{{$service->eop32HeurePriseServ}}</td>
                            <td>{{$service->eop32HeureFinService}}</td>
                            <td>
                                <a href="{{ route('securite-service.edit',$service->id)}}" class="btn btn-primary btn-sm">Modifier</a>
                                <form action="{{ route('securite-service.destroy', $service->id)}}" method="post">
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
