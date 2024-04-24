<?php

namespace App\Http\Controllers;

use App\Models\Client;
use App\Models\Voiture;
use App\Models\Reservation;
use Illuminate\Http\Request;
use Carbon\Carbon;

class HomeController extends Controller
{
    public function index()
    {
        $today = Carbon::today();
        
        $reservations = Reservation::with('client', 'voiture')->whereDate('dateD', '<=', $today)->whereDate('dateF', '>=', $today)->get();
        $clientsCount = Client::count();
        $voitures = Voiture::all();
        $voituresCount = Voiture::count();

        return view('home.index', [
            'reservations' => $reservations,
            'clientsCount' => $clientsCount,
            'voitures' => $voitures,
            'voituresCount' => $voituresCount,
        ]);
    }
}