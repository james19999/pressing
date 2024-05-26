<div class="ml-3">
    <a class="btn btn-primary {{ request()->is('orders') ? 'actives' : '' }}" href="{{ route('orders.index') }}">Liste des commades</a>
    <a class="btn btn-primary {{ request()->is('orders/create') ? 'actives' : '' }}" href="{{ route('orders.create') }}">Passez une commande</a>
    <a class="btn btn-primary  {{ request()->is('users') ? 'actives' : '' }} "   href="">Clients</a>
</div>
<style>
    .actives {
        background-color: green;
    }
</style>
