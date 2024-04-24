<?php

namespace App\Models;

use App\Models\Reservation;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Client extends Model
{
    use HasFactory;
    protected $fillable = [
        'cin',
        'permis',
        'nom',
        'prenom',
        'sexe',
        'adresse',
        'tel'
    ];

    public function reservation()
    {
        return $this->hasMany(Reservation::class, 'id');
    }
}