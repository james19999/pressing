@extends('layouts.layout')


@section('content')
    <div class="col-12 ">
        <div style="padding-top: 1px">
            <div class="card-body">
                <div class="row">

                    @include('partials.nav-grament')
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
                                <th style="width: 20%">Prix</th>
                                <th style="width: 20%">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php
                                $i = 1;
                            @endphp
                            @foreach ($garments as $garment)
                                <tr>

                                    <td style="color: black ">{{ $i++ }}</td>
                                    <td style="color: black ">{{ $garment->name }} </td>
                                    <td style="color: black ">{{ $garment->price }} XOF </td>

                                    <td style="color: black " class=" pull-right">

                                        <div class="btn-group btn-group-justified">

                                            <a href="{{ route('garments.update', $garment) }}" style="color: white"
                                                type="button" class="btn btn-warning" data-hover="tooltip"
                                                data-placement="top" data-target="#modal-edit-customers{{ $garment->id }}"
                                                data-toggle="modal" id="modal-edit">
                                                <i class="material-icons">edit</i>
                                                Modifier</a>



                                            <a href="{{ route('garments.destroy', $garment) }}" style="color: white"
                                                type="button" class="btn btn-danger" data-hover="tooltip"
                                                data-placement="top"
                                                data-target="#modal-destroy-customers{{ $garment->id }}"
                                                data-toggle="modal" id="modal-destroy">
                                                <i class="material-icons">delete</i>
                                                Supprimer</a>



                                        </div>
                                    </td>
                                </tr>

                                <div class="modal fade" id="modal-edit-customers{{ $garment->id }}" tabindex="-1"
                                    aria-labelledby="defaultModalLabel" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h4 class="modal-title" id="defaultModalLabel">Modifier le linge</h4>
                                                <button type="button" class="btn btn-light btn-circle dismiss"
                                                    data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true" class="material-icons">close</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                <form action="{{ route('garments.update', $garment) }}" method="POST">
                                                    @method('PUT')
                                                    @csrf
                                                    <input type="text" name="name" value="{{ $garment->name }}"
                                                        class="form-control col-12" id="" placeholder="libelle"
                                                        required>
                                                    <input type="number" name="price" value="{{ $garment->price }}"
                                                        class="form-control col-12  mt-2" id=""
                                                        placeholder="libelle" required>

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

                                <div class="modal fade" id="modal-destroy-customers{{ $garment->id }}" tabindex="-1"
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
                                                <h2 style="text-align: center"> Voulez-vous supprimé cette garment ? </h2>
                                                <form action="{{ route('garments.destroy', $garment) }}" method="POST">
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
                                <th style="width: 20%">Libelle</th>
                                <th style="width: 20%">Prix</th>
                                <th style="width: 20%">Actions</th>
                            </tr>
                        </tfoot>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
