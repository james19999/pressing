<!-- resources/views/orders/create.blade.php -->

@extends('layouts.layout')

@section('content')
    <div class="container">
        <div class="row">
            @include('partials.navs-links')
            <button type="button" class="btn btn-primary active ml-2" data-toggle="modal"
                data-target="#verticalCenteredModalDemo">
                Nouveau client
            </button>

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
        <form action="{{ route('orders.store') }}" method="POST">
            @csrf
            <div class="p-4 mt-3 bg-white">

                <div class="mt-3 row">
                    <div class="col-md-3">
                        <div class="form-group">
                            <label for="customer_id">Client</label>
                            <select name="customer_id" id="customer_id" class="form-control js-example-basic-single">
                                @foreach ($customers as $customer)
                                    <option value="{{ $customer->id }}">{{ $customer->name }} | {{ $customer->phone }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <label for="">Type de commande</label>

                        <select name="order_type" id="order_type" class="form-control">
                            <option value="">--------</option>
                            <option value="Simple" selected>Simple</option>
                            <option value="Expresse">Expresse</option>
                        </select>

                    </div>
                    {{--  <div class="col-md-3">
                        <label for="">Adresse du client</label>
                        <input type="text" class="form-control" placeholder="Téléphone client">
                    </div>  --}}
                    <div class="col-md-3">
                        <label for="">Date de réception</label>
                        <input type="date" name="date_recived" value="{{ old('date_recived') }}" class="form-control"
                            placeholder="Date">
                    </div>
                    <div class="col-md-3">
                        <label for="">Sélectionnez le pressing</label>
                        <select name="pressing_id" id="" class="form-control">
                            <option value="">----------</option>
                            @foreach ($pressings as $pressing)
                                <option value="{{ $pressing->id }}">{{ $pressing->name }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="row">


                    <div class="col-md-3">
                        <label for="">Date expresse optionnel</label>
                        <input type="date" id="date_expresse" class="form-control" name="date_expresse"
                            placeholder="Téléphone client">
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

                            <option value="Impayer">Impayer</option>
                            <option value="Payer">Payer</option>
                        </select>
                    </div>
                    <div class="col-md-3">
                        <label for="">Date de livraison {{ $hoursDifference }} heures </label>

                        <input type="text" name="date_delivered" class="form-control" readonly
                            value="{{ old('date_delivered', $threeDaysLater) }}" placeholder="Date">
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
                                    <label for="garment_id">Linge</label>
                                    <select name="garments[]" class="form-control garment-select ">
                                        <option value="">Choisir un vêtement</option>
                                        @foreach ($garments as $garment)
                                            <option value="{{ $garment->id }}" data-price="{{ $garment->price }}">
                                                {{ $garment->name }} | {{ $garment->price }} XOF</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col-md-2">
                                    <label for="quantity">Quantité</label>
                                    <input type="number" name="quantities[]" class="form-control quantity" min="1">
                                </div>
                                <div class="col-md-2">
                                    <label for="price">Prix</label>
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
                        <div class="col-md-2">
                            <label for="discount">Ajouter une ligne de linge</label>

                            <button type="button" class="btn btn-primary" id="add-order-item">Ligne</button>

                        </div>
                        <div class="col-md-2">
                            <div class="mt-3 form-group">
                                <label for="discount">Remise (%)</label>
                                <input type="number" name="remis" id="discount" class="form-control"
                                    value="0">
                            </div>
                        </div>
                        <div class="col-md-2">
                            <div class="mt-3 form-group">
                                <label for="grand-total">Sous Total</label>
                                <input type="number" name="total_remis" id="grand-total" class="form-control" readonly>
                            </div>
                        </div>
                            <div class="col-md-2">
                            <div class="mt-3 form-group">
                                <label for="express-price">Expersse-prix</label>
                                <input type="number"  id="express-price" value="1"  min="1" class="form-control" >
                            </div>
                        </div>
                        <div class="col-md-2">
                            <div class="mt-3 form-group">
                                <label for="deduction">Déduction</label>
                                <input type="number"  id="deduction" class="form-control" >
                            </div>
                        </div>
                        <div class="col-md-2">
                            <div class="mt-3 form-group">
                                <label for="final-total"> Total </label>
                                <input type="number" name="total" id="final-total" class="form-control" readonly>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-5">

                    <button type="submit" class="mt-4 btn btn-success btn-block " style="color: white">Valider</button>
                </div>
            </div>
    </div>
    </form>




    <!-- Modal -->
    <div class="modal fade" id="verticalCenteredModalDemo" data-backdrop="static" data-keyboard="false" tabindex="-1"
        aria-labelledby="verticalCenteredModalDemoLabel" aria-hidden="true" style="display: none;">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="verticalCenteredModalDemoLabel">Nouveau client
                    </h4>
                    <button type="button" class="btn btn-light btn-circle dismiss" data-dismiss="modal"
                        aria-label="Close">
                        <span aria-hidden="true" class="material-icons">close</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="container mt-2">
                        <h2>Créer un Client</h2>
                        <form action="{{ route('costumers.store') }}" method="POST">
                            @csrf
                            <div class="form-group">
                                <label for="name">Nom</label>
                                <input type="text" class="form-control" id="name" name="name"
                                    value="{{ old('name') }}" placeholder="Entrez le nom" required>
                            </div>
                            <div class="form-group">
                                <label for="phone">Téléphone</label>
                                <input type="text" class="form-control" id="phone" name="phone"
                                    value="{{ old('phone') }}" placeholder="Entrez le numéro de téléphone" required>
                            </div>
                            <div class="form-group">
                                <label for="address">Adresse</label>
                                <input type="text" class="form-control" id="address" name="address"
                                    value="{{ old('address') }}" placeholder="Entrez l'adresse" required>
                            </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Annuler</button>
                    <button type="submit" class="btn btn-success text-white">Valider</button>
                </div>
            </div>
            </form>
        </div>
    </div>
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

            $('#discount, #express-price, #deduction').on('input', function() {
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
                    grandTotal += parseFloat($(this).val()) || 0;
                });
                $('#grand-total').val(grandTotal.toFixed(2));

                var discount = parseFloat($('#discount').val()) || 0;
                var expressPrice = parseFloat($('#express-price').val()) || 1;
                var deduction = parseFloat($('#deduction').val()) || 0;

                var discountedTotal = grandTotal - (grandTotal * (discount / 100));
                var finalTotal = (discountedTotal * expressPrice) - deduction;
                $('#final-total').val(finalTotal.toFixed(2));
            }
        });

        $(document).ready(function() {
            $('.js-example-basic-single').select2();
        });


        $(document).ready(function(){
            // Fonction pour mettre à jour l'état du champ date_expresse
            function updateDateExpresseState() {
                var selectedValue = $('#order_type').val();
                if (selectedValue === 'Simple') {
                    $('#date_expresse').prop('readonly', true);
                    $('#express-price').prop('readonly', true);
                } else {
                    $('#date_expresse').prop('readonly', false);
                    $('#express-price').prop('readonly', false);
                }
            }

            // Appeler la fonction lors du chargement initial de la page
            updateDateExpresseState();

            // Mettre à jour l'état lorsque la sélection change
            $('#order_type').change(function(){
                updateDateExpresseState();
            });
        });
    </script>
@endsection
