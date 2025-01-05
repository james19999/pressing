@extends('layouts.layout')

@section('content')
    <div class=" container m-2">
        @include('partials.nav-links')
        <div class="row justify-content-center ">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="card-title">
                            <h3>
                                Rôle : {{ $role->name }}
                            </h3>
                        </div>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('give-permission-to-role', $role) }}" method="POST">
                            @method('PUT')
                            @csrf
                            <div class="row">
                                @foreach ($permissions as $permission)
                                    <div class="col-md-3">
                                        <input type="checkbox" name="permission[]" value="{{ $permission->name }}"
                                            id=""
                                            {{ in_array($permission->id, $rolesPermissions) ? 'checked' : '' }}>
                                        {{ $permission->name }}
                                    </div>
                                @endforeach
                            </div>
                    </div>
                    <div class="card-footer">
                        <a href="{{ route('roles.index') }}" type="button" class="btn btn-danger"
                            data-dismiss="modal">Annuler</a>
                        <button type="submit" class="btn btn-primary">Appliquer</button>
                    </div>
                    </form>
                </div>

            </div>
        </div>
    </div>
    </div>
@endsection
