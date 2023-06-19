<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ville extends Model
{
    use HasFactory;

    static public function selectVille(){

        $requete = Ville::select()->orderBy('nom')->get();

        return $requete;
    }
}
