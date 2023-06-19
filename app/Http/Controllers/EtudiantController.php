<?php

namespace App\Http\Controllers;

use App\Models\Etudiant;
use App\Models\Ville;
use App\Models\User;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Illuminate\Support\Facades\App;

class EtudiantController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $etudiants = Etudiant::select()->orderBy('nom')->paginate(10);
        return view('etudiants.index', ['etudiants' => $etudiants]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('etudiants.create', ['villes' => Ville::selectVille()]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $validation = $request->validate([
            'nom' => 'required',
            'adresse' => 'required',
            'telephone' => 'required',
            'courriel' => 'required',
            'date_de_naissance' => 'required',
            'ville_id' => 'required'
        ]);

        $newEtudiant = Etudiant::create([
            'nom' => $request->nom,
            'adresse' => $request->adresse,
            'telephone' => $request->telephone,
            'courriel' => $request->courriel,
            'date_de_naissance' => $request->date_de_naissance,
            'ville_id' => $request->ville_id
        ]);

        return redirect(route('etudiants.show', $newEtudiant->id));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Etudiant  $etudiant
     * @return \Illuminate\Http\Response
     */
    public function show(Etudiant $etudiant)
    {

        $locale = session()->get('locale');

        Carbon::setLocale($locale);

        if($locale == 'en'){

            $formatDate = 'F d Y';
        }

        elseif($locale == 'fr'){

            $formatDate = 'd F Y';
        }

        $etudiant->date_de_naissance = Carbon::parse($etudiant->date_de_naissance)->translatedFormat($formatDate);
        
        return view('etudiants.show', ['etudiant' => $etudiant]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Etudiant  $etudiant
     * @return \Illuminate\Http\Response
     */
    public function edit(Etudiant $etudiant)
    {
        return view('etudiants.edit', ['etudiant' => $etudiant, 'villes' => Ville::selectVille()]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Etudiant  $etudiant
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Etudiant $etudiant)
    {
        $validation = $request->validate([
            'nom' => 'required',
            'adresse' => 'required',
            'telephone' => 'required',
            'courriel' => 'required',
            'date_de_naissance' => 'required',
            'ville_id' => 'required'
        ]);

        $etudiant->update([
            'nom' => $request->nom,
            'adresse' => $request->adresse,
            'telephone' => $request->telephone,
            'courriel' => $request->courriel,
            'date_de_naissance' => $request->date_de_naissance,
            'ville_id' => $request->ville_id
        ]);

        $user = User::find(auth()->user()->id);
        $user->name = $request->nom;
        $user->save();

        // Mise à jour du nom dans l'objet de l'utilisateur connecté
        auth()->user()->name = 'Nouveau Nom';

// Mise à jour du nom dans la session
session(['name' => 'Nouveau Nom']);

        return redirect(route('etudiants.show', $etudiant->id));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Etudiant  $etudiant
     * @return \Illuminate\Http\Response
     */
    public function destroy(Etudiant $etudiant)
    {
        $etudiant->delete();
        return redirect(route('etudiants.index'));
    }
}
