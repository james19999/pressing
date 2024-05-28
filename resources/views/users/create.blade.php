@extends('layouts.layout')

@section('content')
<div class="container m-2 ">
       @include('partials.nav-links')
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">Créer un utilisateur</div>
                <div class="card-body">
                    <form method="POST" action="{{ route('users.store') }}">
                        @csrf
                        <div class="form-group">
                            <label for="name">Name</label>
                            <input type="text" name="name" id="name" class="form-control @error('name') is-invalid @enderror" value="{{ old('name') }}" required>
                            @error('name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="email">Email</label>
                            <input type="email" name="email" id="email" class="form-control @error('email') is-invalid @enderror" value="{{ old('email') }}" required>
                            @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="password">Password</label>
                            <input type="password" name="password" id="password" class="form-control @error('password') is-invalid @enderror" required>
                            @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        {{--  <div class="form-group">
                            <label for="password-confirm">Confirm Password</label>
                            <input type="password" name="password_confirmation" id="password-confirm" class="form-control" required>
                        </div>  --}}
                        <div class="form-group">
                            <label for="role">Role</label>
                            <select name="roles[]" multiple id="role" class="form-control @error('role') is-invalid @enderror" required>
                                <option value="">Choose a role</option>
                                @foreach($roles as $role)
                                    <option value="{{ $role->name }}">{{ $role->name }}</option>
                                @endforeach
                            </select>
                            @error('role')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <a href="{{ route('users.index') }}" type="button" class="btn btn-danger">Annuler</a>
                        <button type="submit" class="btn btn-success text-white">Enregistrer</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
