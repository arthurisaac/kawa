@extends('base')

@section('main')
<div class="burval-container">
    <div><h2 class="heading">Site</h2></div>
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

    <br/>
    <table id="table_client_information" class="table table-bordered table-hover" style="width: 100%;">
        <thead>
        <tr>
            <td>Client</td>
            <td>Site</td>
            <td>VB extramuros bitume</td>
            <td>VB extramuros piste</td>
            <td>VL extramuros bitume</td>
            <td>VL extramuros piste</td>
            <td>VB</td>
            <td>VL</td>
            <td>Niveau</td>
            <td>Accompagnement</td>
            <td>Gestion borne</td>
            <td>GAB</td>
            <td>MAD</td>
            <td>Collecte</td>
            <td>CTV</td>
            <td>Collecte + caisse</td>
            <td>Sécuripack</td>
            <td>Sac jute</td>
            <td>scelle</td>
            <td>Actions</td>
        </tr>
        </thead>
        <tbody>
        @foreach ($sites as $site)
        <tr>
            <td>{{$site->client}}</td>
            <td>{{$site->site}}</td>
            <td>{{$site->oo_vb_extamuros_bitume}}</td>
            <td>{{$site->oo_vb_extramuros_piste}}</td>
            <td>{{$site->oo_vl_extramuros_bitume}}</td>
            <td>{{$site->oo_vl_extramuros_piste}}</td>
            <td>{{$site->oo_vb_intramuros}}</td>
            <td>{{$site->oo_vl_intramuros}}</td>
            <td>{{$site->oo_gestion_gab_niveau}}</td>
            <td>{{$site->oo_gestion_gab_prix}}</td>
            <td>{{$site->oo_borne_operation}}</td>
            <td></td>
            <td>{{$site->oo_mad}}</td>
            <td>{{$site->oo_collecte}}</td>
            <td>{{$site->oo_cctv}}</td>
            <td></td>
            <td>{{$site->oo_securipack}}</td>
            <td>{{$site->oo_sac_juste}}</td>
            <td>{{$site->oo_scelle}}</td>
            <td>
                <a href="{{ route('commercial-site.edit', $site->id)}}" class="btn btn-primary btn-sm">Modifier</a>
                <form action="{{ route('commercial-site.destroy', $site->id)}}" method="post">
                    @csrf
                    @method('DELETE')
                    <button class="btn btn-danger btn-sm" type="submit">Supprimer</button>
                </form>
            </td>
        </tr>
        @endforeach
        </tbody>
    </table>

    <br/>
    {{--<table class="table table-bordered table-hover">
        <thead>
            <tr>
                <td>TDF VL</td>
                <td>MAD Caisse</td>
                <td>Collecte</td>
                <td>Garde de&nbsp; fonds</td>
                <td>Comptage + Tri</td>
                <td>Gestion ATM</td>
                <td>Maintenance ATM</td>
                <td>Consommable ATM</td>
                <td>Tarif(HT)</td>
                <td>Km bitume</td>
                <td>Km piste</td>
                <td>Centre</td>
            </tr>
        </thead>
        <tbody>
        @foreach ($sites as $site)
            <tr>
                <td>{{$site->tarif_tdf_vl}}</td>
                <td>{{$site->forfait_mensuel_mad}}</td>
                <td>{{$site->tarif_collecte_caissiere}}</td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
            </tr>
        @endforeach
        </tbody>
    </table>--}}

    <br/>
    {{--<table class="table table-bordered table-hover">
        <thead>
        <tr>
            <td>Centre Abidjan Nord</td>
            <td>Centre Abidjan Sud</td>
            <td>Centre Abengourou</td>
            <td>Centre de Yamoussokro</td>
            <td>Centre de Bouak&eacute;</td>
            <td>Centre de Korogo</td>
            <td>Centre de Man</td>
            <td>Centre de Daloa</td>
            <td>Centre de San Pedro</td>
            <td>Fonction du conact</td>
        </tr>
        </thead>
        <tbody>
        </tbody>
    </table>--}}
</div>
<script>
    $(document).ready(function () {
        $('#table_client_information').DataTable({
            "language": {
                "url": "../French.json"
            }
        });
    });
</script>
@endsection
