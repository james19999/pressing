<div class="ml-3">
    <a class="btn btn-primary {{ request()->is('roles') ? 'actives' : '' }}" href="{{ route('roles.index') }}">Rôle</a>
    <a class="btn btn-primary {{ request()->is('permissions') ? 'actives' : '' }}" href="{{ route('permissions.index') }}">Permissions</a>
    <a class="btn btn-primary  {{ request()->is('users') ? 'actives' : '' }} "   href="{{ route('users.index') }}">Utilisateurs</a>
</div>
<style>
    .actives {
        background-color: green;
    }
</style>
