<div>
    @component('components.tabler.header', ['title'=>'Marques', 'subtitle'=>'Stock', 'breadcrumbs'=>$breadcrumbs])
        @livewire('tabler.stock.brand-add')
    @endcomponent

    <div class="row">
        @foreach ($brands as $brand)
            <div class="col-md-4 g-2">
                <div class="card p-2">
                    <div class="row">
                        <div class="col-auto">
                            <img src="" alt="A" class="avatar">
                        </div>
                        <div class="col-md">
                            <div class="card-title">{{ $brand->name }}</div>
                            <div class="text-muted">{{ $brand->description }}</div>
                        </div>
                        <div class="col-auto">
                            {{ $brand->id }}
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</div>
