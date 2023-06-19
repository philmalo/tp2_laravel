<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    use HasFactory;

    protected $fillable = [
        'titre',
        'titre_fr',
        'contenu',
        'contenu_fr',
        'user_id'
    ];

    public function auteur() {
        return $this->belongsTo(User::class, 'user_id');
    }
}
