<div class="row">
    @component('components.tabler.header', ['title'=> 'Dashboard', 'subtitle'=> 'Subtitle'])
    @endcomponent

    @foreach ($cards as $card)
        <div class="col-md-3">
            @include('_tabler._cards.card1', ['card'=>$card])
        </div>
    @endforeach

    <div class="w-100"></div>


    </div>
</div>
