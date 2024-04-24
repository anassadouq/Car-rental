<?php

namespace App\Models;

use App\Models\Reservation;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Voiture extends Model
{
    use HasFactory;
    protected $fillable = [
        'image',
        'matricule',
        'marque',
        'modele',
        'puissance',
        'prixJ',
        'carburant',
        'reservee'
    ];

    public function reservation()
    {
        return $this->hasMany(Reservation::class, 'id');
    }
}