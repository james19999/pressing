@extends('layouts.layout')

@section('content')
@include('partials.nav-grament')
<div class="container mt-5 bg-white p-3">
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
    <h2>Ajouter des linges</h2>
    <form id="garmentsForm" method="POST" action="{{ route('garments.store') }}">
        @csrf
        <div id="garmentsContainer">
            <div class="form-row garment-item">
                <div class="form-group col-md-5">
                    <label for="garment_name_1">Nom du linge</label>
                    <input type="text" class="form-control" id="garment_name_1" name="name[]" placeholder="Nom">
                </div>
                <div class="form-group col-md-5">
                    <label for="garment_price_1">Prix</label>
                    <input type="number" class="form-control" id="garment_price_1" name="price[]" placeholder="Prix">
                </div>
                <div class="form-group col-md-2 d-flex align-items-end">
                    <button type="button" class="btn btn-danger remove-garment">Supprimer</button>
                </div>
            </div>
        </div>
        <button type="button" class="btn btn-primary text-white " id="addGarment">Ajouter un Vêtement</button>
        <button type="submit" class="btn btn-success text-white " >Enregister</button>
    </form>
</div>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script>
    $(document).ready(function() {
        let garmentCount = 1;

        $('#addGarment').click(function() {
            garmentCount++;
            const garmentItem = `
                <div class="form-row garment-item">
                    <div class="form-group col-md-5">
                        <label for="garment_name_${garmentCount}">Nom du Vêtement</label>
                        <input type="text" class="form-control" id="garment_name_${garmentCount}" name="name[]" placeholder="Nom">
                    </div>
                    <div class="form-group col-md-5">
                        <label for="garment_price_${garmentCount}">Prix</label>
                        <input type="number" class="form-control" id="garment_price_${garmentCount}" name="price[]" placeholder="Prix">
                    </div>
                    <div class="form-group col-md-2 d-flex align-items-end">
                        <button type="button" class="btn btn-danger remove-garment">Supprimer</button>
                    </div>
                </div>
            `;
            $('#garmentsContainer').append(garmentItem);
        });

        $('#garmentsContainer').on('click', '.remove-garment', function() {
            $(this).closest('.garment-item').remove();
        });
    });
</script>
@endsection
