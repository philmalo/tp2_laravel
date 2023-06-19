@extends('layouts.app')
@section('title', config('app.name'))
@section('titleHeader', trans('lang.text_students'))
@section('content')
<div class="row justify-content-center">
    <div class="col-lg-6">
        <form method="POST">
            @csrf
            <div class="mt-2 form-group">
                <label for="titre_fr">Titre Français</label>
                <input type="text" name="titre_fr" id="titre_fr" class="form-control">
            </div>
            <div class="mt-2 form-group">
                <label for="contenu_fr">Contenu Français</label>
                <textarea name="contenu_fr" id="contenu_fr" class="form-control"></textarea>
            </div>
            <div class="mt-2 form-group">
                <label for="titre">English Title</label>
                <input type="text" name="titre" id="titre" class="form-control">
            </div>
            <div class="mt-2 form-group">
                <label for="contenu">English Content</label>
                <textarea name="contenu" id="contenu" class="form-control"></textarea>
            </div>
            <button type="submit" class="mt-3 btn btn-primary">Ajouter</button>
        </form>
    </div>
</div>
@endsection