<div class="ml-3">
    <a class="btn btn-primary {{ request()->is('garments') ? 'actives' : '' }}" href="{{ route('garments.index') }}">Linges</a>
    <a class="btn btn-primary {{ request()->is('garments/create') ? 'actives' : '' }}" href="{{ route('garments.create') }}">Créer un linge</a>

</div>
<style>
    .actives {
        background-color: green;
    }
</style>
