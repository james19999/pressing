@extends('layouts.layout')

@section('content')
    <div class="col-12 ">
        <div style="padding-top: 10px">
            <div class="card-body">
                <div class="row">

                    <!-- Button trigger modal -->
                    @if (auth()->user()->hasRole('Super admin'))
                        <a href="{{ route('users.create') }}" type="button" class="btn btn-primary">
                            Ajouter un utilisateur
                        </a>
                    @endif
                    @include('partials.nav-links')
                </div>
                <!-- Modal -->
                <div class="modal fade" id="defaultModal" tabindex="-1" aria-labelledby="defaultModalLabel"
                    aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h4 class="modal-title" id="defaultModalLabel">Rôle</h4>
                                <button type="button" class="btn btn-light btn-circle dismiss" data-dismiss="modal"
                                    aria-label="Close">
                                    <span aria-hidden="true" class="material-icons">close</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <form action="{{ route('users.store') }}" method="POST">
                                    @csrf
                                    <input type="text" name="name" class="form-control col-12" id=""
                                        value="{{ old('name') }}" placeholder="Libelle" required>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Fermer</button>
                                <button type="submit" class="btn btn-primary">Valider</button>
                            </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>




        <div class="shadow card">
            <div class="card-body ">
                @if (Session::has('success'))
                    <div class="alert alert-success">
                        <strong>{{ session('success') }}</strong>
                    </div>
                @endif
                <div class="table-responsive">
                    <table id="example" class="table table-hover w-100">
                        <thead class="thead-light">
                            <tr>
                                <th style="width: 20%">N°</th>
                                <th style="width: 20%">Nom</th>
                                <th style="width: 20%">Email</th>
                                <th style="width: 20%">Rôles</th>
                                <th style="width: 20%">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php
                                $i = 1;
                            @endphp
                            @foreach ($users as $user)
                                <tr>

                                    <td style="color: black ">{{ $i++ }}</td>
                                    <td style="color: black ">{{ $user->name }} </td>
                                    <td style="color: black ">{{ $user->email }} </td>
                                    <td style="color: black ">
                                        @if (!empty($user->getRoleNames()))
                                            @foreach ($user->getRoleNames() as $rolename)
                                                <span style="color: white"
                                                    class="badge badge-success">{{ $rolename }}</span>
                                            @endforeach
                                        @endif

                                    </td>

                                    <td style="color: black " class=" pull-right">

                                        @if (auth()->user()->hasRole('Super admin'))
                                            <div class="btn-group btn-group-justified">

                                                <a href="{{ route('users.edit', $user) }}" style="color: white"
                                                    type="button" class="btn btn-warning" data-hover="tooltip">
                                                    <i class="material-icons">edit</i>
                                                    Modifier</a>

                                                <a href="{{ route('users.destroy', $user) }}" style="color: white"
                                                    type="button" class="btn btn-danger" data-hover="tooltip"
                                                    data-placement="top"
                                                    data-target="#modal-destroy-customers{{ $user->id }}"
                                                    data-toggle="modal" id="modal-destroy">
                                                    <i class="material-icons">delete</i>
                                                    Supprimer</a>



                                            </div>
                                        @endif

                                    </td>
                                </tr>

                                <div class="modal fade" id="modal-edit-customers{{ $user->id }}" tabindex="-1"
                                    aria-labelledby="defaultModalLabel" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h4 class="modal-title" id="defaultModalLabel">Modifier la role</h4>
                                                <button type="button" class="btn btn-light btn-circle dismiss"
                                                    data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true" class="material-icons">close</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                <form action="{{ route('users.update', $user) }}" method="POST">
                                                    @method('PUT')
                                                    @csrf
                                                    <input type="text" name="name" value="{{ $user->name }}"
                                                        class="form-control col-12" id="" placeholder="libelle"
                                                        required>

                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary"
                                                    data-dismiss="modal">Fermer</button>
                                                <button type="submit" class="btn btn-primary">Modifier</button>
                                            </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>

                                <div class="modal fade" id="modal-destroy-customers{{ $user->id }}" tabindex="-1"
                                    aria-labelledby="defaultModalLabel" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h4 class="modal-title" id="defaultModalLabel">Suppréssion en cours </h4>
                                                <button type="button" class="btn btn-light btn-circle dismiss"
                                                    data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true" class="material-icons">close</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                <h2 style="text-align: center"> Voulez-vous vraiment supprimer ? </h2>
                                                <form action="{{ route('users.destroy', $user) }}" method="POST">
                                                    @method('DELETE')
                                                    @csrf
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-danger"
                                                    data-dismiss="modal">Non</button>
                                                <button type="submit" class="btn btn-primary">Oui</button>
                                            </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            @endforeach

                        </tbody>
                        <tfoot class="thead-light">
                            <tr>
                                <th style="width: 20%">N°</th>
                                <th style="width: 20%">Nom</th>
                                <th style="width: 20%">Email</th>
                                <th style="width: 20%">Rôles</th>
                                <th style="width: 20%">Actions</th>
                            </tr>
                        </tfoot>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
