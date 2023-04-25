<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Rapport</title>
    <link rel="stylesheet" href="css/pdf.css">
    <link rel="stylesheet" href="css/fiche.css">
</head>

<body style="font-family: sans-serif; ">
    <table class="table">
        <tr>
            <td class="main-title" colspan="2">{{ $title ?? "Fiche d'exploitation" }}</td>
        </tr>
        <tr>
            <td class="logo " style="border-bottom: 0px">
                @if ($societe)
                    <div class="text-center">
                        <img src="{{ $societe->logo }}" alt="logo" height="50px">
                    </div>
                @endif
            </td>
            <td class="project-name" style="border-bottom: 0px">
                {{ $fiche->projet->name ?? "Nom du projet" }}
            </td>
        </tr>
    </table>

    <table class="table mb-1" >
        <tr style="border-top: 0px;">
            <td class="centrale">{{ $fiche->modele ?? "Modèle de centrale" }}</td>
            <td class="text-end centrale">{{ date_format($fiche->date, ('d-m-Y')) ?? "Date" }}</td>
        </tr>
    </table>

    @include('_tabler.pdf.section.zones')

    @if ($fiche->fiche_type_id==1)
        @include('_tabler.pdf.section.galaxy')
    @endif
</body>

</html>
