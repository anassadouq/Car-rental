<?php

namespace App\Http\Controllers;
use App\Models\Voiture;
use Illuminate\Http\Request;

class VoitureController extends Controller
{
    public function index()
    {
        $voitures = Voiture::all();
        return view('voiture.index', compact('voitures'));
    }

    public function create()
    {
        return view('voiture.create');
    }

    public function store(Request $request)
    {
        $voiture = new Voiture();
        $voiture->matricule = $request->matricule;
        $voiture->marque = $request->marque;
        $voiture->modele = $request->modele;
        $voiture->puissance = $request->puissance;
        $voiture->prixJ = $request->prixJ;
        $voiture->carburant = $request->carburant;
        $voiture->reservee = $request->reservee;

        if ($request->hasFile('image')) {
            $voiture->image = $request->image->getClientOriginalName();
            $request->image->move(public_path('images'), $voiture->image);
        }
        
        $voiture->save();
    
        // Redirect to the same page with the voiture ID
        return redirect()->route('voiture.index');
    }

    public function show(Voiture $voiture)
    {
        return view('voiture.show', compact('voiture'));
    }

    public function edit(Voiture $voiture)
    {
        return view('voiture.edit', compact('voiture'));
    }

    public function update(Request $request, Voiture $voiture)
    {
        $voiture->update($request->validate([
            'matricule' => 'required',
            'marque' => 'required',
            'modele' => 'required',
            'puissance' => 'required',
            'prixJ' => 'required',
            'carburant' => 'required',
            'reservee' => 'required',

        ]));
    
        // mise à jour de l'image si une nouvelle a été téléchargée
        if ($request->hasFile('image')) {
            $imagePath = public_path('images/'.$voiture->image); // supprimez l'ancienne image
            if (file_exists($imagePath)) {
                unlink($imagePath);
            }
            $voiture->image = $request->image->getClientOriginalName();
            $request->image->move(public_path('images'), $voiture->image);
        }
        
        $voiture->save();
        
        // Redirect to the same page with the voiture ID
        return redirect()->route('voiture.index');
    } 

    public function destroy(Voiture $voiture)
    {
        $voiture->delete();
        return to_route('voiture.index');
    }
}