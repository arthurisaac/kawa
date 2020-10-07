@extends('base')

@section('main')
    <div class="burval-container">
        <div><h2 class="heading">Confirmation reception</h2></div>
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

        <form method="post" action="{{ route('regulation-confirmation.store') }}">
        @csrf

            <div class="row">
                <div class="col">
                    <div class="form-group row">
                        <label class="col-sm-5">N°Bordereau</label>
                        <input type="text" class="form-control col-sm-7" required>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-5">Destination</label>
                        <input type="text" class="form-control col-sm-7" required>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-5">Montant</label>
                        <input type="number" class="form-control col-sm-7" required>
                    </div>
                </div>
                <div class="col">
                    <div class="form-group row">
                        <label class="col-sm-5">Scellé</label>
                        <input type="text" class="form-control col-sm-7" required>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-5">Expéditeur</label>
                        <input type="text" class="form-control col-sm-7" required>
                    </div>
                </div>
                <div class="col">
                    <br />
                    <br />
                    <button class="btn btn-primary btn-sm" type="submit">Valider</button>
                    <button class="btn btn-danger btn-sm" type="reset">Annuler</button>
                </div>
            </div>
            <div class="row">
                <div class="col">
                    <div class="form-group row">
                        <label class="col-sm-5">CLIENT</label>
                        <select class="form-control col-sm-7" required>
                            <option></option>
                        </select>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-5">Nom destinataire</label>
                        <input type="text" class="form-control col-sm-7" required/>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-5">Date de reception</label>
                        <input type="date" class="form-control col-sm-7" required/>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-5">Lieu</label>
                        <input type="text" class="form-control col-sm-7" required/>
                    </div>
                </div>
                <div class="col"></div>
                <div class="col"></div>
            </div>


            <div class="row">
                <div class="col-4">
                    <br />
                    <button class="btn btn-primary btn-sm" type="submit">Valider</button>
                    <button class="btn btn-danger btn-sm" type="reset">Annuler</button>
                </div>
            </div>
        </form>
    </div>

@endsection
