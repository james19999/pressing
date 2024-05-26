<!-- resources/views/orders/create.blade.php -->

@extends('layouts.layout')

@section('content')
    <div class="container">
        <div class="row">
            @include('partials.navs-links')
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
        <form action="{{ route('orders.store') }}" method="POST">
            @csrf
            <div class="p-4 mt-3 bg-white ">

                <div class="mt-3 row">
                    <div class="col-md-3">
                        <div class="form-group">
                            <label for="customer_id">Customer</label>
                            <select name="customer_id" id="customer_id" class="form-control js-example-basic-single">
                                @foreach ($customers as $customer)
                                    <option value="{{ $customer->id }}">{{ $customer->name }} | {{ $customer->phone }}
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
                        <input type="date" name="date_recived" value="{{ old('date_recived') }}" class="form-control"
                            placeholder="Date">
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-3">
                        <label for="">Type de commande</label>

                        <select name="order_type" id="" class="form-control">

                            <option value="Simple">Simple</option>
                            <option value="Expresse">Expresse</option>
                        </select>

                    </div>
                    <div class="col-md-3">
                        <label for="">Type de lavage</label>

                        <select id="" class="form-control js-example-basic-multiple" name="type_lavage[]"
                            multiple="multiple">

                            <option value="Lavage avec teinture">Lavage avec teinture</option>
                            <option value="Lavage simple">Lavage simple</option>
                            <option value="Lavage avec repassage">Lavage avec repassage</option>
                        </select>
                    </div>
                    <div class="col-md-3">
                        <label for="">Status</label>

                        <select name="payment_method" id="" class="form-control ">

                            <option value="Payer">Payer</option>
                            <option value="Impayer">Impayer</option>
                        </select>
                    </div>
                    <div class="col-md-3">
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
                                <option value="{{ $pressing->id }}">{{ $pressing->name }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
            </div>


            <div class="shadow card">
                <div class="card-header card-head-primary">
                    <div class="card-title">
                        <h3>Linges</h3>
                    </div>
                </div>
                <div class="card-body">

                    <div class="form-group" id="order-items">
                        <div class="order-item">
                            <div class="row">
                                <div class="col-md-4">
                                    <label for="garment_id">Garment</label>
                                    <select name="garments[]" class="form-control garment-select ">
                                        <option value="">Choisir un vêtement</option>
                                        @foreach ($garments as $garment)
                                            <option value="{{ $garment->id }}" data-price="{{ $garment->price }}">
                                                {{ $garment->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col-md-2">
                                    <label for="quantity">Quantity</label>
                                    <input type="number" name="quantities[]" class="form-control quantity" min="1">
                                </div>
                                <div class="col-md-2">
                                    <label for="price">Price</label>
                                    <input type="number" name="prices[]" class="form-control price" readonly>
                                </div>
                                <div class="col-md-2">
                                    <label for="total">Total</label>
                                    <input type="number" name="totals[]" class="form-control total" readonly>
                                </div>

                                <div class=" col-md-2">
                                    <label for="total">Supprimer</label>

                                    <button type="button" class="btn btn-danger remove-order-item">Remove</button>
                                </div>
                            </div>




                        </div>
                    </div>
                </div>

                <div class="card-footer">

                    <div class="row">
                        <div class="col-md-3">
                            <label for="discount">Ajouter une ligne de linge</label>

                            <button type="button" class="btn btn-primary" id="add-order-item">Add Item</button>

                        </div>
                        <div class="col-md-3">
                            <div class="mt-3 form-group">
                                <label for="discount">Discount (%)</label>
                                <input type="number" name="remis" id="discount" class="form-control"
                                    value="0">
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="mt-3 form-group">
                                <label for="grand-total">Grand Total</label>
                                <input type="number" name="total_remis" id="grand-total" class="form-control" readonly>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="mt-3 form-group">
                                <label for="final-total">Final Total (After Discount)</label>
                                <input type="number" name="total" id="final-total" class="form-control" readonly>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-5">

                    <button type="submit" class="mt-4 btn btn-success btn-block">Submit</button>
                </div>
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
        });

        $(document).ready(function() {
            $('.js-example-basic-single').select2();


        });
    </script>
@endsection
