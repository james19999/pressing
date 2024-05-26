@extends('layouts.layout')


@section('content')
    <div class="col-12 ">
        <div class="row">
            @include('partials.navs-links')
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
                                <th style="width: 20%">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php
                                $i = 1;
                            @endphp
                            @foreach ($orders as $order)
                                <tr>

                                    <td style="color: black ">{{ $i++ }}</td>

                                    <td style="color: black " class=" pull-right">

                                        <div class="btn-group btn-group-justified">

                                            <a href="{{ route('orders.edit', $order) }}" style="color: white" type="button"
                                                class="btn btn-warning" data-hover="tooltip">
                                                <i class="material-icons">edit</i>
                                                Modifier</a>
                                            <a href="{{ route('orders.show', $order) }}" style="color: white" type="button"
                                                class="btn btn-info" data-hover="tooltip">
                                                <i class="material-icons">remove_red_eye</i>
                                                Détails</a>

                                            <a href="{{ route('orders.destroy', $order) }}" style="color: white"
                                                type="button" class="btn btn-danger" data-hover="tooltip"
                                                data-placement="top"
                                                data-target="#modal-destroy-customers{{ $order->id }}"
                                                data-toggle="modal" id="modal-destroy">
                                                <i class="material-icons">delete</i>
                                                Supprimer</a>

                                        </div>
                                    </td>
                                </tr>

                                <div class="modal fade" id="modal-destroy-customers{{ $order->id }}" tabindex="-1"
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
                                                <form action="{{ route('orders.destroy', $order) }}" method="POST">
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
                                <th style="width: 20%">Actions</th>
                            </tr>
                        </tfoot>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
