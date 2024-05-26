@extends('layouts.layout')

@section('content')
    <div class="container">
        <div class="row">
            @include('partials.navs-links')
        </div>
        <div class="row">
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
        <form action="{{ route('orders.update', $order->id) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="p-4 mt-3 bg-white ">

                <div class="mt-3 row">
                    <div class="col-md-3">
                        <div class="form-group">
                            <label for="customer_id">Client</label>
                            <select name="customer_id" id="customer_id" class="form-control">
                                @foreach ($customers as $customer)
                                    <option value="{{ $customer->id }}"
                                        {{ $customer->id == $order->customer_id ? 'selected' : '' }}>{{ $customer->name }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <label for="">Téléphone client</label>
                        <input type="text" class="form-control" placeholder="Téléphone client">
                    </div>
                    <div class="col-md-3">
                        <label for="">Adresse du client</label>
                        <input type="text" class="form-control" placeholder="Téléphone client">
                    </div>
                    <div class="col-md-3">
                        <label for="">Date de réception</label>
                        <input type="date" name="date_recived" value="{{ old('date_recived', $order->date_recived) }}"
                            class="form-control" placeholder="Date">
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-4">
                        <label for="">Type de commande : <span
                                class="badge-danger">{{ $order->order_type }}</span></label>

                        <select name="order_type" id="" class="form-control">
                            <option value="">Type de commande</option>
                            <option value="Simple">Simple</option>
                            <option value="Expresse">Expresse</option>
                        </select>

                    </div>
                    <div class="col-md-4">
                        <label for="">Type de lavage</label>

                        @if (!is_null($order->type_lavage))
                            @foreach ($order->type_lavage as $key => $value)
                                <span class="badge badge-info">

                                    {{ $value }},

                                </span>
                            @endforeach
                        @else
                            <p>No preferences found.</p>
                        @endif

                        <select id="" class="form-control js-example-basic-multiple" name="type_lavage[]"
                            multiple="multiple">

                            <option value="Lavage avec teinture">Lavage avec teinture</option>
                            <option value="Lavage simple">Lavage simple</option>
                            <option value="Lavage avec repassage">Lavage avec repassage</option>
                        </select>
                    </div>
                    {{--  <div class="col-md-3">
                    <label for="">Status</label>

                    <select name="payment_method" id=""  class="form-control ">

                        <option value="Payer">Payer</option>
                        <option value="Impayer">Impayer</option>
                    </select>
                </div>  --}}
                    <div class="col-md-4">
                        <label for="">Date de livraison {{ $hoursDifference }} heures </label>

                        <input type="text" name="date_delivered" class="form-control" readonly
                            value="{{ old('date_delivered', $threeDaysLater) }}" placeholder="Date">
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <label for="">Sélectionnez le pressing</label>
                        <select name="pressing_id" id="" class="form-control">
                            <option value="">Pressing</option>
                            @foreach ($pressings as $pressing)
                                <option value="{{ $pressing->id }} "
                                    {{ $pressing->id == $order->pressing_id ? 'selected' : '' }}>{{ $pressing->name }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                </div>
            </div>


            <div class="card">
                <div class=" card-header card-head-primary">
                    <div class="card-title">
                        <h3>Linges</h3>
                    </div>
                </div>
                <div class="card-body">
                    <div class="form-group" id="order-items">
                        @foreach ($order->items as $item)
                            <div class="order-item">
                                <div class="row">
                                    <div class="col-md-3">
                                        <label for="garment_id">Linge</label>
                                        <select name="garments[]" class="form-control garment-select">
                                            @foreach ($garments as $garment)
                                                <option value="{{ $garment->id }}" data-price="{{ $garment->price }}"
                                                    {{ $garment->id == $item->garment_id ? 'selected' : '' }}>
                                                    {{ $garment->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="col-md-2">
                                        <label for="quantity">Quantité</label>
                                        <input type="number" name="quantities[]" class="form-control quantity"
                                            value="{{ $item->quantity }}" min="1">
                                    </div>
                                    <div class="col-md-2">
                                        <label for="price">Prix</label>
                                        <input type="number" name="prices[]" class="form-control price"
                                            value="{{ $item->price }}" readonly>
                                    </div>
                                    <div class="col-md-2">
                                        <label for="total">Total</label>
                                        <input type="number" name="totals[]" class="form-control total"
                                            value="{{ $item->quantity * $item->price }}" readonly>
                                    </div>
                                    <div class="col-md-2">
                                        <label for="total">Supprimer</label>

                                        <button type="button" class="btn btn-danger remove-order-item">Remove</button>

                                    </div>

                                </div>




                            </div>
                        @endforeach
                    </div>
                </div>
                <div class="card-footer">
                    <div class="row">
                        <div class="col-md-3">
                            <button type="button" class="mt-5 btn btn-primary" id="add-order-item">Add Item</button>

                        </div>
                        <div class="col-md-3">
                            <div class="mt-3 form-group">
                                <label for="discount">Remise (%)</label>
                                <input type="number" id="discount" name="remis" class="form-control"
                                    value="{{ old('0', $order->remis) }}">
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="mt-3 form-group">
                                <label for="grand-total">Sous Total</label>
                                <input type="number" id="grand-total" name="total_remis"
                                    value="{{ old('total_remis', $order->total_remis) }}" class="form-control" readonly>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="mt-3 form-group">
                                <label for="final-total">Total (After Discount)</label>
                                <input type="number" id="final-total" name="total"
                                    value="{{ old('total', $order->total) }}" class="form-control" readonly>
                            </div>
                        </div>

                    </div>
                </div>

            </div>

            <div class="row">
                <div class="col-md-6">

                    <button type="submit" class="mt-3 btn btn-success btn-block ">Modifier</button>
                </div>
            </div>






        </form>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script>
        $(document).ready(function() {
            $('#add-order-item').click(function() {
                var orderItem = $('.order-item').first().clone();
                orderItem.find('select.garment-select').val('');
                orderItem.find('input.quantity').val('');
                orderItem.find('input.price').val('');
                orderItem.find('input.total').val('');
                $('#order-items').append(orderItem);
            });

            $(document).on('click', '.remove-order-item', function() {
                $(this).closest('.order-item').remove();
                updateGrandTotal();
            });

            $(document).on('change', '.garment-select', function() {
                var orderItem = $(this).closest('.order-item');
                var price = $(this).find(':selected').data('price');
                orderItem.find('.price').val(price);
                calculateTotal(orderItem);
            });

            $(document).on('input', '.quantity', function() {
                var orderItem = $(this).closest('.order-item');
                calculateTotal(orderItem);
            });

            $('#discount').on('input', function() {
                updateGrandTotal();
            });

            function calculateTotal(orderItem) {
                var quantity = orderItem.find('.quantity').val();
                var price = orderItem.find('.price').val();
                var total = quantity * price;
                orderItem.find('.total').val(total.toFixed(2));
                updateGrandTotal();
            }

            function updateGrandTotal() {
                var grandTotal = 0;
                $('.total').each(function() {
                    grandTotal += parseFloat($(this).val());
                });
                $('#grand-total').val(grandTotal.toFixed(2));

                var discount = $('#discount').val();
                var finalTotal = grandTotal - (grandTotal * (discount / 100));
                $('#final-total').val(finalTotal.toFixed(2));
            }

            updateGrandTotal(); // Initial calculation
        });
    </script>
@endsection
