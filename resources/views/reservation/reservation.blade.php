<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <title>Document</title>
</head>
<body>

    <style>
        table, th {
            border: 1px solid;
        }
        .client {
            width: 50%;
            float: left;
        }

        .agence {
            width: 50%;
            float: left;
            margin-left: 20px;
        }

        footer{
            position: fixed;
            font-size: 13px;
            font-weight: bold;
            bottom: 0;
            text-align:center;
        }
    </style>

    <header>
        <div class="client">
            <img src="https://img.freepik.com/vecteurs-libre/modele-logo-concessionnaire-automobile-degrade_23-2149334632.jpg?w=740&t=st=1713821612~exp=1713822212~hmac=ef73f154019b081288149d26b68875c05790918aca2bf225b3db34f7527eb810" width="120px">
        </div>
        <div class="agence">
            <p>RENTALMARRAKECH SARL AU</p>
            <p>ICE : 00144258120091</p>
            <p>Av. Allal El Fassi BP 20154 Marrakech - Maroc</p>
        </div>
    </header><br><br><br><br><br><br><br><br>
    
    @foreach($reservations as $reservation)
        <div class="client">
            <h3>Facture N: {{$reservation->id}}</h3>
        </div>
        <div class="agence">
            <h3>Date de facture : {{ date('d/m/Y') }}</h3>
        </div><br><br>
    @endforeach

    <div>

        <table width="100%">
            <thead>
                <th colspan="3" style="text-align: center; background-color:#F0F0F0">INFORMATIONS RESERVATION</th>
            </thead>
            <tbody style="text-align: center">
                @foreach($reservations as $reservation)
                    <td><b>Date de début :</b> {{ \Carbon\Carbon::parse($reservation->dateD)->format('d/m/Y') }}</td>
                    <td><b>Date de fin :</b> {{ \Carbon\Carbon::parse($reservation->dateF)->format('d/m/Y') }}</td>
                    <td><b>Durée :</b> 
                        {{
                            \Carbon\Carbon::parse($reservation->dateD)
                            ->diffInDays(\Carbon\Carbon::parse($reservation->dateF)) +1
                            . ' jours'
                        }}
                    </td>
                @endforeach
            </tbody>
        </table><br>

        <table width="100%">
            <thead>
                <th colspan="2" style="text-align: center; background-color:#F0F0F0">INFORMATIONS CLIENT</th>
            </thead>
            <tbody style="text-align: center">
                <tr>
                    <td><b>Nom :</b> {{$client->nom}}</td>
                    <td><b>Prénom : </b>{{$client->prenom}}</td>
                </tr>
                <tr>
                    <td><b>CIN :</b> A126530</td>
                    <td><b>Téléphone :</b> 0655326530</td>
                </tr>
            </tbody>
        </table><br>

        <table width="100%">
            <thead>
                <th colspan="2" style="text-align: center; background-color:#F0F0F0">INFORMATIONS VOITURE</th>
            </thead>
            <tbody style="text-align: center">
                @foreach($reservations as $reservation)
                    <tr>
                        <td><b>Matricule :</b> {{$reservation->voiture->matricule}}</td>
                        <td><b>Coût par jour :</b> {{$reservation->voiture->prixJ}} DH</td>
                    </tr>
                    <tr>
                        <td><b>Puissance :</b> {{$reservation->voiture->puissance}}</td>
                        <td><b>Carburant :</b> {{$reservation->voiture->carburant}}</td>
                    </tr>
                    <tr>
                        <td><b>Marque :</b> {{$reservation->voiture->marque}}</td>
                        <td><b>Modèle :</b> {{$reservation->voiture->modele}}</td>
                    </tr>
                @endforeach
            </tbody>
        </table><br>

        <table class="text-center my-3" style="width:50%">
            <tr>
                <th style="background-color:#F0F0F0" colspan=2 width="40%">TOTAL HT en DHs</th>
                <th>
                    {{ $totalHT = $reservation->voiture->prixJ * (\Carbon\Carbon::parse($reservation->dateD)->diffInDays(\Carbon\Carbon::parse($reservation->dateF)) + 1) }} DH
                </th>
            </tr>
            <tr>
                <th style="background-color:#F0F0F0">TVA</th>
                <th style="background-color:#F0F0F0">20%</th>
                <th>{{ $tva = $totalHT * 0.20 }} DH</th>  
            </tr>  
            <tr>
                <th style="background-color:#F0F0F0" colspan=2>Total TTC en DHs</th>
                <th>{{ $totalTTC = $totalHT + $tva }} DH</th>
            </tr>
        </table><br>

        <div class="client" style="border: 1px solid;">
            <div style="height: 170px;">Signature du client : </div>
        </div>
        <div class="agence" style="border: 1px solid;">
            <div style="height: 170px;">Signature chef d'agence : </div>
        </div>
<br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
        <footer>
            Ste RENTALMARRAKECH Av. Allal El Fassi - Marrakech - Maroc 
            Tel : 06 50 50 21 05 / 
            Fax : 05 22 62 36 36
        </footer>

    </div>

</body>
</html>