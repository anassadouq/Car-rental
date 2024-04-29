<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create Voiture</title>
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
            margin-top: 5px;
        }

        input[type="radio"] {
            width: 15px;
        }
        input[type="checkbox"] {
            width: 15px;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <form action="{{ route('voiture.update', $voiture) }}" class="my-form container" method="post" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="mb-3">
                        <label for="image" class="form-label">Image :</label>
                        <input type="file" name="image" class="form-control">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Matricule :</label>
                        <input type="text" value="{{ $voiture->matricule }}" name="matricule" class="form-control">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Marque :</label>
                        <input type="text" name="marque" value="{{ $voiture->marque }}" class="form-control">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Modèle  :</label>
                        <input type="text" name="modele" value="{{ $voiture->modele }}" class="form-control">
                    </div>
                    <div class="row">
                        <div class="col mb-3">
                            <label class="form-label">Puissance :</label>
                            <input type="text" name="puissance" value="{{ $voiture->puissance }}" class="form-control">
                        </div>
                        <div class="col mb-3">
                            <label class="form-label">Coût par jour :</label>
                            <input type="text" name="prixJ" value="{{ $voiture->prixJ }}" class="form-control">
                        </div>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Carburant :</label>
                        <input type="radio" name="carburant" value="Diesel" {{ $voiture->carburant == 'Diesel' ? 'checked' : '' }}> Diesel
                        <input type="radio" name="carburant" value="Essence" {{ $voiture->carburant == 'Essence' ? 'checked' : '' }}> Essence
                        <input type="radio" name="carburant" value="Hybride" {{ $voiture->carburant == 'Hybride' ? 'checked' : '' }}> Hybride
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Réserver :</label>
                        <input type="radio" name="reservee" value="Oui" {{ $voiture->reservee == 'Oui' ? 'checked' : '' }}> Oui
                        <input type="radio" name="reservee" value="Non" {{ $voiture->reservee == 'Non' ? 'checked' : '' }}> Non
                    </div>
                    <button type="submit" class="form-control btn btn-secondary">Modifier</button>
                </form>
            </div>
        </div>
    </div>
</body>
</html>