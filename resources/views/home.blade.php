@extends('layouts.layout')


@section('content')
    <div class="page-header">
        <div>
            <span class="h2">{{ Auth::user()->name ?? '' }}

                Bienvenue dans  {{ $Pressing->name ?? '' }}
            </span>
        </div>
    </div>
    <div class="row">
        <div class="col-12 col-sm-6 col-md-6 col-lg-3">
            <div class="card shadow">
                <div class="card-body">
                    <div class="row">
                        <div class="col">
                            <h5 class="text-uppercase text-muted mb-0 card-title">Total commandes en couurs   </h5><span
                              style="font-size: 130%"  class="h1 font-weight-bold mb-0">{{ $get_all_pending_count }} </span>
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
                               style="font-size: 130%" class="h1 font-weight-bold mb-0">{{ $ordercount }}   </span>
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
                              style="font-size: 130%"  class="h1 font-weight-bold mb-0">{{ $ordercountpeding }}</span>
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
                             style="font-size: 130%"   class="h1 font-weight-bold mb-0">{{ $ordecountdeliverd }}</span>
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
                              style="font-size: 130%"  class="h1 font-weight-bold mb-0">{{ $totalyear }} XOF</span>
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
                               style="font-size: 130%" class="h1 font-weight-bold mb-0">{{ $totalofweak }} XOF  </span>
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
                              style="font-size: 130%"  class="h1 font-weight-bold mb-0">{{ $totalday }} XOF</span>
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
                            <h5 class="text-uppercase text-muted mb-0 card-title">Mensuel</h5><span
                             style="font-size: 130%"   class="h1 font-weight-bold mb-0">{{ $totalmonth }} XOF</span>
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

                    <h3 class="card-title mb-4 float-sm-left">Total Sales</h3>
                    <button class="btn btn-sm btn-light btn-circle btn-ripple btn-icon float-sm-right">
                        <i class="material-icons">more_vert</i>
                    </button>

                    <div id="line-column-area-chart"></div>
                </div>
            </div>
        </div>
        <div class="col-12 col-sm-12 col-md-12 col-lg-4">
            <div class="card shadow">
                <div class="card-body">
                    <h3 class="card-title mb-4">Total Sales</h3>
                    <canvas id="chart-area" class="chart-canvas mx-auto" height="260"></canvas>
                </div>
            </div>
        </div>
        <div class="col-12 col-md-12 col-lg-4">
            <div class="card shadow">

                <div class="card-body p-0">
                    <div class="card-header bg-white">
                        Product Demand
                    </div>

                    <div class="table-responsive">
                        <table class="table">
                            <thead class="thead-light">
                                <tr>
                                    <th>Brand</th>
                                    <th>Popularity</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>
                                        Samsung
                                    </td>
                                    <td>
                                        <div class="progress">
                                            <div class="progress-bar bg-primary" role="progressbar" style="width: 25%"
                                                aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                                        </div>
                                    </td>

                                </tr>
                                <tr>
                                    <td>
                                        Apple
                                    </td>
                                    <td>
                                        <div class="progress">
                                            <div class="progress-bar bg-danger" role="progressbar" style="width: 100%"
                                                aria-valuenow="100" aria-valuemin="0" aria-valuemax="100"></div>
                                        </div>
                                    </td>

                                </tr>
                                <tr>
                                    <td>
                                        Oppo
                                    </td>
                                    <td>
                                        <div class="progress">
                                            <div class="progress-bar bg-success" role="progressbar" style="width: 80%"
                                                aria-valuenow="80" aria-valuemin="0" aria-valuemax="100"></div>
                                        </div>
                                    </td>

                                </tr>
                                <tr>
                                    <td>
                                        Vivo
                                    </td>
                                    <td>
                                        <div class="progress">
                                            <div class="progress-bar bg-warning" role="progressbar" style="width: 57%"
                                                aria-valuenow="57" aria-valuemin="0" aria-valuemax="100"></div>
                                        </div>
                                    </td>

                                </tr>
                                <tr>
                                    <td>
                                        OnePlus
                                    </td>
                                    <td>
                                        <div class="progress">
                                            <div class="progress-bar bg-info" role="progressbar" style="width: 50%"
                                                aria-valuenow="50" aria-valuemin="0" aria-valuemax="100"></div>
                                        </div>
                                    </td>

                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

        </div>
        <div class="col-12 col-sm-12 col-md-12 col-lg-8">
            <div class="card shadow">
                <div class="card-body">
                    <div>
                        <h3 class="card-title mb-4 float-sm-left">Average Sales</h3>
                        <ul class="nav nav-pills float-sm-right">
                            <li class="nav-item">
                                <a class="nav-link btm-sm" href="#">Weekly</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link btm-sm active" href="#">Monthly</a>
                            </li>
                        </ul>
                    </div>
                    <div id="bar-chart"></div>
                </div>
            </div>
        </div>
        <div class="col-12 col-sm-12 col-md-12 col-lg-6">
            <div class="card shadow">
                <div class="card-body">
                    <h3 class="card-title mb-4 float-sm-left">Peak Sales</h3>
                    <div id="chart">
                    </div>
                </div>
            </div>
        </div>
        <div class="col-12 col-md-12 col-lg-6">
            <div class="card shadow">
                <div class="card-body">
                    <h4 class="card-title mb-4">Product Stock</h4>
                    <div class="table-responsive">
                        <table class="table table-borderless mb-0">
                            <thead class="thead-light rounded">
                                <tr>
                                    <th scope="col">Product</th>
                                    <th scope="col">Price</th>
                                    <th scope="col">Quantity</th>
                                    <th scope="col">In Stock</th>
                                    <th scope="col">Agent</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>
                                        <img src="assets/images/product/a.png" class="avatar avatar-sm mr-2"
                                            alt="Samsung Galaxy S20"> Samsung Galaxy S20

                                    </td>

                                    <td class="align-middle">$32</td>
                                    <td class="align-middle">24</td>
                                    <td class="align-middle">
                                        <div class="custom-control custom-switch">
                                            <input type="checkbox" class="custom-control-input" id="customSwitch1"
                                                checked>
                                            <label class="custom-control-label" for="customSwitch1">
                                            </label>
                                        </div>

                                    </td>
                                    <td class="align-middle">Mark</td>
                                </tr>
                                <tr>
                                    <td>
                                        <img src="assets/images/product/b.png" class="avatar avatar-sm mr-2"
                                            alt="iPhone 12 Pro"> iPhone 12 Pro
                                    </td>

                                    <td class="align-middle">$52</td>
                                    <td class="align-middle">58</td>
                                    <td class="align-middle">
                                        <div class="custom-control custom-switch">
                                            <input type="checkbox" class="custom-control-input" id="customSwitch2">
                                            <label class="custom-control-label" for="customSwitch2">
                                            </label>
                                        </div>
                                    </td>
                                    <td class="align-middle">John</td>

                                </tr>
                                <tr>
                                    <td>
                                        <img src="assets/images/product/c.png" class="avatar avatar-sm mr-2"
                                            alt="OnePlus 8"> OnePlus 8
                                    </td>

                                    <td class="align-middle">$79</td>
                                    <td class="align-middle">5</td>
                                    <td class="align-middle">
                                        <div class="custom-control custom-switch">
                                            <input type="checkbox" class="custom-control-input" id="customSwitch3"
                                                checked>
                                            <label class="custom-control-label" for="customSwitch3">
                                            </label>
                                        </div>
                                    </td>
                                    <td class="align-middle">John</td>

                                </tr>
                                <tr>
                                    <td>
                                        <img src="assets/images/product/d.png" class="avatar avatar-sm mr-2"
                                            alt="Vivo F17 Pro"> Vivo F17 Pro
                                    </td>

                                    <td class="align-middle">$52</td>
                                    <td class="align-middle">58</td>
                                    <td class="align-middle">
                                        <div class="custom-control custom-switch">
                                            <input type="checkbox" class="custom-control-input" id="customSwitch4">
                                            <label class="custom-control-label" for="customSwitch4">
                                            </label>
                                        </div>
                                    </td>
                                    <td class="align-middle">John</td>

                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>


        <div class="col-sm-12 col-md-6">
            <div class="card shadow">
                <div class="card-header bg-white">
                    Track Order
                </div>
                <div class="card-body p-4 ml-3">
                    <div class="timeline timeline-one-side" data-timeline-axis-style="dashed"
                        data-timeline-content="axis">
                        <div class="timeline-block">
                            <span class="timeline-step badge-success">
                                <i class="material-icons f-12">today</i>
                            </span>
                            <div class="timeline-content">

                                <h5 class="mb-0 font-weight-bold">Order has Dispatched</h5>
                                <small class="text-muted ">10:30
                                    AM</small>
                                <p class="text-sm mt-1 mb-0">Product has dispatched from vendor.
                                </p>

                            </div>
                        </div>
                        <div class="timeline-block"><span class="timeline-step badge-danger"><i
                                    class="material-icons f-12">alarm</i></span>
                            <div class="timeline-content">
                                <h5 class="mb-0 font-weight-bold">Order Picked Up</h5>
                                <small class="text-muted ">14:30
                                    AM</small>
                                <p class="text-sm mt-1 mb-0">Order picked up from delivery partner
                                </p>

                            </div>
                        </div>
                        <div class="timeline-block">
                            <span class="timeline-step badge-info"><i class="material-icons f-12">thumb_up</i></span>
                            <div class="timeline-content">
                                <h5 class="mb-0 font-weight-bold">Order received at nearest hub</h5>
                                <small class="text-muted">10:30
                                    AM</small>
                                <p class="text-sm mt-1 mb-0">Order received at nearest hub in your city
                                </p>

                            </div>
                        </div>
                        <div class="timeline-block"><span class="timeline-step badge-success"><i
                                    class="material-icons f-12">bookmarks</i></span>
                            <div class="timeline-content">
                                <h5 class="mb-0 font-weight-bold">Out for delivery</h5>
                                <small class="text-muted">15:30
                                    AM</small>
                                <p class="text-sm mt-1 mb-0">Order will be delivered around 5 PM.
                                </p>

                            </div>
                        </div>
                        <div class="timeline-block"><span class="timeline-step badge-danger"><i
                                    class="material-icons f-12">grade</i></span>
                            <div class="timeline-content">
                                <h5 class="mb-0 font-weight-bold">Order delivered</h5>
                                <small class="text-muted">16:55
                                    AM</small>
                                <p class="text-sm mt-1 mb-0">Order delivered at 4:55 PM.
                                </p>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-12 col-sm-12 col-md-6">
            <div class="card shadow">
                <div class="card-header bg-white">
                    Google Maps
                    <div class="tools">

                        <button class="btn btn-square toggle-fullscreen">
                            <i class="material-icons">fullscreen</i>
                            <i class="material-icons">fullscreen_exit</i>
                        </button>

                    </div>
                </div>
                <div class="card-body">
                    <div class="m-0 p-0 overflow-hidden">
                        <iframe class="border-none"
                            src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d241317.1160991881!2d72.74109908908066!3d19.082197838926515!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3be7c9409a609d75%3A0xd0a71c45e7557bfa!2sBasilica%20Of%20Our%20Lady%20of%20The%20Mount!5e0!3m2!1sen!2sin!4v1607597877463!5m2!1sen!2sin"
                            allowfullscreen="" aria-hidden="false" tabindex="0"></iframe>
                    </div>
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

    </div>
@endsection

