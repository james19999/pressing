@extends('layouts.layout')

@section('content')
    <div class="col-12 ">
        <div style="padding-top: 10px">
            <div class="card-body">
                <div class="row">
                    @include('partials.navs-links')
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
                                <form action="{{ route('costumers.store') }}" method="POST">
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
                                <th style="width: 20%">Adresse</th>
                                <th style="width: 20%">Téléphone</th>
                                <th style="width: 20%">Email</th>
                                <th style="width: 20%">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php
                                $i = 1;
                            @endphp
                            @foreach ($costumers as $costumer)
                                <tr>

                                    <td style="color: black ">{{ $i++ }}</td>
                                    <td style="color: black ">{{ $costumer->name }} </td>
                                    <td style="color: black ">{{ $costumer->address }} </td>
                                    <td style="color: black ">{{ $costumer->phone }} </td>
                                    <td style="color: black ">{{ $costumer->email ?? '@' }} </td>


                                    <td style="color: black " class=" pull-right">

                                        <div class="btn-group btn-group-justified">


                                            <a href="{{ route('costumers.update', $costumer) }}" style="color: white" type="button"
                                            class="btn btn-warning" data-hover="tooltip" data-placement="top"
                                            data-target="#modal-edit-customers{{ $costumer->id }}" data-toggle="modal"
                                            id="modal-edit">
                                            <i class="material-icons">edit</i>
                                            Modifier</a>

                                            <a href="{{ route('costumers.destroy', $costumer) }}" style="color: white"
                                                type="button" class="btn btn-danger" data-hover="tooltip"
                                                data-placement="top"
                                                data-target="#modal-destroy-customers{{ $costumer->id }}"
                                                data-toggle="modal" id="modal-destroy">
                                                <i class="material-icons">delete</i>
                                                Supprimer</a>



                                        </div>
                                    </td>
                                </tr>

                                <div class="modal fade" id="modal-edit-customers{{ $costumer->id }}" tabindex="-1"
                                    aria-labelledby="defaultModalLabel" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h4 class="modal-title" id="defaultModalLabel">Modifier le client</h4>
                                                <button type="button" class="btn btn-light btn-circle dismiss"
                                                    data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true" class="material-icons">close</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                <form action="{{ route('costumers.update', $costumer) }}" method="POST">
                                                    @method('PUT')
                                                    @csrf

                                                    <div class="form-group">
                                                        <label for="name">Nom</label>
                                                        <input type="text" class="form-control" id="name" name="name" value="{{ old('name' ,$costumer->name) }}" placeholder="Entrez le nom" required>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="phone">Téléphone</label>
                                                        <input type="text" class="form-control" id="phone" name="phone" value="{{ old('phone',$costumer->phone) }}" placeholder="Entrez le numéro de téléphone" required>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="address">Adresse</label>
                                                        <input type="text" class="form-control" id="address" name="address" value="{{ old('address',$costumer->address) }}" placeholder="Entrez l'adresse" required>
                                                    </div>

                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-danger"
                                                    data-dismiss="modal">Fermer</button>
                                                <button type="submit" class="btn btn-success text-white">Modifier</button>
                                            </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>

                                <div class="modal fade" id="modal-destroy-customers{{ $costumer->id }}" tabindex="-1"
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
                                                <form action="{{ route('costumers.destroy', $costumer) }}" method="POST">
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
                                <th style="width: 20%">Adresse</th>
                                <th style="width: 20%">Téléphone</th>
                                <th style="width: 20%">Email</th>
                                <th style="width: 20%">Actions</th>
                            </tr>
                        </tfoot>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
