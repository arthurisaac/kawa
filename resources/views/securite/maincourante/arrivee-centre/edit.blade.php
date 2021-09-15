@extends("base")

@section("main")
    <div class="container">
        <br>
        <h2 class="heading">Arrivee centre</h2>
        <a href="/maincourante-arriveecentre">Liste arrivée centre</a>
        <br>
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div><br/>
        @endif

        @if(session()->get('success'))
            <div class="alert alert-success" id="successAlert">
                {{ session()->get('success') }}
            </div>
        @endif
        <br>
        <form method="post" action="/maincourante-arriveecentre/{{$centre->id}}" id="arriveeCentre" novalidate>
            @csrf
            @method("PATCH")

            <input type="hidden" name="maincourante" value="arriveeCentre"/>
            <div class="row">
                <div class="col-4">
                    <div class="form-group row">
                        <label class="col-sm-5">Heure arrivée</label>
                        <input type="time" name="heureArrivee" value="{{$centre->heureArrivee}}" class="form-control col-sm-7"/>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-5">Km arrivé</label>
                        <input type="number" name="kmArrive" value="{{$centre->kmArrive}}" class="form-control col-sm-7"/>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-5">Niveau carburant</label>
                        <select name="niveauCarburant" class="form-control col-sm-7">
                            <option>{{$centre->niveauCarburant}}</option>
                            <option>1/4</option>
                            <option>2/4</option>
                            <option>3/4</option>
                        </select>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-5">Fin de tournée</label>
                        <select name="finTournee" class="form-control col-sm-7">
                            <option>{{$centre->finTournee}}</option>
                            <option>fin</option>
                            <option>transite</option>
                        </select>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-5">Date arrivée centre</label>
                        <input type="date" name="dateArrivee" value="{{$centre->dateArrivee}}" class="form-control col-sm-7"/>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-5">Observation</label>
                        <textarea name="observation" class="form-control col-sm-7">{{$centre->observation}}</textarea>
                    </div>
                    <button class="btn btn-primary btn-sm" type="submit" id="acSubmit">Valider</button>
                </div>
            </div>
        </form>
    </div>


    <script>
        $(document).ready(function () {
            $('#listeArriveeCentre').DataTable({
                "language": {
                    "url": "French.json"
                }
            });
        });
    </script>
@endsection
