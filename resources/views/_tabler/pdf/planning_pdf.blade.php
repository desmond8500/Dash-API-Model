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
                    <td class="semaine" >Systèmes et taches</td>
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
                @foreach ($period as $date)
                    <td>{{ $date->format('d') }}</td>
                @endforeach
            </tr>

            @foreach ($buildings as $key => $building)
                @foreach ($building->plannings as $planning)
                    <tr>
                        @if ($loop->first)
                            <td rowspan="{{ $building->plannings->count() }}" style="font-size:15px">{{ $building->name }}</td>
                        @endif
                        <td>
                            <b>{{ $planning->system->name }}</b>
                            <div>{{ $planning->tache }}</div>
                        </td>
                        @foreach ($period as $date)
                            <td style="border: 1px solid grey" @class(['bg-blue border' => $planning->validate($date->format('Y-m-d')) ])> </td>
                        @endforeach
                    </tr>
                @endforeach
            @endforeach

        </table>
    </div>
</body>
</html>
