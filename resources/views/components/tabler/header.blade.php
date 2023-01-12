<div class="page-header mb-2">
    <div class="row align-items-center">
        <div class="col">
            {{-- <div class="page-pretitle"> {{ $subtitle ?? '' }} </div> --}}
            <div class="mb-1">
                <ol class="breadcrumb" aria-label="breadcrumbs">
                    <li class="breadcrumb-item"><a href="/">Accueil</a></li>
                    @isset ($breadcrumbs)
                        @foreach ($breadcrumbs as $key => $breadcrumb)
                            <li class="breadcrumb-item"><a href="{{ $breadcrumb['route'] }}">{{ $breadcrumb['name'] }}</a></li>
                        @endforeach
                    @endisset
                </ol>
            </div>
            <h2 class="page-title"> {{ $title ?? '' }} </h2>
        </div>
        <div class="col-auto ms-auto">
            {{ $slot ?? '' }}
        </div>
    </div>
</div>
