<?php

namespace App\Http\Controllers;

use App\Models\Fichier;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;

class FichierController extends Controller
{
    public function __construct() {

        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $fichiers = Fichier::paginate(5);

        return view('fichiers.index', ['fichiers' => $fichiers]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('fichiers.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'fichier' => 'required|mimes:pdf,zip,doc',
            'titre' => 'required',
            'titre_fr' => 'required',
        ]);

        if ($request->file('fichier')->isValid()) {
            $fichier = $request->file('fichier');
            $extension = $fichier->getClientOriginalExtension();


            $fichier = Fichier::create([
                'titre' => $request->titre,
                'titre_fr' => $request->titre_fr,
                'type' => $extension,
                'user_id' => auth()->id(),
            ]);


            $nomFichier = Str::slug($request->titre) . '-' . $fichier->created_at->format('YmdHis') . '.' . $extension;

            $request->file('fichier')->storeAs('documents', $nomFichier);

            // Redirection vers une vue ou une autre action
            return redirect()->route('fichiers.index');
        }

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Fichier  $fichier
     * @return \Illuminate\Http\Response
     */
    public function show(Fichier $fichier)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Fichier  $fichier
     * @return \Illuminate\Http\Response
     */
    public function edit(Fichier $fichier)
    {

        return view('fichiers.edit', ['fichier' => $fichier ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Fichier  $fichier
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Fichier $fichier)
    {
        $request->validate([
            'titre' => 'required',
            'titre_fr' => 'required',
        ]);

        $fichier->titre = $request->titre;
        $fichier->titre_fr = $request->titre_fr;
        $fichier->save();

        return redirect()->route('fichiers.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Fichier  $fichier
     * @return \Illuminate\Http\Response
     */
    public function destroy(Fichier $fichier)
    {
 
        Storage::delete('documents/' . $fichier->nom_fichier);

        $fichier->delete();

        return redirect()->route('fichiers.index');
    }


    public function telecharger($nomFichier)
    {
        $chemin = Storage::path('documents/' . $nomFichier);
    
    return response()->download($chemin);
    }
}
