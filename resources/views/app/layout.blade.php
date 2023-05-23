<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{ env('APP_NAME') }}</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@tabler/core@1.0.0-beta16/dist/css/tabler.min.css">
    <script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.8.2/dist/alpine.min.js" defer></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@tabler/core@1.0.0-beta16/dist/css/tabler-vendors.min.css">
    <script src=" https://cdn.jsdelivr.net/npm/lightgallery@2.7.1/lightgallery.min.js "></script>
    <link href=" https://cdn.jsdelivr.net/npm/lightgallery@2.7.1/css/lightgallery.min.css " rel="stylesheet">
    {{-- <link rel="stylesheet" href="{{ asset('library/lightgallery/dist/css/lightgallery.css') }}"> --}}
    <link rel="stylesheet" href="{{ asset("css/tabler.css") }}">
    @livewireStyles
</head>

<body class="antialiased">
    <div class="wrapper">
        @livewire('tabler.navbar')
        <div class="page-wrapper">
            <div class="container-xl">
                @yield('content')
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/@tabler/core@1.0.0-beta16/dist/js/tabler.min.js"></script>
    @livewireScripts
    @livewire('livewire-ui-modal')
    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/mermaid/dist/mermaid.min.js"></script>
    <script> mermaid.initialize({startOnLoad:true}); </script>
    <script src="{{ asset("lib/fslightbox.js") }}"></script>

    <script type="text/javascript">
        lightGallery(document.getElementById('lightgallery'), {
            // plugins: [lgZoom, lgThumbnail],
            // licenseKey: 'your_license_key',
            // speed: 500,
            // ... other settings
        });
    </script>
    <script src="https://cdn.jsdelivr.net/npm/masonry-layout@4.2.2/dist/masonry.pkgd.min.js" integrity="sha384-GNFwBvfVxBkLMJpYMOABq3c+d3KnQxudP/mGPkzpZSTYykLBNsZEnG2D9G/X/+7D" crossorigin="anonymous" async></script>
    {{-- <script src="{{ asset('library/lightgallery/dist/lightgallery.min.js') }}"></script> --}}
    @stack('scripts')
</body>

</html>
