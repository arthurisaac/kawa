@extends('base')

@section('main')
    <div class="burval-container">
        <div class="titre"><span class="titre">Chiffre d'affaire</span> : <span id="chiffreAffaire" class="text-danger"></span> <span style="margin-left: 10px;">Nombre de passage : <span class="text-danger">{{count($sites)}}</span></span></div>
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

        <br>


        <br>
        <table id="table" class="table table-bordered table-hover" style="width: 100%">
            <thead>
            <tr>
                <th scope="col">No</th>
                <th scope="col">Centre regional</th>
                <th scope="col">Centre</th>
                <th scope="col">No. Tournée</th>
                <th scope="col">Date</th>
                <th scope="col">Client</th>
                <th scope="col">Site</th>
                <th scope="col">Op</th>
                <th scope="col">TDF</th>
                <th scope="col">Montant TDF</th>
                <th scope="col">Caisse</th>
                <th scope="col">Montant Caisse</th>
            </tr>
            </thead>
            <tbody>
            @foreach ($sites as $site)
                <tr>
                    <td>{{$site->id}}</td>
                    <td>{{$site->tournees->centre ?? ""}}</td>
                    <td>{{$site->tournees->centre_regional ?? ""}}</td>
                    <td>{{$site->tournees->numeroTournee}}</td>
                    <td>{{$site->tournees->date}}</td>
                    <td>{{$site->sites->clients->client_nom ?? ""}}</td>
                    <td>{{$site->sites->site ?? ""}}</td>
                    <td>{{$site->type ?? ""}}</td>
                    <td>
                        @switch($site->tdf)
                            @case("oo_vb_extamuros_bitume")
                            VB extramuros bitume
                            @break
                            @case("oo_vb_extramuros_piste")
                            VB extramuros piste
                            @break
                            @case("oo_vl_extramuros_bitume")
                            VL extramuros bitume
                            @break
                            @case("oo_vl_extramuros_piste")
                            VL extramuros piste
                            @break
                            @case("oo_vb_intramuros")
                            VB
                            @break
                            @case("oo_vl_intramuros")
                            VL
                            @break
                            @case("oo_ass_appro")
                            Assistance appro DAB
                            @break
                            @case("oo_dnf")
                            Dépôt non facturé
                            @break
                            @default
                            RAS
                        @endswitch
                    </td>
                    <td class="tdf">{{$site->sites["$site->tdf"] ?? 0}}</td>
                    <td>@switch($site->caisse)
                            @case("oo_mad")
                            MAD
                            @break
                            @case("oo_collecte")
                            Collecte
                            @break
                            @case("oo_cctv")
                            CCTV
                            @break
                            @case("oo_collecte_caisse")
                            Collecte caisse
                            @break
                            @default
                            RAS
                            @break
                        @endswitch</td>
                    <td class="caisse">{{$site->sites["$site->caisse"] ?? 0}}</td>
                </tr>
            @endforeach
            </tbody>

        </table>
    </div>
    <script>
        $(document).ready(function () {
            $('#table').DataTable({
                "language": {
                    "url": "French.json"
                }
            });

            let centres = {!! json_encode($centres) !!};
            let centres_regionaux = {!! json_encode($centres_regionaux) !!};
            let sites = {!! json_encode($sites_com) !!};
            let clients = {!! json_encode($clients) !!};

            const siteInput = $("#site");
            if (siteInput.val()) {
                console.log(siteInput.val())
                const site = sites.find(s => s.id === parseInt(siteInput.val() ?? 0));
                //if (site) $("select[name='site'] option[value="+ site?.id +"]").attr('selected','selected');
            }
            const clientInput = $("#client");
            if (clientInput.val()) {
                const client = clients.find(s => s.id === parseInt(clientInput.val() ?? 0));
                if (client) $("select[name='client'] option[value="+ client?.id +"]").attr('selected','selected');
            }
            const tdfInput = $("#tdf");
            if (tdfInput.val()) {
                switch (tdfInput.val()) {
                    case "oo_vb_extamuros_bitume":
                        $("select[name='tdf'] option[value=oo_vb_extamuros_bitume]").attr('selected','selected');
                        break;
                    case "oo_vb_extramuros_piste":
                        $("select[name='tdf'] option[value=oo_vb_extramuros_piste]").attr('selected','selected');
                        break;
                    case "oo_vl_extramuros_bitume":
                        $("select[name='tdf'] option[value=oo_vl_extramuros_bitume]").attr('selected','selected');
                        break;
                    case "oo_vl_extramuros_piste":
                        $("select[name='tdf'] option[value=oo_vl_extramuros_piste]").attr('selected','selected');
                        break;
                    case "oo_vb_intramuros":
                        $("select[name='tdf'] option[value=oo_vb_intramuros]").attr('selected','selected');
                        break;
                    case "oo_vl_intramuros":
                        $("select[name='tdf'] option[value=oo_vl_intramuros]").attr('selected','selected');
                        break;
                    case "oo_ass_appro":
                        $("select[name='tdf'] option[value=oo_ass_appro]").attr('selected','selected');
                        break;
                    case "oo_dnf":
                        $("select[name='tdf'] option[value=oo_dnf]").attr('selected','selected');
                        break;
                    default:
                        //tdf.eq(i).val("");
                        //console.log("aucun tdf");
                        break;
                }
            }

            const caisseInput = $("#caisse");
            if (caisseInput.val()) {
                switch (caisseInput.val()) {
                    case "oo_mad":
                        $("select[name='caisse'] option[value=oo_mad]").attr('selected','selected');
                        break;
                    case "oo_collecte":
                        $("select[name='caisse'] option[value=oo_collecte]").attr('selected','selected');
                        break;
                    case "oo_cctv":
                        $("select[name='caisse'] option[value=oo_cctv]").attr('selected','selected');
                        break;
                    case "oo_collecte_caisse":
                        $("select[name='caisse'] option[value=oo_collecte_caisse]").attr('selected','selected');
                        break;
                    default:
                        //caisse.eq(i).val("");
                        break;
                }
            }

            let totalTDF = 0;
            let totalCaisse = 0;
            $('table tr').each(function() {
                const rowTdf = $(this).find('.tdf');
                const rowCaisse = $(this).find('.caisse');
                if (rowTdf) totalTDF += parseFloat(rowTdf.html() ?? 0);
                if (rowCaisse) totalCaisse += parseFloat(rowCaisse.html() ?? 0);
            });
            $("#chiffreAffaire").html(Number(totalTDF + totalCaisse).toLocaleString());
        });
    </script>
@endsection
