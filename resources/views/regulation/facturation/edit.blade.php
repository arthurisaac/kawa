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

        <form method="post" action="{{ route('regulation-facturation.update', $regulation->id) }}">
            @method('PATCH')
            @csrf


        </form>


    </div>
    <script>
        let centres =  {!! json_encode($centres) !!};
        let centres_regionaux = {!! json_encode($centres_regionaux) !!};

        $(document).ready(function () {
            $("#centre").on("change", function () {
                $("#centre_regional option").remove();
                $('#centre_regional').append($('<option>', {text: "Choisir centre régional"}));

                const centre = centres.find(c => c.centre === this.value);
                const regions = centres_regionaux.filter(region => {
                    return region.id_centre === centre.id;
                });
                regions.map(({centre_regional}) => {
                    $('#centre_regional').append($('<option>', {
                        value: centre_regional,
                        text: centre_regional
                    }));
                })
            });
        });
    </script>

    <script>
        $(document).ready(function () {
            for (let i = 1; i <= 10; i++) {
                $('.numeroBox').append($('<option>', {text: i, value: i}));
            }

            let operatrice = 1;
            $("#ajouterOperatrice").on("click", function () {
                operatrice++;
                const customHTML = '<div class="row" style="align-items: center;">\n' +
                    '                        <div class="col-4">\n' +
                    '                            <h6>Opératrice de caisse n°<span>' + operatrice + '</span></h6>\n' +
                    '                        </div><input name="numeroOperatriceCaisse[]" type="hidden" value="' + operatrice + '">\n' +
                    '                        <div class="col-1">\n' +
                    '                            <hr class="burval-separator">\n' +
                    '                        </div>\n' +
                    '                        <div class="col">\n' +
                    '                            <div class="form-group row">\n' +
                    '                                <label class="col-sm-5">Nom et Prenom</label>\n' +
                    '                                <select type="text" name="operatriceCaisse[]" class="form-control col-sm-7">\n' +
                    '                                    <option></option>\n' +
                    '                                    @foreach($personnels as $personnel)\n' +
                    '                                        <option value="{{$personnel->id}}">{{$personnel->nomPrenoms}}</option>\n' +
                    '                                    @endforeach\n' +
                    '                                </select>\n' +
                    '                            </div>\n' +
                    '                            <div class="form-group row">\n' +
                    '                                <label class="col-sm-5">Numéro de box</label>\n' +
                    '                                <select name="operatriceCaisseBox[]" class="form-control col-sm-7 numeroBox">' +
                    '                               <option value=1>1</option>' +
                    '                               <option value=2>2</option>' +
                    '                               <option value=3>3</option>' +
                    '                               <option value=4>4</option>' +
                    '                               <option value=5>5</option>' +
                    '                               <option value=6>6</option>' +
                    '                               <option value=7>7</option>' +
                    '                               <option value=8>8</option>' +
                    '                               <option value=9>9</option>' +
                    '                               <option value=10>10</option>' +
                    '                               </select>\n' +
                    '                            </div>\n' +
                    '                        </div>\n' +
                    '                    </div>';

                $("#operatriceRow").append(customHTML);
            });
        });
    </script>

@endsection
