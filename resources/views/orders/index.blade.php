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
                                <th style="width: 20%">Numéro commande</th>
                                <th style="width: 20%">Client</th>
                                <th style="width: 20%">Type de lavage</th>
                                <th style="width: 20%">Type de commande</th>
                                <th style="width: 20%">Status de commande</th>
                                <th style="width: 20%">Sous total</th>
                                <th style="width: 20%">Remise %</th>
                                <th style="width: 20%">Total </th>
                                <th style="width: 20%">Date Réception </th>
                                <th style="width: 20%">Date Livraison </th>
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
                                    <td style="color: black ">{{ $order->order_number }}</td>
                                    <td style="color: black ">{{ $order->customer->name }} | {{ $order->customer->phone }} |
                                        {{ $order->customer->address ?? '' }}</td>
                                    <td style="color: black ">
                                        @if (!is_null($order->type_lavage))
                                            @foreach ($order->type_lavage as $key => $value)
                                                <span class="badge badge-info">

                                                    {{ $value }},

                                                </span>
                                            @endforeach
                                        @else
                                            <p>No preferences found.</p>
                                        @endif

                                    </td>
                                    <td style="color: black ">
                                        {{ $order->order_type }}

                                    </td>
                                    <td style="color: black ">
                                        {{ $order->payment_method }} |
                                        @if ($order->status == 'pending')
                                            <span class="badge badge-warning">En cours</span>
                                        @elseif ($order->status == 'delivered')
                                            <span class="badge badge-success">Livré</span>
                                        @elseif ($order->status == 'cancelled')
                                            <span class="badge badge-danger">Annulé</span>
                                        @endif

                                    </td>
                                    <td style="color: black ">
                                        {{ $order->total_remis }} XOF

                                    </td>
                                    <td style="color: black ">
                                        {{ $order->remis }} %

                                    </td>
                                    <td style="color: black ">
                                        {{ $order->total }} XOF

                                    </td>
                                    <td style="color: black ">
                                        {{ $order->date_recived }}

                                    </td>
                                    <td style="color: black ">
                                        {{ $order->date_delivered }}
                                        {{--  <div>
                                            <p>f</p>
                                        </div>  --}}

                                    </td>


                                    <td style="color: black " class=" pull-right">

                                        <div class="btn-group btn-group-justified">

                                            <a href="{{ route('orders.edit', $order) }}" style="color: white"
                                                type="button" class="btn btn-warning" data-hover="tooltip">
                                                <i class="material-icons">edit</i>
                                                Modifier</a>
                                            <a href="{{ route('orders.show', $order) }}" style="color: white"
                                                type="button" class="btn btn-info" data-hover="tooltip">
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
                                <th style="width: 20%">Numéro commande</th>
                                <th style="width: 20%">Client</th>
                                <th style="width: 20%">Type de lavage</th>
                                <th style="width: 20%">Type de commande</th>
                                <th style="width: 20%">Status de commande</th>
                                <th style="width: 20%">Sous total</th>
                                <th style="width: 20%">Remise </th>
                                <th style="width: 20%">Total </th>
                                <th style="width: 20%">Date Réception </th>
                                <th style="width: 20%">Date Livraison </th>
                                <th style="width: 20%">Actions</th>
                            </tr>
                        </tfoot>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
