@extends('layouts.app')
@section('content')
    <html>
        <head>
            <title>Voitures</title>
            <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
            <link rel="stylesheet" href="https://cdn.datatables.net/1.13.2/css/jquery.dataTables.min.css">
            <link rel="stylesheet" href="https://cdn.datatables.net/buttons/2.3.4/css/buttons.dataTables.min.css">
            <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/dt/dt-1.11.4/datatables.min.css"/>
            <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
        </head>
        <body>
            <style>
                .card {
                    width: 14rem;
                }
                @media only screen and (max-width: 768px) {
                    .col-2 {
                        width: 100%;
                    }

                    .col-10 {
                        width: 100%;
                    }

                    .card {
                        width: 18rem;
                    }
                }
            </style>
            <div>
                <h1 class="text-center">VOITURES</h1>
                <a href="{{route('voiture.create')}}" >
                    <button class="btn my-3" style="background-color: #13274F; color:white; width:85px;">
                        <span class="material-symbols-outlined">add</span>
                    </button>
                </a>
                <div class="row">
                    @foreach ($voitures as $voiture)
                        <div class="mx-4 my-2 card">
                            <img src="/images/{{$voiture['image']}}" class="card-img-top">
                            <div class="card-body">
                                <b class="card-text">{{$voiture->marque}}</b>
                                <p>{{$voiture->matricule}}</p>
                                <p>Carburant : {{$voiture->carburant}}</p>
                                <p>Puissance : {{$voiture->puissance}}</p>
                                <p>Prix : {{$voiture->prixJ}} DH/jr</p>
                                @if($voiture->reservee == "Oui")
                                    <p style="color:green; font-weight:bold; font-size:17px;">Réserver</p>
                                @endif 
                                
                                <form action="{{ route('voiture.destroy', $voiture->id) }}" method="POST" id="deleteForm{{ $voiture->id }}">
                                    @csrf
                                    @method('DELETE')
                                    <a href="{{ route('voiture.edit', $voiture->id) }}" class="btn btn-secondary">
                                        <span class="material-symbols-outlined">edit</span>    
                                    </a>
                                    <button type="button" class="btn btn-danger mx-2" onclick="confirmDelete('{{ $voiture->id }}')">
                                        <span class="material-symbols-outlined">delete</span>
                                    </button>
                                </form>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>

            <script>
                function confirmDelete(clientId) {
                    if (confirm('Êtes-vous sûr de vouloir supprimer cette voiture ?')) {
                        document.getElementById('deleteForm' + clientId).submit();
                    }
                }
            </script>
            
        </body>
    </html>
@endsection