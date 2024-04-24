<?php

namespace App\Models;

use App\Models\Client;
use App\Models\Voiture;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Reservation extends Model
{
    use HasFactory;
    protected $fillable = [
        'id_client',
        'id_voiture',
        'dateD',
        'dateF'
    ];

    public function client()
    {
        return $this->belongsTo(Client::class, 'id_client');
    }

    public function voiture()
    {
        return $this->belongsTo(Voiture::class, 'id_voiture');
    }
}