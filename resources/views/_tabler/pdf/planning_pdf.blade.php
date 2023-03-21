<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Planning</title>
    <link rel="stylesheet" href="css/pdf.css">
</head>
<body style="font-family: sans-serif; font-size:12px">

    <div class="table-responsive">
        <table class="table table-primary">
            <tbody>
                <tr class="">
                    <td style="font-size:18px">{{ $company }}</td>
                    <td style="padding-top:5px; padding-bottom:5px;">
                        <div style="font-size:15px;"> {{ $projet }} - Planning Hebdomadaire</div>
                        <div>Du {{ $semaine['debut'] }} au {{ $semaine['fin'] }}</div>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>

    <div class="table-responsive" style="background: #f8f8f8">
        <table class="table">
            <thead class="thead">
                <tr>
                    <td class="semaine" >Batiment</td>
                    <td class="semaine" >Détails</td>
                    <td class="semaine text-center" colspan="7">Semaine 1</td>
                    <td class="semaine text-center" colspan="7">Semaine 2</td>
                </tr>
            </thead>
            <tr>
                <th colspan="2" rowspan="2">
                    {{-- Semaine du projet --}}
                </th>

                <th class="jour">L</th>
                <th class="jour">M</th>
                <th class="jour">M</th>
                <th class="jour">J</th>
                <th class="jour">V</th>
                <th class="jour">S</th>
                <th class="jour">D</th>

                <th class="jour">L</th>
                <th class="jour">M</th>
                <th class="jour">M</th>
                <th class="jour">J</th>
                <th class="jour">V</th>
                <th class="jour">S</th>
                <th class="jour">D</th>
            </tr>

            <tr>
                <td class="jour2">{{ $carbon->startOfWeek()->day - 7 }}</td>
                <td class="jour2">{{ $carbon->startOfWeek()->day - 6 }}</td>
                <td class="jour2">{{ $carbon->startOfWeek()->day - 5 }}</td>
                <td class="jour2">{{ $carbon->startOfWeek()->day - 4 }}</td>
                <td class="jour2">{{ $carbon->startOfWeek()->day - 3 }}</td>
                <td class="jour2">{{ $carbon->startOfWeek()->day - 2 }}</td>
                <td class="jour2">{{ $carbon->startOfWeek()->day - 1 }}</td>

                <td class="jour2">{{ $carbon->startOfWeek()->day + 0 }}</td>
                <td class="jour2">{{ $carbon->startOfWeek()->day + 1 }}</td>
                <td class="jour2">{{ $carbon->startOfWeek()->day + 2 }}</td>
                <td class="jour2">{{ $carbon->startOfWeek()->day + 3 }}</td>
                <td class="jour2">{{ $carbon->startOfWeek()->day + 4 }}</td>
                <td class="jour2">{{ $carbon->startOfWeek()->day + 5 }}</td>
                <td class="jour2">{{ $carbon->startOfWeek()->day + 6 }}</td>
            </tr>

            @json($buildings)

            @foreach ($buildings as $key => $building)
                @foreach ($building->plannings as $planning)
                    <tr>
                        @if ($loop->first)
                            <td rowspan="{{ $building->plannings->count() }}" style="font-size:18px">{{ $building->name }}</td>
                        @endif
                        <td>
                            <b>{{ $planning->system->name }}</b>
                            <div>{{ $planning->tache }}</div>
                        </td>
                        {{-- {{ $planning->debut }} {{ $planning->fin }} --}}
                        <td @class(['td-dotted', 'bg-blue' => $planning->validate(-7) ])>  </td>
                        <td @class(['td-dotted', 'bg-blue' => $planning->validate(-6) ])>  </td>
                        <td @class(['td-dotted', 'bg-blue' => $planning->validate(-5) ])>  </td>
                        <td @class(['td-dotted', 'bg-blue' => $planning->validate(-4) ])>  </td>
                        <td @class(['td-dotted', 'bg-blue' => $planning->validate(-3) ])>  </td>
                        <td @class(['td-dotted', 'bg-blue' => $planning->validate(-2) ])>  </td>
                        <td @class(['td-dotted', 'bg-blue' => $planning->validate(-1) ])>  </td>

                        <td @class(['td-dotted', 'td-border-left', 'bg-blue' => $planning->validate(0) ])>  </td>
                        <td @class(['td-dotted', 'bg-blue' => $planning->validate(1) ])>  </td>
                        <td @class(['td-dotted', 'bg-blue' => $planning->validate(2) ])>  </td>
                        <td @class(['td-dotted', 'bg-blue' => $planning->validate(3) ])>  </td>
                        <td @class(['td-dotted', 'bg-blue' => $planning->validate(4) ])>  </td>
                        <td @class(['td-dotted', 'bg-blue' => $planning->validate(5) ])>  </td>
                        <td @class(['td-dotted', 'bg-blue' => $planning->validate(6) ])>  </td>
                    </tr>
                @endforeach
            @endforeach

        </table>
    </div>
</body>
</html>
