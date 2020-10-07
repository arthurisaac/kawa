@extends('base')

@section('main')
    <div class="burval-container">
        <div><h2 class="heading">Facturation</h2></div>
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

        <form method="post" action="{{ route('regulation-facturation.store') }}">
            @csrf


            <div class="row">
                <div class="col-4">
                    <div class="form-group row">
                        <label class="col-sm-5">Date</label>
                        <input type="date" class="form-control col-sm-7">
                    </div>
                </div>
                <div class="col-4">
                    <div class="form-group row">
                        <label class="col-sm-5">Type de facturation</label>
                        <input type="text" class="form-control col-sm-7" />
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col">
                    <br />
                    <h6>SECURIPACK</h6>
                    <div class="form-group row">
                        <label class="col-sm-5">N° Debut</label>
                        <input type="number" class="form-control col-sm-7">
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-5">N° fin</label>
                        <input type="number" class="form-control col-sm-7" required>
                    </div>
                </div>
                <div class="col">
                    <br />
                    <h6>CLIENT</h6>
                    <div class="form-group row">
                        <label class="col-sm-5">Site</label>
                        <select type="number" class="form-control col-sm-7" required>
                            <option></option>
                        </select>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-5">Client</label>
                        <select type="number" class="form-control col-sm-7" required>
                            <option></option>
                        </select>
                    </div>
                </div>
                <div class="col"></div>
            </div>
            <div class="row">
                <div class="col">
                    <div class="form-group row">
                        <label class="col-sm-5">Prix unitaire</label>
                        <input type="number" class="form-control col-sm-7" required/>
                    </div>
                </div>
                <div class="col">
                    <div class="form-group row">
                        <label class="col-sm-5">Quantité</label>
                        <input type="number" class="form-control col-sm-7" required/>
                    </div>
                </div>
                <div class="col">
                    <div class="form-group row">
                        <label class="col-sm-5">Prix total</label>
                        <input type="number" class="form-control col-sm-7" />
                    </div>
                </div>
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
