<div style="display: inline;" class="favorite-toggle" data-exists="{{ $exists }}">

    @if($exists === true)
    <a href="#" class="remove" title="{{__('favorites.remove')}}" wire:click="update" data-id="{{ $id }}">
        {{-- <img src="{{asset('img/icons/favorites-full-white.svg')}}" alt="" uk-tooltip="title: {{__('favorites.rimuovi')}}"> --}}
        <span>{{__('favorites.remove')}}</span>
    </a>
    @else
    <a href="#" class="add" title="{{__('favorites.aggiungi')}}" wire:click="update" data-id="{{ $id }}">
        {{-- <img src="{{asset('img/icons/favorites-negativo.svg')}}" alt="" uk-tooltip="title: {{__('favorites.aggiungi')}}"> --}}
        <span>{{__('favorites.aggiungi')}}</span>
    </a>
    @endif

                    
</div>
