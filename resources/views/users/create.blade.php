@extends('layouts.app')
@section('title', config('app.name'))
@section('titleHeader', trans('lang.text_add_student'))
@section('content')
<form method="POST">
    @csrf

    <div class="form-group">
        <label for="nom">Prénom Nom</label>
        <input type="text" name="nom" id="nom" class="form-control" value="{{ old('nom') }}" required>
    </div>

    <div class="form-group">
        <label for="adresse">Adresse</label>
        <input type="text" name="adresse" id="adresse" class="form-control" value="{{ old('adresse') }}" required>
    </div>

    <div class="form-group">
        <label for="telephone">Téléphone</label>
        <input type="tel" name="telephone" id="telephone" class="form-control" value="{{ old('telephone') }}" required>
    </div>

    <div class="form-group">
        <label for="email">Courriel</label>
        <input type="email" name="email" id="email" class="form-control" value="{{ old('email') }}" required>
        @error('courriel')
            <span class="text-danger">{{ $message }}</span>
        @enderror
    </div>

    <div class="form-group">
        <label for="date_de_naissance">Date de naissance</label>
        <input type="date" name="date_de_naissance" id="date_de_naissance" class="form-control" value="{{ old('date_de_naissance') }}" required>
    </div>

    <div class="form-group">
        <label for="ville_id">Ville</label>
        <select name="ville_id" id="ville_id" class="form-control" required>
            <option value="">Sélectionnez une ville</option>
            @foreach($villes as $ville)
                <option value="{{$ville->id}}" {{ $ville->id == old('ville_id') ? 'selected' : '' }}>{{$ville->nom}}</option>
            @endforeach
        </select>
    </div>

    <div class="form-group">
        <label for="password">Mot de passe</label>
        <input type="password" name="password" id="password" class="form-control" required>
    </div>

    <div class="form-group">
        <label for="password_confirmation">Confirmation du mot de passe</label>
        <input type="password" name="password_confirmation" id="password_confirmation" class="form-control" required>
    </div>

    <button type="submit" class="btn btn-primary">S'inscrire</button>
</form>

@endsection