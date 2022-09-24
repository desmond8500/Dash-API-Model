@component('components.tabler.header', ['title'=> 'Dashboard', 'subtitle'=> 'Subtitle'])

@endcomponent
<div>
    @auth
        Connecté
        @else
        Non connecté
    @endauth
</div>
<div>
    {{ $users->count() }}
</div>
<div>
    <a href="{{ route('tabler.register') }}">inscription</a>
</div>

<div class="row">
    @foreach ($users as $user)
        <div class="col-md-4">
            <div class="card card-body">
                <div>{{ $user->name }} - {{ $user->email }} - </div>
            </div>
        </div>
    @endforeach
</div>
