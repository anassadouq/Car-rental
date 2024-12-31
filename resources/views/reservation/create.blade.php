<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create Réservation</title>
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <style>
        label {
            font-weight: bold;
        }

        input {
            width: 350px;
        }
        
        .my-form {
            width: 100%;
            max-width: 600px;
            margin: auto;
            padding: 20px;
            border: 1px solid #ddd;
            border-radius: 5px;
            margin-top: 20px;
        }

        input[type="radio"] {
            width: 15px;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <form method="POST" action="{{ route('reservation.store') }}" class="my-form">
                    @csrf
                    <div class="mb-3">
                        <label class="form-label">Client :</label>
                        <select name="id_client" class="my-3" id="client">
                            @foreach($clients as $client)
                                <option value="{{ $client->id }}">{{ $client->prenom }} {{ $client->nom }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Voiture :</label>
                        <select name="id_voiture" class="my-3" id="voiture">
                            @foreach($voitures as $voiture)
                                @if($voiture->reservee =="Non")
                                    <option value="{{ $voiture->id }}">{{ $voiture->marque }} {{ $voiture->matricule }}</option>
                                @endif
                            @endforeach
                        </select>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Date Début :</label>
                        <input type="date" name="dateD" class="form-control"/>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Date Fin :</label>
                        <input type="date" name="dateF" class="form-control"/>
                    </div>
                    <button type="submit" class="form-control btn" style="background-color: #13274F; color:white;">Ajouter</button>
                </form>
            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
    <script>
        $(document).ready(function() {
            $('#client').select2({
                placeholder: 'Rechercher un article',
                allowClear: true
            });
        });

        $(document).ready(function() {
            $('#voiture').select2({
                placeholder: 'Rechercher un article',
                allowClear: true
            });
        });
    </script>
</body>
</html>