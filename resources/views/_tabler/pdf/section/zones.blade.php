<table class="table mb-1">
    <tr>
        <th class="zone-title" colspan="4">Plan de zonage</th>
    </tr>
    <tr class="zone-head">
        <th style="width: 5%">#</th>
        <th style="width: 10%" class="text-center">Zone</th>
        <th scope="col">Equipements</th>
        <th scope="col">Local</th>
    </tr>
    @foreach ($fiche->zones as $key => $row)
    <tr>
        <td class="text-center fw-bold">{{ $key+1 }}</td>
        <td class="text-center">{{ $row->zone }}</td>
        <td>
            {{ $row->equipement }}
        </td>
        <td>
            {{ $row->local }}
        </td>
    </tr>
    @endforeach
</table>
