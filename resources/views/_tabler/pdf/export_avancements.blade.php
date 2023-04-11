<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Planning</title>
    <link rel="stylesheet" href="css/pdf.css">
    <link rel="stylesheet" href="css/avancement.css">
</head>
<body style="font-family: sans-serif; font-size:10px">

    <div class="table-responsive">
        <table class="table">
            <tbody>
                <tr class="tr">
                    <td class="td-white" style="font-size:18px"> {{ $doc_title }} </td>
                    <td class="td-white text-end" style="padding-top:5px; padding-bottom:5px;">
                        {{-- <div style="font-size:13px;"> Du {{ $semaine['debut'] }} au {{ $semaine['fin'] }}</div> --}}
                    </td>
                </tr>
            </tbody>
        </table>
    </div>


    <div class="table-responsive">
        <table class="table">
            @foreach ($buildings as $building)
                <tr class="bg-grey font-oswald" style="font-size:13px">
                    <th colspan="6" class="text-center" style="vertical-align: center; text-transform: uppercase;">{{ $building->name }}</th>
                </tr>
                <tr class="bg-grey">
                    <th scope="col">Description</th>
                    <th style="width: 50px; margin:auto; ">Durée</th>
                    <th style="width: 60px; margin:auto; ">Début</th>
                    <th style="width: 60px; margin:auto; ">Fin</th>
                    <th style="width: 35px; margin:auto; "> % </th>
                    <th class="text-center">Commentaires / Taches conditionelles</th>
                </tr>
                <tbody>
                    @foreach ($building->categories as $category)
                        <tr class="bg-grey">
                            <td colspan="6" style="text-transform: uppercase">{{ $category->name }}</td>
                        </tr>

                        @foreach ($category->avancements as $avancement)
                            <tr class="bg-orange">
                                <th colspan="6" style="text-transform: uppercase; text-align: left; padding-left:5px">{{ $avancement->name }}</th>
                            </tr>
                            @foreach ($avancement->sections as $section)
                                <tr class="fw-bold">
                                    <td>{{ $section->name }}</td>
                                    <td class="text-center">
                                        @if ($section->rows->count())
                                            {{-- {{ $section->duration()+1 }} Days --}}
                                        @endif
                                    </td>
                                    <td class="text-center">
                                        @if (!$section->prevision)
                                            {{-- @if ($section->rows->count())
                                                {{ date_format($section->start(), 'd-m-Y') }}
                                            @endif --}}
                                        @endif
                                    </td>
                                    <td class="text-center">
                                        @if ($section->rows->count())
                                            {{-- @if ($section->rows->count())
                                                {{ date_format($section->end(), 'd-m-Y') }}
                                            @endif --}}
                                        @endif
                                    </td>
                                    <td class="text-center">
                                        @if ($section->rows->count())
                                            @php
                                                $somme = number_format($section->rows->sum('progress') / $section->rows->count(), 0, ',', ' ');
                                            @endphp
                                            {{ $somme }} %
                                        @endif
                                    </td>
                                    <td>{{ $section->comment }}</td>
                                </tr>
                                @foreach ($section->rows as $row)
                                    <tr>
                                        <td  style="text-align: left; padding-left:15px">{{ $row->name }}</td>
                                        <td class="text-end">{{ $row->duration() }} Days</td>
                                        <td class="text-center">
                                            @if (!$row->prevision)
                                                {{ date_format($row->start, 'd-m-Y') }}
                                            @endif
                                        </td>
                                        <td class="text-center">
                                            @if (!$row->prevision)
                                                {{ date_format($row->end, 'd-m-Y') }}
                                            @endif
                                        </td>
                                        <td class="text-center">{{ $row->progress }} %</td>
                                        <td>{{ $row->comment }}</td>
                                    </tr>
                                @endforeach
                            @endforeach
                        @endforeach
                    @endforeach
                </tbody>
            @endforeach
        </table>
    </div>


</body>
</html>
