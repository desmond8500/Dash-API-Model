<div>
    <div>
        @component('components.tabler.header', ['title'=>'Devis', 'subtitle'=>'ERP', 'breadcrumbs'=>$breadcrumbs])

        @endcomponent
    </div>

    @dump($devis->projet->client->name)
</div>
