<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Client</title>
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
                <form action="{{ route('client.update', $client) }}" class="my-form container" method="post">
                    @csrf
                    @method('PUT')
                    <div class="mb-3">
                        <label class="form-label">CIN:</label>
                        <input type="text" placeholder="CIN Client" name="cin" value="{{ $client->cin }}" class="form-control">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Permis :</label>
                        <input type="text" placeholder="Permis Client" name="permis" value="{{ $client->permis }}" class="form-control">
                    </div>
                    <div class="row mb-3">
                        <div class="col-6">
                            <label class="form-label">Prénom :</label>
                            <input type="text" placeholder="Prénom Client" name="prenom" value="{{ $client->prenom }}" class="form-control">
                        </div>
                        <div class="col-6">
                            <label class="form-label">Nom :</label>
                            <input type="text" placeholder="Nom Client" name="nom" value="{{ $client->nom }}" class="form-control">
                        </div>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Adresse :</label>
                        <textarea name="adresse" cols="60" rows="1" placeholder="Adresse Client" class="form-control">{{ $client->adresse }}</textarea>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Téléphone :</label>
                        <input type="text" placeholder="Téléphone Client" name="tel" value="{{ $client->tel }}" class="form-control">
                    </div>
                    <button type="submit" class="form-control btn btn-secondary">Modifier</button>
                </form>
            </div>
        </div>
    </div>
</body>
</html>