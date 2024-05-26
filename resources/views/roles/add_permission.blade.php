@extends('layouts.layout')

@section('content')
    <div class="col-12 ">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="defaultModalLabel">Ajouter des permissions à cette rôle</h4>
                    <button type="button" class="btn btn-light btn-circle dismiss" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true" class="material-icons">close</span>
                    </button>
                </div>
                <div class="modal-body">
                    <h2 style="text-align: center"> Rôle : {{ $role->name }} </h2>
                    <form action="{{ route('give-permission-to-role', $role) }}" method="POST">
                        @method('PUT')
                        @csrf
                        <div class="row">
                            @foreach ($permissions as $permission)
                                <div class="col-md-3">
                                    <input type="checkbox" name="permission[]" value="{{ $permission->name }}"
                                        id="" {{ in_array($permission->id, $rolesPermissions) ? 'checked' : '' }}>
                                    {{ $permission->name }}
                                </div>
                            @endforeach
                        </div>
                </div>
                <div class="modal-footer">
                    <a href="{{ route('roles.index') }}" type="button" class="btn btn-danger"
                        data-dismiss="modal">Annuler</a>
                    <button type="submit" class="btn btn-primary">Appliquer</button>
                </div>
                </form>
            </div>
        </div>
    </div>
@endsection
