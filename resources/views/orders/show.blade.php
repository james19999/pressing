@extends('layouts.layout')

@section('content')
    <div class="container">
        @php
            $worker = App\Models\Precing::where('id', $order->pressing_id)->first();
        @endphp
        <div class="row">
            @include('partials.navs-links')

        </div>
        <div class="p-3 mt-3 bg-white" id="printableArea">
            <div class="row">
                <div class="col-md-4">
                    <img src="{{ asset('assets/images/logo-square.png') }}" height="50" width="50"
                        style="background-color: white ; " alt="" class="logo img-thumbnail ">
                    <div class="mt-2">
                        <span>
                            <i class="material-icons">phone_iphone</i>
                            {{ $worker->phone }}
                        </span>
                    </div>
                    <div class="mt-2">
                        <span>
                            <i class="material-icons">location_on</i>
                            {{ $worker->address }}
                        </span>
                    </div>
                    <div class="mt-2">
                        <span>
                            <i class="material-icons">email</i>
                            {{ $worker->email ?? '@' }}
                        </span>
                    </div>

                </div>
                <div class="col-md-4">
                    <p>Date d'acquis: {{ $order->date_recived }}</p>
                    @if (!is_null($order->type_lavage))
                    <p>Type de lavage:
                        @foreach ($order->type_lavage as $key => $value)
                                 {{ $value }} ,
                        @endforeach
                    </p>
                    @else
                        <p>No preferences found.</p>
                    @endif
                    <p>Type commnade: {{ $order->order_type }}</p>
                     <strong>
                        <p>Etat: {{ $order->payment_method }}</p>
                     </strong>
                    <p>Date livraison: {{ $order->date_delivered }}</p>
                </div>
                <div class="col-md-4">

                    <h1>Commande: {{ $order->order_number }}</h1>
                    <p>Nom: {{ $order->customer->name }}</p>
                    <p>Téléphone: {{ $order->customer->phone }}</p>
                    <p>Adresse: {{ $order->customer->address ?? 'Pas d\'adresse' }}</p>
                    @if ($order->status == 'pending')
                    <strong>
                        <p> Status: En cours</p>
                    </strong>
                  @elseif ($order->status == 'delivered')
                    <strong>
                        <p>Status: Livré</p>
                    </strong>
                   @elseif ($order->status=='canceled')
                    <strong>
                        <p>Status: Annulé</p>
                    </strong>
                   @endif

                </div>
            </div>
            <table class="table">
                <div class="bg-primary">
                    <h3 class="text-primary">{{ $order->order_number }}</h3>
                </div>
                <thead>
                    <tr>
                        <th>Linges</th>
                        <th>Quantité</th>
                        <th>Prix</th>
                        <th>Total</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($order->items as $item)
                        <tr>
                            <td>{{ $item->garment->name }}</td>
                            <td>{{ $item->quantity }}</td>
                            <td>{{ $item->price }} XOF</td>
                            <td>{{ $item->quantity * $item->price }} XOF</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            <div class="row">
               <div class="col-md-4">
                 <div class="card">
                      <div class="text-white shadow card-header bg-primary">

                      </div>
                      <div class="card-body">

                          <p>Sous Total: {{ $order->items->sum(function ($item) {return $item->quantity * $item->price;}) }} XOF</p>
                          <p>Remis : {{ $order->remis }} %</p>
                          <p>Total : {{ $order->total }} XOF</p>
                      </div>
                 </div>
               </div>
            </div>
        </div>
            <div class="p-4 mt-4 bg-white">

                <div class=" row">

                       <div class="col-md-3">
                        <button class="btn btn-primary no-print" onclick="printDiv('printableArea')">Print</button>

                       </div>
                       <div class="col-md-3">
                        <button type="button" class="btn btn-primary active" data-toggle="modal" data-target="#verticalCenteredModalDemo">
                            Payer la commande
                        </button>

                       </div>
                       <div class="col-md-3">
                        <button type="button" class="btn btn-primary active" data-toggle="modal" data-target="#verticalCenteredModal">
                            Valider la commande
                        </button>
                       </div>
                       <div class="col-md-3">
                           1
                       </div>

                </div>
            </div>

            <div class="modal fade" id="verticalCenteredModalDemo" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="verticalCenteredModalDemoLabel" aria-hidden="true" style="display: none;">
                <div class="modal-dialog modal-dialog-centered">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h4 class="modal-title" id="verticalCenteredModalDemoLabel">Payer la commande
                                de Mr/Mm : {{ $order->customer->name }}
                            </h4>
                            <button type="button" class="btn btn-light btn-circle dismiss" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true" class="material-icons">close</span>
                            </button>
                        </div>
                        <div class="modal-body">
                                 <form action="{{ route('paid-order-valid',$order) }}" method="POST">
                                     @csrf
                                      @method('PUT')
                                    <select name="payment_method" id="" class="form-control ">

                                        <option value="Payer">Payer</option>
                                        <option value="Impayer">Impayer</option>
                                    </select>
                                </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-danger" data-dismiss="modal">Fermer</button>
                            <button type="submit" class="btn btn-success">Valider</button>
                        </div>
                    </div>
                      </form>
                </div>
            </div>

            <div class="modal fade" id="verticalCenteredModal" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="verticalCenteredModalDemoLabel" aria-hidden="true" style="display: none;">
                <div class="modal-dialog modal-dialog-centered">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h4 class="modal-title" id="verticalCenteredModalDemoLabel">Valider la commande
                                de Mr/Mm : {{ $order->customer->name }}
                            </h4>
                            <button type="button" class="btn btn-light btn-circle dismiss" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true" class="material-icons">close</span>
                            </button>
                        </div>
                        <div class="modal-body">
                                 <form action="{{ route('change-status-order',$order) }}" method="POST">
                                     @csrf
                                      @method('PUT')
                                      <label for="" class="mt-2">Status</label>
                                    <select name="status" id="" class="form-control ">
                                        <option value="delivered">Valider</option>
                                        <option value="canceled">Annuler</option>
                                    </select>
                                    <label for="" class="mt-1">Entrer la raison d'annulation</label>
                                    <Textarea  name="raison" class="mt-2 form-control" >
                                        {{ old('raison') }}
                                    </Textarea>
                                </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-danger" data-dismiss="modal">Fermer</button>
                            <button type="submit" class="btn btn-success">Valider</button>
                            <div class="col-md-12">
                                @if ($errors->any())
                                    <div class="alert alert-danger">
                                        <ul>
                                            @foreach ($errors->all() as $error)
                                                <li>{{ $error }}</li>
                                            @endforeach
                                        </ul>
                                    </div>
                                @endif
                            </div>
                        </div>
                    </div>
                      </form>
                </div>
            </div>
    </div>
@endsection
