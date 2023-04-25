<div class="page-header mb-2">
    <div class="row align-items-center">
        <div class="col">
            {{-- <div class="page-pretitle"> {{ $subtitle ?? '' }} </div> --}}
            <div class="mb-1">
                <ol class="breadcrumb" aria-label="breadcrumbs">
                    <li class="breadcrumb-item"><a href="/" class="text-dark">Accueil</a></li>
                    @isset ($breadcrumbs)
                        @foreach ($breadcrumbs as $key => $breadcrumb)
                            <li class="breadcrumb-item @if ($loop->last) active @endif">
                                <a href="{{ $breadcrumb['route'] }}" class="text-dark">{{ $breadcrumb['name'] }}</a>
                            </li>
                        @endforeach
                    @endisset
                </ol>
            </div>
            <h2 class="page-title"> {{ $title ?? '' }} </h2>
        </div>
        <div class="col-auto ">
            {{ $slot ?? '' }}
        </div>
    </div>
</div>
