@extends('base')

@section('main')
    <div class="burval-container">
        <div><h2 class="heading">Etat tournée fond transporté période</h2></div>
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

        <form novalidate id="onSubmit" name="onSubmit" >
            @csrf
            <div class="row">
                <div class="col-4">
                    <div class="form-group row">
                        <label class="col-sm-4">Date de début</label>
                        <input type="date" name="from" class="form-control col-sm-8">
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-4">Date de fin</label>
                        <input type="date" name="to" class="form-control col-sm-8">
                    </div>
                </div>
                <div class="col-2">
                    <button class="btn btn-primary btn-sm" type="submit">Rechercher</button>
                </div>
                <div class="col-6"></div>
            </div>
        </form>
        <br/>
        <div class="row">
            <div class="col">
                <table class="table table-bordered" style="width: 100%;" id="liste">
                    <thead>
                    <tr>
                        <th>Date</th>
                        <th>N°Tournée</th>
                        <th>Tps roulage</th>
                        <th>Km parcouru</th>
                        <th>Somme transportée</th>
                        <th>Action</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($tournees as $tournee)
                        <tr>
                            <td>{{$tournee->date}}</td>
                            <td>{{$tournee->numeroTournee}}</td>
                            <td>{{(strtotime($tournee->heureArrivee) - strtotime($tournee->heureDepart)) / 60}}</td>
                            <td>{{$tournee->kmArrivee - $tournee->kmDepart}}</td>
                            <td>{{$tournee->coutTournee}}</td>
                            <td>
                                <a href="javascript:popupwnd('{{route('depart-tournee.show',$tournee->id)}}','no','no','no','no','no','no','','','1000','400')"
                                   target="_self" class="btn btn-primary btn-sm">Voir</a>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                    <tfoot>
                    <tr>
                        <th colspan="4">Somme</th>
                        <td>
                            <strong>
                                @foreach($total as $t)
                                    {{$t->total}}
                                @endforeach
                            </strong>
                        </td>
                        <td></td>
                    </tr>
                    </tfoot>
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
