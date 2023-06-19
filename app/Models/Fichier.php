<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Fichier extends Model
{
    use HasFactory;

    protected $fillable = [
        'titre',
        'titre_fr',
        'type',
        'user_id'
    ];

    public function televerseur() {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function getNomFichierAttribute(){

        return Str::slug($this->titre) . '-' . $this->created_at->format('YmdHis') . '.' . $this->type;
    }
}
