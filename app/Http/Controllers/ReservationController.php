<?php

namespace App\Http\Controllers;

use PDF;
use App\Models\Reservation;
use App\Models\Client;
use App\Models\Voiture;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Carbon\Carbon;

class ReservationController extends Controller
{
    public function index()
    {
        $today = Carbon::today();

        $reservations = Reservation::with('client', 'voiture')->latest()->get();
        $clients = Client::all();
        $voitures = Voiture::all();
        
        return view('reservation.index', [
            'reservations' => $reservations,
            'clients' => $clients,
            'voitures' => $voitures,
        ]);
    }

    public function create()
    {
        $clients = Client::latest()->get(); // Correction ici, get() pour exécuter la requête
        $voitures = Voiture::all();
        return view('reservation.create', [
            'clients' => $clients,
            'voitures' => $voitures,
        ]);
    }  

    public function store(Request $request)
    {
        $reservation = new Reservation();
        $reservation->id_client = $request->input('id_client');
        $reservation->id_voiture = $request->input('id_voiture');
        $reservation->dateD = $request->input('dateD');
        $reservation->dateF = $request->input('dateF');
        $reservation->save();
    
        return redirect()->route('reservation.index');    
    }        
    
    public function edit(Reservation $reservation)
    {
        return view('reservation.edit', compact('reservation'));
    }
     
    public function update(Request $request, Reservation $reservation)
    {
        $validatedData = $request->validate([
            'id_client' => 'required|integer',
            'id_voiture' => 'required|integer',
            'dateD' => 'required|date',
            'dateF' => 'required|date',
        ]);
    
        $reservation->update($request->all());    
        return redirect()->route('reservation.index')->with('success', 'Reservation updated successfully.');
    }
    
    public function destroy($id)
    {
        $reservation = Reservation::findOrFail($id);
        $reservationId = $reservation->id_voiture;
        $reservation->delete();
    
        return redirect()->route('reservation.index')->with('success', 'Le détail de facture a été supprimé avec succès.');
    }

    public function reservation($reservationId)
    {
        $reservation = Reservation::findOrFail($reservationId);
        $client = $reservation->client;
        $voiture = $reservation->voiture;
    
        $pdf = PDF::loadView('reservation.reservation', compact('reservation', 'client', 'voiture'));
    
        return $pdf->download('reservation-' . $reservation->id . '.pdf');
    }       
}