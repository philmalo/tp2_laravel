<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Etudiant extends Model
{
    use HasFactory;

    protected $fillable = [
        'nom',
        'adresse',
        'telephone',
        'courriel',
        'date_de_naissance',
        'ville_id',
        'user_id'
    ];

    public function etudiantHasVille(){
        return $this->HasOne('\App\Models\Ville', 'id', 'ville_id');
    }
}
