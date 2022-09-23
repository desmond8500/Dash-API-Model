@component('components.tabler.header', ['title'=>'Documentation', 'subtitle'=>'Configurations'])

@endcomponent

<div class="row">
    <div class="col-md-8">
        @if ($contenu)
            <div class="card">
                <div class="card-body">
                    @parsedown($contenu)
                </div>
            </div>
        @endif
    </div>
    <div class="col-md-4">
        <div class="card">
            <div class="card-body">
                <ul>
                    @foreach ($files as $file)
                        <li><a href="{{ route('tabler.manuals', ['fichier'=>$file]) }}">{{ $file }}</a></li>
                    @endforeach
                </ul>
            </div>
        </div>
    </div>
</div>
