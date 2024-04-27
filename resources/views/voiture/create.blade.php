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
    </style>
</head>
<body>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <form method="post" action="{{ route('voiture.store') }}" enctype="multipart/form-data" class="my-form">
                    @csrf
                    <div class="mb-3">
                        <label for="image" class="form-label">Image :</label>
                        <input type="file" name="image" class="form-control">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Matricule :</label>
                        <input type="text" placeholder="Matricule de la voiture" name="matricule" class="form-control">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Marque :</label>
                        <input type="text" placeholder="Marque de la voiture" name="marque" class="form-control">
                    </div>
                    <div class="mb-3 row">
                        <div class="col-6">
                            <label class="form-label">Année de modèle  :</label>
                            <input type="text" placeholder="Année de modèle" name="modele" class="form-control">
                        </div>
                        <div class="col-6">
                            <label class="form-label">Puissance :</label>
                            <input type="text" placeholder="Puissance de la voiture" name="puissance" class="form-control">
                        </div>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Coût par jour :</label>
                        <input type="text" placeholder="Coût par jour" name="prixJ" class="form-control">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Carburant :</label>
                        <input type="radio" name="carburant" value="Diesel"> Diesel
                        <input type="radio" name="carburant" value="Essence"> Essence
                        <input type="radio" name="carburant" value="Hybride"> Hybride
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Réserver :</label>
                        <input type="radio" name="reservee" value="Oui"> Oui
                        <input type="radio" name="reservee" value="Non"> Non
                    </div>
                    <button type="submit" class="form-control btn btn-primary">Créer Voiture</button>
                </form>
            </div>
        </div>
    </div>
</body>
</html>