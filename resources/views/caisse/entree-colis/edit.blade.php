@extends('base')

@section('main')
    <div class="burval-container">
        <div><h2 class="heading">Entrée de colis</h2></div>
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

        <form class="form-horizontal" method="post" action="{{ route('caisse-entree-colis.update', $coli->id) }}">
            @method('PATCH')
            @csrf
            <div class="row">
                <div class="col-3">
                    <div class="form-group row">
                        <label class="col-sm-5">Date</label>
                        <input value="{{$coli->date}}" type="date" name="date" class="form-control col-sm-7" required/>
                    </div>
                </div>
                <div class="col-3">
                    <div class="form-group row">
                        <label class="col-sm-5">Heure</label>
                        <input value="{{$coli->heure}}" type="time" name="heure" class="form-control col-sm-7"
                               required/>
                    </div>
                </div>
                <div class="col">
                    <div class="form-group row">
                        <label class="col-sm-4">Agent de régulation</label>
                        <select name="agentRegulation" class="form-control col-sm-7" required>
                            <option
                                value="{{$coli->agentRegulations->id}}">{{$coli->agentRegulations->nomPrenoms}}</option>
                            @foreach($personnels as $personnel)
                                <option value="{{$personnel->id}}">{{$personnel->nomPrenoms}}</option>
                            @endforeach
                        </select>
                    </div>

                </div>
            </div>
            <br/><br/>

            <div class="row">
                <div class="col-10">
                    <div class="colis">
                        @foreach($items as $item)
                            <div>
                                <div class="row">
                                    <div class="col-3">
                                        <div class="form-group">
                                            <label>Numero bordereau</label>
                                            <input type="text" name="bordereau[]" value="{{$item->bordereau}}" class="form-control" required/>
                                        </div>
                                    </div>
                                    <div class="col-3">
                                        <div class="form-group">
                                            <label>Expéditeur</label>
                                            <input name="expediteur[]" value="{{$item->expediteur}}" class="form-control" required/>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <input type="hidden" name="idItem[]" value="{{$item->id}}">
                                    <div class="col-2">
                                        <div class="form-group">
                                            <h6>Nombre total de colis</h6>
                                            <select name="totalColis[]"
                                                    class="form-control">
                                                <option>{{$item->totalColis}}</option>
                                                <option>1</option>
                                                <option>2</option>
                                                <option>3</option>
                                                <option>4</option>
                                                <option>5</option>
                                                <option>6</option>
                                                <option>7</option>
                                                <option>8</option>
                                                <option>9</option>
                                                <option>10</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col">
                                        <h6>Type de colis</h6>
                                        <div class="form-group row">
                                            <label class="col-sm-6">Sécuripack</label>
                                            <select name="typeColisSecuripack[]"
                                                    class="form-control col-sm-6">
                                                <option>{{$item->typeColisSecuripack}}</option>
                                                <option value="Extra grand">Extra grand</option>
                                                <option>Grand</option>
                                                <option value="Moyen">Moyen</option>
                                                <option value="Petit">Petit</option>
                                            </select>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-sm-6">Sac jute</label>
                                            <select name="typeColisSacjute[]" class="form-control col-sm-6">
                                                <option>{{$item->typeColisSacjute}}</option>
                                                <option value="Extra grand">Extra grand</option>
                                                <option>Grand</option>
                                                <option value="Moyen">Moyen</option>
                                                <option value="Petit">Petit</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-2">
                                        <h6 for="nombre_colis">Nombre de colis</h6>
                                        <div class="form-group">
                                            <input type="number" name="nombreColisSecuripack[]" id="nombre_colis"
                                                   class="form-control" value="{{$item->nombreColisSecuripack}}"/>
                                        </div>
                                        <div class="form-group">
                                            <input type="number" min="0" name="nombreColisSacjute[]"
                                                   class="form-control" value="{{$item->nombreColisSacjute}}"/>
                                        </div>
                                    </div>
                                    <div class="col-2">
                                        <h6>N° de scellé</h6>
                                        <div class="form-group row">
                                            <select name="numeroScelleSecuripack[]" class="form-control">
                                                <option>{{$item->numeroScelleSecuripack}}</option>
                                                <option>1</option>
                                                <option>2</option>
                                                <option>3</option>
                                                <option>4</option>
                                                <option>5</option>
                                                <option>6</option>
                                                <option>7</option>
                                                <option>8</option>
                                                <option>9</option>
                                                <option>10</option>
                                            </select>
                                        </div>
                                        <div class="form-group row">
                                            <select name="numeroScelleSacjute[]" class="form-control">
                                                <option>{{$item->numeroScelleSacjute}}</option>
                                                <option>1</option>
                                                <option>2</option>
                                                <option>3</option>
                                                <option>4</option>
                                                <option>5</option>
                                                <option>6</option>
                                                <option>7</option>
                                                <option>8</option>
                                                <option>9</option>
                                                <option>10</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col">
                                        <h6>Montant annoncé</h6>
                                        <div class="form-group">
                                            <input type="number" min="0" name="montantAnnonceSecuripack[]"
                                                   value="{{$item->montantAnnonceSecuripack}}" class="form-control">
                                        </div>
                                        <div class="form-group">
                                            <input type="number" min="0" name="montantAnnonceSacjute[]"
                                                   value="{{$item->montantAnnonceSacjute}}" class="form-control">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>

                <div class="col-2">
                    <br/>
                    {{--<button class="btn btn-primary" type="button" id="nouveau-colis">+</button>--}}
                </div>
            </div>
            <br/><br/>

            <div class="row">
                <div class="col-sm-6">

                    <div class="form-group">
                        <label>Observation</label>
                        <textarea name="observation" class="form-control"
                                  rows="5">{{$coli->observation}}</textarea><br/>
                    </div>
                    <div class="form-group">
                        <button type="submit" class="btn btn-primary btn-sm">Valider</button>
                        <button type="reset" class="btn btn-danger btn-sm">Annuler</button>
                    </div>
                </div>
            </div>
        </form>

    </div>
    <script>
        $(document).ready(function () {
            const colisHTML = '<div>\n' +
                '                            <div class="row">\n' +
                '                                <div class="col-3">\n' +
                '                                    <div class="form-group">\n' +
                '                                        <label>Numero bordereau</label>\n' +
                '                                        <input type="text" name="bordereau[]" class="form-control" required/>\n' +
                '                                    </div>\n' +
                '                                </div>\n' +
                '                                <div class="col-3">\n' +
                '                                    <div class="form-group">\n' +
                '                                        <label>Expéditeur</label>\n' +
                '                                        <input name="expediteur[]" class="form-control" required />\n' +
                '                                    </div>\n' +
                '                                </div>\n' +
                '                            </div>\n' +
                '                            <div class="row">\n' +
                '                                <div class="col-2">\n' +
                '                                    <div class="form-group">\n' +
                '                                        <h6>Nombre total de colis</h6>\n' +
                '                                        <select name="totalColis[]"\n' +
                '                                                class="form-control">\n' +
                '                                            <option></option>\n' +
                '                                            <option>1</option>\n' +
                '                                            <option>2</option>\n' +
                '                                            <option>3</option>\n' +
                '                                            <option>4</option>\n' +
                '                                            <option>5</option>\n' +
                '                                            <option>6</option>\n' +
                '                                            <option>7</option>\n' +
                '                                            <option>8</option>\n' +
                '                                            <option>9</option>\n' +
                '                                            <option>10</option>\n' +
                '                                        </select>\n' +
                '                                    </div>\n' +
                '                                </div>\n' +
                '                                <div class="col">\n' +
                '                                    <h6>Type de colis</h6>\n' +
                '                                    <div class="form-group row">\n' +
                '                                        <label class="col-sm-6">Sécuripack</label>\n' +
                '                                        <select name="typeColisSecuripack[]"\n' +
                '                                                class="form-control col-sm-6">\n' +
                '                                            <option></option>\n' +
                '                                            <option value="extra grand">Extra grand</option>\n' +
                '                                            <option>Grand</option>\n' +
                '                                            <option value="Moyen">Moyen</option>\n' +
                '                                            <option value="Petit">Petit</option>\n' +
                '                                        </select>\n' +
                '                                    </div>\n' +
                '                                    <div class="form-group row">\n' +
                '                                        <label class="col-sm-6">Sac jute</label>\n' +
                '                                        <select name="typeColisSacjute[]" class="form-control col-sm-6">\n' +
                '                                            <option></option>\n' +
                '                                            <option value="extra grand">Extra grand</option>\n' +
                '                                            <option>Grand</option>\n' +
                '                                            <option value="Moyen">Moyen</option>\n' +
                '                                            <option value="Petit">Petit</option>\n' +
                '                                        </select>\n' +
                '                                    </div>\n' +
                '                                </div>\n' +
                '                                <div class="col-2">\n' +
                '                                    <h6 for="nombre_colis">Nombre de colis</h6>\n' +
                '                                    <div class="form-group">\n' +
                '                                        <input type="number" name="nombreColisSecuripack[]" id="nombre_colis"\n' +
                '                                               class="form-control"/>\n' +
                '                                    </div>\n' +
                '                                    <div class="form-group">\n' +
                '                                        <input type="number" min="0" name="nombreColisSacjute[]"\n' +
                '                                               class="form-control"/>\n' +
                '                                    </div>\n' +
                '                                </div>\n' +
                '                                <div class="col-2">\n' +
                '                                    <h6>N° de scellé</h6>\n' +
                '                                    <div class="form-group row">\n' +
                '                                        <select name="numeroScelleSecuripack[]" class="form-control">\n' +
                '                                            <option></option>\n' +
                '                                            <option>1</option>\n' +
                '                                            <option>2</option>\n' +
                '                                            <option>3</option>\n' +
                '                                            <option>4</option>\n' +
                '                                            <option>5</option>\n' +
                '                                            <option>6</option>\n' +
                '                                            <option>7</option>\n' +
                '                                            <option>8</option>\n' +
                '                                            <option>9</option>\n' +
                '                                            <option>10</option>\n' +
                '                                        </select>\n' +
                '                                    </div>\n' +
                '                                    <div class="form-group row">\n' +
                '                                        <select name="numeroScelleSacjute[]" class="form-control">\n' +
                '                                            <option></option>\n' +
                '                                            <option>1</option>\n' +
                '                                            <option>2</option>\n' +
                '                                            <option>3</option>\n' +
                '                                            <option>4</option>\n' +
                '                                            <option>5</option>\n' +
                '                                            <option>6</option>\n' +
                '                                            <option>7</option>\n' +
                '                                            <option>8</option>\n' +
                '                                            <option>9</option>\n' +
                '                                            <option>10</option>\n' +
                '                                        </select>\n' +
                '                                    </div>\n' +
                '                                </div>\n' +
                '                                <div class="col">\n' +
                '                                    <h6>Montant annoncé</h6>\n' +
                '                                    <div class="form-group">\n' +
                '                                        <input type="number" min="0" name="montantAnnonceSecuripack[]" class="form-control">\n' +
                '                                    </div>\n' +
                '                                    <div class="form-group">\n' +
                '                                        <input type="number" min="0" name="montantAnnonceSacjute[]" class="form-control">\n' +
                '                                    </div>\n' +
                '                                </div>\n' +
                '                            </div>\n' +
                '                            <br ><br >\n' +
                '                        </div>';
            $("#nouveau-colis").on("click", function () {
                $(".colis").append(colisHTML);
            })
        })
    </script>

@endsection
