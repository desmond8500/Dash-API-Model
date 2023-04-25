<div>
    @foreach ($selected_rows as $key => $row_item)
        <div class="d-flex justify-content-between">
            <div>{{ $row_item }}</div>
            <a class="btn btn-danger btn-icon btn-sm mb-1" wire:click="unselect_row('{{ $key }}')">
                <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-x" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"> <path stroke="none" d="M0 0h24v24H0z" fill="none"></path> <path d="M18 6l-12 12"></path> <path d="M6 6l12 12"></path> </svg>
            </a>
        </div>
    @endforeach

    <hr>
    <div class="btn-list">
        @foreach ($ligne_list as $row_item)
            <a class="btn btn-primary" wire:click="select_row('{{ $row_item }}')">{{ $row_item }}</a>
        @endforeach
    </div>
</div>


