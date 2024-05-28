@extends('layouts.layout')


@section('content')
    <div class="col-12 ">
        <div>
            <div class="card-body">
                <!-- Button trigger modal -->
                <div class="row">

                    <button type="button" class="btn btn-primary " data-toggle="modal" data-target="#defaultModal">
                        Ajouter un pressing
                    </button>
                </div>

                <!-- Modal -->
                <div class="modal fade" id="defaultModal" tabindex="-1" aria-labelledby="defaultModalLabel"
                    aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h4 class="modal-title" id="defaultModalLabel">Pressings</h4>
                                <button type="button" class="btn btn-light btn-circle dismiss" data-dismiss="modal"
                                    aria-label="Close">
                                    <span aria-hidden="true" class="material-icons">close</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <form action="{{ route('pressings.store') }}" method="POST">
                                    @csrf
                                    <input type="text" name="name" class="mb-3 form-control col-12 " id=""
                                        value="{{ old('name') }}" placeholder="Nom" required>
                                    <input type="text" name="phone" class="mb-3 form-control col-12" id=""
                                        value="{{ old('phone') }}" placeholder="téléphone" required>
                                    <input type="text" name="address" class="form-control col-12" id=""
                                        value="{{ old('address') }}" placeholder="Adresse" required>
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
                                <th style="width: 20%">Téléphone</th>
                                <th style="width: 20%">Adresse</th>
                                <th style="width: 20%">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php
                                $i = 1;
                            @endphp
                            @foreach ($pressings as $pressing)
                                <tr>

                                    <td style="color: black ">{{ $i++ }}</td>
                                    <td style="color: black ">{{ $pressing->name }} </td>
                                    <td style="color: black ">{{ $pressing->email ?? '@' }} </td>
                                    <td style="color: black ">{{ $pressing->phone ?? 'N/A' }} </td>
                                    <td style="color: black ">{{ $pressing->address ?? 'N/A' }} </td>

                                    <td style="color: black " class=" pull-right">

                                        <div class="btn-group btn-group-justified">

                                            <a href="{{ route('pressings.update', $pressing) }}" style="color: white"
                                                type="button" class="btn btn-warning" data-hover="tooltip"
                                                data-placement="top" data-target="#modal-edit-customers{{ $pressing->id }}"
                                                data-toggle="modal" id="modal-edit">
                                                <i class="material-icons">edit</i>
                                                Modifier</a>

                                            <a href="{{ route('pressings.destroy', $pressing) }}" style="color: white"
                                                type="button" class="btn btn-danger" data-hover="tooltip"
                                                data-placement="top"
                                                data-target="#modal-destroy-customers{{ $pressing->id }}"
                                                data-toggle="modal" id="modal-destroy">
                                                <i class="material-icons">delete</i>
                                                Supprimer</a>



                                        </div>
                                    </td>
                                </tr>

                                <div class="modal fade" id="modal-edit-customers{{ $pressing->id }}" tabindex="-1"
                                    aria-labelledby="defaultModalLabel" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h4 class="modal-title" id="defaultModalLabel">Modifier le pressing</h4>
                                                <button type="button" class="btn btn-light btn-circle dismiss"
                                                    data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true" class="material-icons">close</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                <form action="{{ route('pressings.update', $pressing) }}" method="POST">
                                                    @method('PUT')
                                                    @csrf
                                                    <input type="text" name="name"
                                                        value="{{ old('name', $pressing->name) }}"
                                                        class="mb-3 form-control col-12" id="" placeholder="Nom"
                                                        required>
                                                    <input type="text" name="phone"
                                                        value="{{ old('phone', $pressing->phone) }}"
                                                        class="mb-3 form-control col-12" id=""
                                                        placeholder="Téléphone" required>
                                                    <input type="text" name="address"
                                                        value="{{ old('address', $pressing->address) }}"
                                                        class="mb-3 form-control col-12" id=""
                                                        placeholder="Adresse" required>
                                                    <input type="email" name="email"
                                                        value="{{ old('eamil', $pressing->email) }}"
                                                        class="mb-3 form-control col-12" id=""
                                                        placeholder="email" required>

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

                                <div class="modal fade" id="modal-destroy-customers{{ $pressing->id }}" tabindex="-1"
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
                                                <h2 style="text-align: center"> Voulez-vous vraiment supprimer ?
                                                </h2>
                                                <form action="{{ route('pressings.destroy', $pressing) }}"
                                                    method="POST">
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
                                <th style="width: 20%">Téléphone</th>
                                <th style="width: 20%">Adresse</th>
                                <th style="width: 20%">Actions</th>
                            </tr>
                        </tfoot>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
