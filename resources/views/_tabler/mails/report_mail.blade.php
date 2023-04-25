@extends('app.mail')

@section('content')
<div style="
        margin: 15px;
        padding: 10px;
        background: white;
        border-radius: 5px;
        margin: auto;
        text-align: center;
        ">

    <h2 style="
            text-transform: uppercase;
            text-align: center;
            background: #206bc4;
            color: white;
            padding: 5px;
            margin-right: 30px;
            margin-left: 30px;
            ">
        Rapport
    </h2>

    <p>
        Bonjour,
    </p>
    <p>
        Voilà ci dessous le compte rendu :
    </p>

    <hr style="color: #206bc4;">

    <div style="text-align: left; color: grey">
        <table>
            <tr>
                <td>
                    <img src="{{ asset('img/logo/logo.png') }}" alt="Logo" width="50px">
                </td>
                <td>
                    <div style="text-align: left; color: grey;">
                        L'équipe de GetAPro
                    </div>
                    <div style="font-size: 10px; text-align: left; color: grey;">
                        By We Do Cloud
                    </div>
                </td>
            </tr>
        </table>
    </div>

</div>

@endsection
