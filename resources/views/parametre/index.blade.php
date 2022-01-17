@extends('base')

@section('main')
    <div class="burval-container">
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

        <div class="container-fluid">
            <h2>Paramètre secteur activité</h2>
            <br>
            <a href="/parametres-option-niveau-caburant" class="btn btn-light btn-sm">Option niveau carburant</a>
            <br>
            <a href="/parametres-option-bordereau" class="btn btn-light btn-sm">Option bordereau</a>
            <br>
            <a href="/parametres-option-devise" class="btn btn-light btn-sm">Option devise</a>
            <br>
            <a href="/parametres-option-secteur-activite" class="btn btn-light btn-sm">Secteur d'activité</a>
        </div>

    </div>
@endsection
