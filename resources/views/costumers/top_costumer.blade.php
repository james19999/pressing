@extends('layouts.layout')

@section('content')
    <div class="col-12">
        <div style="padding-top: 10px">
            <strong>Classement des meilleurs clients du mois.</strong>
            @include('partials.navs-links')

            <div class="mt-4 col-md-7">
                <form action="{{ route('topcostumer') }}">
                    <div class="row">
                        <div class="col-md-4">
                            <label for="limit">Nombre de clients à afficher
                                <input type="number" name="limit" value="{{ request('limit', 10) }}" class="form-control"
                                    placeholder="Entrer un nombre">
                            </label>
                        </div>
                        <div class="col-md-4">
                            <label for="month">Sélectionnez le mois
                                <select name="month" class="form-control">
                                    @foreach ($montharray as $key => $value)
                                        <option value="{{ $key }}"
                                            {{ request('month') == $key ? 'selected' : '' }}>
                                            {{ $value }}
                                        </option>
                                    @endforeach
                                </select>
                            </label>
                        </div>
                        <div class="mt-4 col-md-4">
                            <input type="submit" class="btn btn-success" value="Rechercher" style="color: white">
                        </div>
                    </div>
                </form>
            </div>
        </div>

        <div class="mt-3 shadow card">
            <div class="card-body">
                @if (Session::has('messages'))
                    <div class="alert alert-success">
                        <strong>{{ session('messages') }}</strong>
                    </div>
                @endif

                <div class="table-responsive">
                    <table class="table table-hover w-100">
                        <thead class="thead-light">
                            <tr>
                                <th>N°</th>
                                <th>Nom</th>
                                <th>Téléphone</th>
                                <th>Email</th>
                                <th>Adresse</th>
                                <th>Nombre / Montant</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php $i = 1; @endphp
                            @foreach ($costumers as $costumer)
                                <tr>
                                    <td>{{ $i++ }}</td>
                                    <td>{{ $costumer->name }}</td>
                                    <td>{{ $costumer->phone }}</td>
                                    <td>{{ $costumer->email ?? '@' }}</td>
                                    <td>{{ $costumer->adresse ?? '-' }}</td>
                                    <td>
                                        @if ($loop->first)
                                            <span style="color: #7e1615; font-weight: bold;">
                                                🥇 {{ $costumer->orders_count_filtered }} Commandes / Montant :
                                                {{ number_format($costumer->orders_sum_total_filtered, 0, ',', ' ') }} F
                                            </span>
                                        @else
                                            {{ $costumer->orders_count_filtered }} Commandes / Montant :
                                            {{ number_format($costumer->orders_sum_total_filtered, 0, ',', ' ') }} F
                                        @endif
                                    </td>
                                    <td>
                                        {{-- Bouton d'action si besoin --}}
                                        {{-- <a href="{{ route('view-costumers', $costumer) }}" class="btn btn-sm btn-primary">Voir</a> --}}
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                        <tfoot class="thead-light">
                            <tr>
                                <th>N°</th>
                                <th>Nom</th>
                                <th>Téléphone</th>
                                <th>Email</th>
                                <th>Adresse</th>
                                <th>Nombre / Montant</th>
                                <th>Actions</th>
                            </tr>
                        </tfoot>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
