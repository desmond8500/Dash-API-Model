<div class="row">
    @component('components.tabler.header', ['title'=> 'Dashboard', 'subtitle'=> 'Subtitle'])
        <button class="btn fw-bold">{{ auth()->user()->name }}</button>
    @endcomponent

    @foreach ($cards as $card)
        <div class="col-md-3 mb-1">
            @include('_tabler._cards.card1', ['card'=>$card])
        </div>
    @endforeach

    <div class="col-md-12">
        @livewire('tabler.func.planning')
    </div>



    </div>
</div>
