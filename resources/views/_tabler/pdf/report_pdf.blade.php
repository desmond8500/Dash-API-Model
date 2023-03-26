<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Rapport</title>
    <link rel="stylesheet" href="css/pdf.css">
</head>
<body style="font-family: sans-serif; font-size:12px">

    <h3>Rapport de visite</h3>

    @foreach ($sections as $section)
        <div class="mb-2">
            <div class="card">
                <div class="card-header">
                    <div class="card-title">{{ $section->title }}</div>

                </div>
                <div class="card-body">
                    {!! nl2br($section->description) !!}
                </div>
                <div class="card-footer">

                </div>
            </div>
        </div>
    @endforeach

</body>
</html>
