@extends('layouts.layout')


@section('content')
    <div class="page-header">
        <div>
            <span class="h2">{{ Auth::user()->name ?? '' }}/

                {{ $Pressing->name ?? '' }}
            </span>
        </div>
    </div>
    <div class="row">
        <div class="col-12 col-sm-6 col-md-6 col-lg-3">
            <div class="card shadow">
                <div class="card-body">
                    <div class="row">
                        <div class="col">
                            <h5 class="text-uppercase text-muted mb-0 card-title">Total commandes en couurs </h5><span
                                style="font-size: 130%" class="h1 font-weight-bold mb-0">{{ $get_all_pending_count }} </span>
                        </div>
                        <div class="col-auto col">
                            <div>
                                <button class="btn btn-transparent-primary btn-lg btn-circle">

                                    <i class="material-icons">monetization_on</i>
                                </button>

                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
        <div class="col-12 col-sm-6 col-md-6 col-lg-3">
            <div class="card shadow">
                <div class="card-body">
                    <div class="row">
                        <div class="col">
                            <h5 class="text-uppercase text-muted mb-0 card-title">Total des commandes /J</h5><span
                                style="font-size: 130%" class="h1 font-weight-bold mb-0">{{ $ordercount }} </span>
                        </div>
                        <div class="col-auto col">
                            <div>
                                <button class="btn btn-transparent-primary btn-lg btn-circle">

                                    <i class="material-icons">trending_up</i>
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-12 col-sm-6 col-md-6 col-lg-3">
            <div class="card shadow">
                <div class="card-body">
                    <div class="row">
                        <div class="col">
                            <h5 class="text-uppercase text-muted mb-0 card-title">Commandes en cours /J</h5><span
                                style="font-size: 130%" class="h1 font-weight-bold mb-0">{{ $ordercountpeding }}</span>
                        </div>
                        <div class="col-auto col">
                            <div>
                                <button class="btn btn-transparent-primary btn-lg btn-circle">
                                    <i class="material-icons">language</i>
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-12 col-sm-6 col-md-6 col-lg-3">
            <div class="card shadow">
                <div class="card-body">
                    <div class="row">
                        <div class="col">
                            <h5 class="text-uppercase text-muted mb-0 card-title">Commandes livrées /J</h5><span
                                style="font-size: 130%" class="h1 font-weight-bold mb-0">{{ $ordecountdeliverd }}</span>
                        </div>
                        <div class="col-auto col">
                            <div>
                                <button class="btn btn-transparent-primary btn-lg btn-circle">
                                    <i class="material-icons">receipt</i>

                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        {{--  <h1>---------------------------------------------</h1>  --}}
        <div class="col-12 col-sm-6 col-md-6 col-lg-3">
            <div class="card shadow">
                <div class="card-body">
                    <div class="row">
                        <div class="col">
                            <h5 class="text-uppercase text-muted mb-0 card-title">CHIFFRE D'AFFAIRE ANNUEL </h5><span
                                style="font-size: 130%" class="h1 font-weight-bold mb-0">{{ $totalyear }} XOF</span>
                        </div>
                        <div class="col-auto col">
                            <div>
                                <button class="btn btn-transparent-primary btn-lg btn-circle">

                                    <i class="material-icons">monetization_on</i>
                                </button>

                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
        <div class="col-12 col-sm-6 col-md-6 col-lg-3">
            <div class="card shadow">
                <div class="card-body">
                    <div class="row">
                        <div class="col">
                            <h5 class="text-uppercase text-muted mb-0 card-title">CHIFFRE D'AFFAIRE HEBDOMADAIRE</h5><span
                                style="font-size: 130%" class="h1 font-weight-bold mb-0">{{ $totalofweak }} XOF </span>
                        </div>
                        <div class="col-auto col">
                            <div>
                                <button class="btn btn-transparent-primary btn-lg btn-circle">

                                    <i class="material-icons">trending_up</i>
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-12 col-sm-6 col-md-6 col-lg-3">
            <div class="card shadow">
                <div class="card-body">
                    <div class="row">
                        <div class="col">
                            <h5 class="text-uppercase text-muted mb-0 card-title">Journalière</h5><span
                                style="font-size: 130%" class="h1 font-weight-bold mb-0">{{ $totalday }} XOF</span>
                        </div>
                        <div class="col-auto col">
                            <div>
                                <button class="btn btn-transparent-primary btn-lg btn-circle">
                                    <i class="material-icons">language</i>
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-12 col-sm-6 col-md-6 col-lg-3">
            <div class="card shadow">
                <div class="card-body">
                    <div class="row">
                        <div class="col">
                            <h5 class="text-uppercase text-muted mb-0 card-title">Mensuel</h5><span style="font-size: 130%"
                                class="h1 font-weight-bold mb-0">{{ $totalmonth }} XOF</span>
                        </div>
                        <div class="col-auto col">
                            <div>
                                <button class="btn btn-transparent-primary btn-lg btn-circle">
                                    <i class="material-icons">receipt</i>

                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-12 col-sm-6 col-md-12 col-lg-12">
            <div class="card shadow">
                <div class="card-body">
                    <div class="row">
                        <div class="col">
                            <h5 class="text-uppercase text-muted mb-0 card-title">Total impayé</h5><span
                                style="font-size: 130%" class="h1 font-weight-bold mb-0">{{ $ordersimpayer }} XOF</span>
                        </div>
                        <div class="col-auto col">
                            <div>
                                <button class="btn btn-transparent-primary btn-lg btn-circle">
                                    <i class="material-icons">receipt</i>

                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>


        <div class="col-12 col-sm-12 col-md-12 col-lg-8">
            <div class="card shadow">
                <div class="card-body">

                    <h3 class="card-title mb-4 float-sm-left">{{ $chart1->options['chart_title'] }}</h3>


                    <div>
                        {!! $chart1->renderHtml() !!}
                    </div>
                </div>
            </div>
        </div>
        <div class="col-12 col-sm-12 col-md-12 col-lg-4">
            <div class="card shadow">
                <div class="card-body">
                    <h3 class="card-title mb-4">{{ $chart2->options['chart_title'] }}</h3>


                    {!! $chart2->renderHtml() !!}

                </div>
            </div>
        </div>
        <div class="col-12 col-md-12 col-lg-6">
            <div class="card shadow">
                <div class="card-body">
                    <h3 class="card-title mb-4">{{ $chart3->options['chart_title'] }}</h3>


                    {!! $chart3->renderHtml() !!}
                </div>
            </div>
        </div>
        <div class="col-12 col-sm-12 col-md-12 col-lg-6">
            <div class="card shadow">
                <div class="card-body">
                    <h3 class="card-title mb-4">{{ $chart4->options['chart_title'] }}</h3>
                    {!! $chart4->renderHtml() !!}
                </div>
            </div>
        </div>
        <div class="col-lg-12">
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
                                        <td style="color: black ">{{ $order->customer->name }} |
                                            {{ $order->customer->phone }} |
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
                                                <span class="badge badge-warning  text-white">En cours</span>
                                            @elseif ($order->status == 'delivered')
                                                <span class="badge badge-success text-white">Livré</span>
                                            @elseif ($order->status == 'canceled')
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
                                                    type="button"
                                                    class="btn btn-warning  {{ $order->status == 'delivered' && $order->payment_method == 'Payer' ? 'disabled' : '' }}  "
                                                    data-hover="tooltip">
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

                                    <div class="modal fade" id="modal-destroy-customers{{ $order->id }}"
                                        tabindex="-1" aria-labelledby="defaultModalLabel" aria-hidden="true">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h4 class="modal-title" id="defaultModalLabel">Suppréssion en cours
                                                    </h4>
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
        {!! $chart1->renderChartJsLibrary() !!}

        {!! $chart1->renderJs() !!}

        {!! $chart2->renderChartJsLibrary() !!}
        {!! $chart2->renderJs() !!}

        {!! $chart3->renderChartJsLibrary() !!}
        {!! $chart3->renderJs() !!}

        {!! $chart4->renderChartJsLibrary() !!}
        {!! $chart4->renderJs() !!}
    </div>
@endsection
