@extends('layouts.app')
@section('content')
<link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

    <style>
        @media only screen and (max-width: 768px) {
            .row {
                flex-direction: column;
            }

            .col {
                width: 100%;
                margin-top:10px;
            }

            .col-2 {
                width: 100%;
            }

            .col-10 {
                width: 100%;
            }

            .table {
                width: 100%;
                overflow-x: auto;
            }

            .table th,
            .table td {
                font-size: 0.8rem;
            }
        }
    </style>

    <div class="row my-4 mx-3">
        <div class="col mx-2 card">
            <div class="card-header text-center bg-primary text-light" style="font-weight:bold;">RESERVATIONS</div>
            <div class="card-body">
                <div class="row">
                    <div class="col-9">
                        <h5 class="card-title text-center text-primary" style="font-size:40px; font-weight:bold;">{{ $reservationsCount }}</h5>
                    </div>
                    <div class="col-3">
                        <a href="/reservation">
                            <span class="material-symbols-outlined text-primary" style="font-size:60px; font-weight:bold;">table_rows</span>
                        </a>
                    </div>
                </div>
            </div>
        </div>

        <div class="col mx-2 card">
            <div class="card-header text-center bg-info text-light" style="font-weight:bold;">CLIENTS</div>
            <div class="card-body">
                <div class="row">
                    <div class="col-9">
                        <h5 class="card-title text-center text-info" style="font-size:40px; font-weight:bold;"> {{ $clientsCount }}</h5>
                    </div>
                    <div class="col-3">
                        <a href="/client">
                            <span class="material-symbols-outlined text-info" style="font-size:60px; font-weight:bold">supervisor_account</span>
                        </a>
                    </div>
                </div>
            </div>
        </div>

        <div class="col mx-2 card">
            <div class="card-header text-center text-light" style="background-color:#7F00FF; font-weight:bold;">VOITURES</div>
            <div class="card-body">
                <div class="row">
                    <div class="col-9">
                        <h5 class="card-title text-center" style="font-size:40px; font-weight:bold; color:#7F00FF">{{ $voituresCount }}</h5>
                    </div>
                    <div class="col-3">
                        <a href="/voiture">
                            <span class="material-symbols-outlined" style="font-size:60px; font-weight:bold; color:#7F00FF">directions_car </span>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Réservations Actuelles -->
    <div class="my-4">
        <div class="card mx-3">
            <div class="card-header text-center text-light" style="background-color:#13274F;">Réservations Actuelles</div>
            <div class="card-body">
                @if($reservations->isEmpty())
                    <p>Aucune réservation pour aujourd'hui.</p>
                @else
                    <table class="table">
                        <thead>
                            <tr>
                                <th>Client</th>
                                <th>Voiture</th>
                                <th>Date de Début</th>
                                <th>Date de Fin</th>
                                <th>Durée</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($reservations as $reservation)
                                <tr>
                                    <td>{{ $reservation->client->prenom }} {{ $reservation->client->nom }}</td>
                                    <td>{{ $reservation->voiture->marque }}</td>
                                    <td>{{ \Carbon\Carbon::parse($reservation->dateD)->format('d/m/Y') }}</td>
                                    <td>{{ \Carbon\Carbon::parse($reservation->dateF)->format('d/m/Y') }}</td>
                                    <td>
                                        {{\Carbon\Carbon::parse($reservation->dateD)
                                            ->diffInDays(\Carbon\Carbon::parse($reservation->dateF)) +1
                                            . ' jours'
                                        }}
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                @endif
            </div>
        </div>
    </div>

    <!-- voitures disponibles -->
    <div class="card mx-3">
        <div class="card-header text-center text-light" style="background-color:#13274F;">Voitures disponibles</div>
        <div class="card-body">
            <div class="row">
                @foreach ($voitures as $voiture)
                    @if($voiture->reservee == "Non")
                        <div class="mx-4 my-2 card" style="width: 13rem;">
                            <img src="/images/{{$voiture['image']}}" class="card-img-top">
                            <div class="card-body">
                                <b class="card-text">{{$voiture->marque}}</b>
                                <p>{{$voiture->carburant}}</p>
                                <p>Prix : {{$voiture->prixJ}} DH/jr</p>
                            </div>
                        </div>
                    @endif
                @endforeach
            </div>
        </div>
    </div>
@endsection