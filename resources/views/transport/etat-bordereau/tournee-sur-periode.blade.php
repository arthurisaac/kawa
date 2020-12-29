@extends('base')

@section('main')
    <div class="burval-container">
        <div><h2 class="heading">Etat tournee sur période</h2></div>
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
                <table class="table table-bordered" id="liste" style="width: 100%;">
                    <thead>
                    <tr>
                        <th>ID</th>
                        <th>Date</th>
                        <th>N°Tournée</th>
                        <th>Tps roulade (en minutes)</th>
                        <th>Km parcourus</th>
                        <th>Actions</th>
                        {{--<th>Site 1/N°BT/TT</th>
                        <th>Site 2/N°BT/TT</th>
                        <th>Site 3/N°BT/TT</th>
                        <th>Site 4N°BT/TT</th>
                        <th>Site 5N°BT/TT</th>
                        <th>Site 6N°BT/TT</th>
                        <th>Site 7N°BT/TT</th>
                        <th>Site 8N°BT/TT</th>
                        <th>Site 9N°BT/TT</th>
                        <th>Site 10N°BT/TT</th>
                        <th>Site 11N°BT/TT</th>
                        <th>Site 12N°BT/TT</th>
                        <th>Site 13N°BT/TT</th>
                        <th>Site 14N°BT/TT</th>
                        <th>Site 15N°BT/TT</th>
                        <th>Site 16N°BT/TT</th>
                        <th>Site 17N°BT/TT</th>
                        <th>Site 18N°BT/TT</th>
                        <th>Site 19N°BT/TT</th>
                        <th>Site 20N°BT/TT</th>--}}
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($tournees as $tournee)
                        <tr>
                            <td>{{$tournee->id}}</td>
                            <td>{{$tournee->date}}</td>
                            <td>{{$tournee->numeroTournee}}</td>
                            <td>{{(strtotime($tournee->heureArrivee) - strtotime($tournee->heureDepart)) / 60}}</td>
                            <td>{{$tournee->kmArrivee - $tournee->kmDepart}}</td>
                            <td>
                                <a href="javascript:popupwnd('{{route('depart-tournee.show',$tournee->id)}}','no','no','no','no','no','no','','','1000','400')"
                                   target="_self" class="btn btn-primary btn-sm">Voir</a>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                    <tfoot>
                    <tr>
                        <td colspan="6">Somme</td>
                    </tr>
                    <tr>
                        <td colspan="6">Compteur</td>
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
