@extends('layouts.layout')


@section('content')
    <div class="col-12 ">
        <div style="padding-top: 10px">
            <div class="card-body">
                <div class="row">

                    <!-- Button trigger modal -->

                    @if (auth()->user()->hasRole('Super admin'))
                        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#defaultModal">
                            Ajouter un rôle
                        </button>
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
                                <form action="{{ route('roles.store') }}" method="POST">
                                    @csrf
                                    <input type="text" name="name" class="form-control col-12" id=""
                                        value="{{ old('name') }}" placeholder="Libelle" required>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-danger" data-dismiss="modal">Fermer</button>
                                <button type="submit" class="btn btn-success text-white">Valider</button>
                            </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="card shadow">
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
                                <th style="width: 20%">Libelle</th>
                                <th style="width: 20%">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php
                                $i = 1;
                            @endphp
                            @foreach ($roles as $role)
                                <tr>

                                    <td style="color: black ">{{ $i++ }}</td>
                                    <td style="color: black ">{{ $role->name }} </td>

                                    <td style="color: black " class=" pull-right">
                                        @if (auth()->user()->hasRole('Super admin'))
                                            <div class="btn-group btn-group-justified">

                                                <a href="{{ route('roles.update', $role) }}" style="color: white"
                                                    type="button" class="btn btn-warning" data-hover="tooltip"
                                                    data-placement="top"
                                                    data-target="#modal-edit-customers{{ $role->id }}"
                                                    data-toggle="modal" id="modal-edit">
                                                    <i class="material-icons">edit</i>
                                                    Modifier</a>

                                                <a href="{{ route('add-role-permission', $role) }}" style="color: white"
                                                    type="button" class="btn btn-info" data-hover="tooltip"
                                                    data-placement="top">
                                                    <i class="material-icons">perm_identity</i>
                                                    Attribuer des permissions</a>

                                                <a href="{{ route('roles.destroy', $role) }}" style="color: white"
                                                    type="button" class="btn btn-danger" data-hover="tooltip"
                                                    data-placement="top"
                                                    data-target="#modal-destroy-customers{{ $role->id }}"
                                                    data-toggle="modal" id="modal-destroy">
                                                    <i class="material-icons">delete</i>
                                                    Supprimer</a>



                                            </div>
                                        @endif
                                    </td>
                                </tr>

                                <div class="modal fade" id="modal-edit-customers{{ $role->id }}" tabindex="-1"
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
                                                <form action="{{ route('roles.update', $role) }}" method="POST">
                                                    @method('PUT')
                                                    @csrf
                                                    <input type="text" name="name" value="{{ $role->name }}"
                                                        class="form-control col-12" id="" placeholder="libelle"
                                                        required>

                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-danger"
                                                    data-dismiss="modal">Fermer</button>
                                                <button type="submit"
                                                    class="btn btn-success text-white">Modifier</button>
                                            </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>

                                <div class="modal fade" id="modal-destroy-customers{{ $role->id }}" tabindex="-1"
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
                                                <h2 style="text-align: center"> Voulez-vous supprimé cette role ? </h2>
                                                <form action="{{ route('roles.destroy', $role) }}" method="POST">
                                                    @method('DELETE')
                                                    @csrf
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-danger"
                                                    data-dismiss="modal">Non</button>
                                                <button type="submit" class="btn btn-success text-white">Oui</button>
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
                                <th style="width: 20%">Libelle</th>
                                <th style="width: 20%">Actions</th>
                            </tr>
                        </tfoot>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
