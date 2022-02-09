@extends('bases.caisse')

@section('main')

    @extends('bases.toolbar', ["title" => "Comptabilité", "subTitle" => "Règlement de facture"])

    <!--begin::Post-->
    <div class="post d-flex flex-column-fluid" id="kt_post">
        <!--begin::Container-->
        <div id="kt_content_container" class="container-xxl">
            <!--begin::Row-->
            {{--<div class="titre"><span class="titre">Chiffre d'affaire</span> : <span id="chiffreAffaire"
                                                                                    class="text-danger chiffreAffaire"></span>
                <span
                    style="margin-left: 10px;">Nombre de passage : <span
                        class="text-danger">{{count($sites)}}</span></span>
            </div>--}}
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

        @if(session()->get('success'))
            <div class="alert alert-success">
                {{ session()->get('success') }}
            </div>
        @endif

        <form class="form-horizontal" method="post" action="{{ route('comptabilite-reglement-fature.update', $facture->id) }}">
            @method('PATCH')
            @csrf


        </form>

    </div>
@endsection
