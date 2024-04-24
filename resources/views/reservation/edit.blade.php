<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Réservation</title>
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
                <form action="{{ route('reservation.update', $reservation) }}" class="my-form container" method="post">
                    @csrf
                    @method('PUT')
                    <input type="hidden" name="id_client" value="{{ $reservation->id_client }}" class="my-4">
                    <input type="hidden" name="id_voiture" value="{{ $reservation->id_voiture }}" class="my-4">

                    <div class="mb-3">
                        <label class="form-label">Date Début :</label>
                        <input type="date" name="dateD" value="{{ $reservation->dateD }}" class="form-control"/>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Date Fin :</label>
                        <input type="date" name="dateF" value="{{ $reservation->dateF }}" class="form-control"/>
                    </div>
                    <button type="submit" class="form-control btn btn-secondary">Edit reservation</button>
                </form>
            </div>
        </div>
    </div>
</body>
</html>