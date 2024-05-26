

@extends('layouts.layout')

@section('content')
<div class="container">
    <div class="row">
        @include('partials.navs-links')
    </div>
    <form action="{{ route('orders.update', $order->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="form-group">
            <label for="customer_id">Customer</label>
            <select name="customer_id" id="customer_id" class="form-control">
                @foreach($customers as $customer)
                    <option value="{{ $customer->id }}" {{ $customer->id == $order->customer_id ? 'selected' : '' }}>{{ $customer->name }}</option>
                @endforeach
            </select>
        </div>
          <div class="card">
              <div class="bg-black card-header">
                 <div class="card-title">
                     <h3>Liste des produits</h3>
                 </div>
              </div>
              <div class="card-body">

                  <div class="form-group" id="order-items">
                      @foreach($order->items as $item)
                          <div class="order-item">
                               <div class="row">
                                    <div class="col-md-3">
                                      <label for="garment_id">Garment</label>
                                      <select name="garments[]" class="form-control garment-select">
                                          @foreach($garments as $garment)
                                              <option value="{{ $garment->id }}" data-price="{{ $garment->price }}" {{ $garment->id == $item->garment_id ? 'selected' : '' }}>{{ $garment->name }}</option>
                                          @endforeach
                                      </select>
                                    </div>
                                    <div class="col-md-2">
                                      <label for="quantity">Quantity</label>
                                      <input type="number" name="quantities[]" class="form-control quantity" value="{{ $item->quantity }}" min="1">
                                    </div>
                                    <div class="col-md-2">
                                      <label for="price">Price</label>
                                      <input type="number" name="prices[]" class="form-control price" value="{{ $item->price }}" readonly>
                                    </div>
                                    <div class="col-md-2">
                                      <label for="total">Total</label>
                                      <input type="number" name="totals[]" class="form-control total" value="{{ $item->quantity * $item->price }}" readonly>
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

          </div>

        <button type="button" class="btn btn-primary" id="add-order-item">Add Item</button>

        <div class="mt-3 form-group">
            <label for="discount">Discount (%)</label>
            <input type="number" id="discount" class="form-control" value="0">
        </div>

        <div class="mt-3 form-group">
            <label for="grand-total">Grand Total</label>
            <input type="number" id="grand-total" class="form-control" readonly>
        </div>

        <div class="mt-3 form-group">
            <label for="final-total">Final Total (After Discount)</label>
            <input type="number" id="final-total" class="form-control" readonly>
        </div>

        <button type="submit" class="mt-3 btn btn-success">Update</button>
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
