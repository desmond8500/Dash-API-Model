<div>
    @component('components.tabler.header', ['title'=>'Articles', 'subtitle'=>'Stock'])

    <button class="btn btn-primary">
        <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-plus" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"> <path stroke="none" d="M0 0h24v24H0z" fill="none"></path> <line x1="12" y1="5" x2="12" y2="19"></line> <line x1="5" y1="12" x2="19" y2="12"></line> </svg>
        Article
    </button>

    @endcomponent

    <div class="row">
        @if (!$form)
            <div class="col-md-6">
                <div class="mb-3">
                    <label class="form-label">Désignation</label>
                    <input type="text" class="form-control" placeholder="Désignation">
                </div>
                <div class="mb-3">
                    <label class="form-label">Réference</label>
                    <input type="text" class="form-control" placeholder="Réference">
                </div>
                <div class="mb-3">
                    <label class="form-label">Priorité</label>
                    <input type="text" class="form-control" placeholder="">
                    <select class="select-form">
                        @foreach ($collection as $item)

                        @endforeach
                        <option value=""></option>
                    </select>
                </div>

            </div>


        @else

        @endif


    </div>

</div>
