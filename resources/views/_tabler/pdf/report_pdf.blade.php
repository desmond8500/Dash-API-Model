<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Rapport</title>
    <link rel="stylesheet" href="css/pdf.css">
    <link rel="stylesheet" href="css/report.css">
</head>
<body style="font-family: sans-serif; font-size:12px">

    <table class="table">
        <tr>
            <td class="td-white">
                <img src="{{ $entreprise->logo ?? $logo}}" height="100px" alt="">
            </td>
            <td class="td-white">
                <div class="doc_title">{{ $report->type() }}</div>
                <div class="text-right">{{ date_format($report->date , 'd-m-Y') }}</div>
            </td>
        </tr>
    </table>
    <hr class="text-blue">
    <div>
        <div class="client">{{ $report->projet->client->name }} - {{ $report->projet->name }}</div>
        <div>{{ $report->description }}</div>
    </div>

    @foreach ($sections as $section)
        <div class="section_title">{{ $section->title }}</div>

        <div>
            <table class="table">
                <tr>
                    <td style="vertical-align: top" class="td-white">
                        <div class="mb-2 description">
                            {!! nl2br($section->description) !!}
                        </div>
                    </td>
                    <td style="width: 130px" class="td-white">
                        @if ($section->modalites)
                            <table class="table">
                                <tr>
                                    <th class="text-center td-blue" colspan="2"> MODALITES</th>
                                </tr>
                                <tr>
                                    <td class=""> <b>Durée</b> </td> <td class="text-center"> {{ $section->modalites->duree }} </td>
                                </tr>
                                <tr>
                                    <td class=""> <b>Techniciens</b> </td> <td class="text-center"> {{ $section->modalites->technicien }} </td>
                                </tr>
                                <tr>
                                    <td class=""> <b>Ouvriers</b> </td> <td class="text-center"> {{ $section->modalites->ouvrier }} </td>
                                </tr>
                                <tr>
                                    <td class=""> <b>Complexité</b> </td> <td class="text-center"> {{ $section->modalites->complexite() }} </td>
                                </tr>
                                <tr>
                                    <td class=""> <b>Risque</b> </td> <td class="text-center"> {{ $section->modalites->risque() }} </td>
                                </tr>
                            </table>
                        @endif
                    </td>
                </tr>
            </table>
        </div>
        <div>
            @foreach ($section->files as $file)
                <a href="{{ $file->folder }}">
                    <img src="{{ $file->folder }}" alt="{{ $file->name }}" width="100px" />
                </a>
            @endforeach
        </div>

        @if ($section->links->count())
            <div>Liens associés</div>
            <ul>
                @foreach ($section->links as $link)
                    <li>
                        <a href="{{ $link->link }}" target="_blank">{{ $link->name }}</a>
                    </li>
                @endforeach
            </ul>
        @endif
    @endforeach
</body>
</html>
