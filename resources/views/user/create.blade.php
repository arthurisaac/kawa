@extends('base')

@section('main')
    <div class="burval-container">
        <div><h2 class="heading">Utilisateurs</h2></div>
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

        <div class="row">
            <div class="col">
                @if(session()->get('success-role'))
                    <div class="alert alert-success">
                        {{ session()->get('success-role') }}
                    </div><br/>
                @endif
                <form method="post" action="{{ route('user.store')}}">
                    @csrf

                    <input type="hidden" name="action" value="role" required>
                    <div class="card">
                        <div class="card-header" style="text-align:center;">
                            <h6>Nouveau role</h6>
                        </div>

                        <div class="card-body">
                            <div class="form-group">
                                <label for="">Role</label>
                                <input type="text" name="role" class="form-control" required>
                            </div>
                        </div>
                        <div class="card-footer">
                            <div class="form-group">
                                <button class="btn btn-primary button">Enregistrer</button>
                                <button class="btn btn-danger button">Annuler</button>
                            </div>
                        </div>
                    </div>
                </form>

                <br/>
                <br/>
                @if(session()->get('success-access'))
                    <div class="alert alert-success">
                        {{ session()->get('success-access') }}
                    </div><br/>
                @endif
                <form method="post" action="{{ route('user.store')}}">
                    @csrf

                    <input type="hidden" name="action" value="access" required>
                    <input type="hidden" name="accessID" id="accessID" required>
                    <div class="card">
                        <div class="card-header" style="text-align:center;">
                            <h6>Accès des rôles</h6>
                        </div>
                        <div class="card-body">

                            <div class="form-group">
                                <label for="">Rôle</label>
                                <select name="role" class="form-control" id="accessRole" required>
                                    <option></option>
                                    @foreach($roles as $role)
                                        <option value="{{$role->id}}">{{$role->role}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <fieldset>
                                    <legend>Accès</legend>
                                    <div>
                                        <input type="checkbox" class="service" name="services[]" value="commercial">
                                        Commercial <br/>
                                        <input type="checkbox" class="service" name="services[]" value="securité">
                                        Securité <br/>
                                        <input type="checkbox" class="service" name="services[]" value="caisse centrale">
                                        Caisse centrale <br/>
                                        <input type="checkbox" class="service" name="services[]" value="transport">
                                        Transport <br/>
                                        <input type="checkbox" class="service" name="services[]" value="regulation">
                                        Régulation <br/>
                                        <input type="checkbox" class="service" name="services[]" value="virgile">
                                        Virgile <br/>
                                        <input type="checkbox" class="service" name="services[]" value="comptabilité">
                                        Comptabilité <br/>
                                        <input type="checkbox" class="service" name="services[]" value="logistique">
                                        Logistique <br/>
                                        <input type="checkbox" class="service" name="services[]" value="rh"> RH <br/>
                                        <input type="checkbox" class="service" name="services[]" value="informatique">
                                        INFORMATIQUE <br/>
                                        <input type="checkbox" class="service" name="services[]" value="achat"> ACHAT
                                        <br/>
                                        <input type="checkbox" class="service" name="services[]" value="ssb"> SSB <br/>
                                    </div>
                                </fieldset>
                            </div>
                        </div>

                        <div class="card-footer">
                            <div class="form-group">
                                <button class="btn btn-primary button">Enregistrer</button>
                                <button class="btn btn-danger button">Annuler</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
            <div class="col">
                @if(session()->get('success-user'))
                    <div class="alert alert-success">
                        {{ session()->get('success-user') }}
                    </div><br/>
                @endif
                @if(session()->get('success-user-error'))
                    <div class="alert alert-warning">
                        {{ session()->get('success-user-error') }}
                    </div><br/>
                @endif

                <form action="{{ route('user.store')}}" method="post">
                    @csrf

                    <input type="hidden" name="action" value="user" required>
                    <div class="card">
                        <div class="card-header" style="text-align:center;">
                            <h6>Nouvel utilisateur</h6>
                        </div>

                        <div class="card-body">
                            <div class="form-group">
                                <label for="">Nom</label>
                                <input type="text" name="nom" class="form-control" required>
                            </div>
                            <div class="form-group">
                                <label for="">Email</label>
                                <input type="text" name="email" class="form-control" required>
                            </div>
                            <div class="form-group">
                                <label for="">Compte</label>
                                <input type="text" name="compte" class="form-control" required>
                            </div>
                            <div class="form-group">
                                <label for="">Password</label>
                                <input type="password" name="password" class="form-control" required>
                            </div>
                            <div class="form-group">
                                <label for="">Rôle</label>
                                <select name="role" class="form-control" required>
                                    <option></option>
                                    @foreach($roles as $role)
                                        <option value="{{$role->id}}">{{$role->role}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="card-footer">
                            <div class="form-group">
                                <button class="btn btn-primary button">Enregistrer</button>
                                <button class="btn btn-danger button">Annuler</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <script>
        let accesses = {!! json_encode($accesses) !!};

        $(document).ready( function () {
            const cbs = document.querySelectorAll('input[name="services[]"]');
            $("#accessRole").on("change", function () {
                const id = this.value;
                if (!isNaN(id)) {
                    for(let i of accesses) {
                        if (i.id === parseInt(id)) {
                            $("#accessID").val(i.id);
                            let srv = i.services.split(",");

                            cbs.forEach(cb => {
                                srv.includes(cb.value) ? cb.checked = true : cb.checked = false;
                            });
                        }
                    }
                }
            });
        });

    </script>
@endsection
