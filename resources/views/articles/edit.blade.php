@extends('layouts.app')
@section('title', config('app.name'))
@section('titleHeader', trans('lang.text_edit_article_form'))
@section('content')
<div class="row justify-content-center">
        <div class="col-md-6">
            <form method="POST">
                @csrf
                @method('put')
                <div class="form-group mt-2">
                    <label for="titre_fr">Titre Français</label>
                    <input type="text" name="titre_fr" id="titre_fr" value="{{ $article->titre_fr }}" class="form-control">
                </div>
                <div class="form-group mt-2">
                    <label for="contenu_fr">Contenu Français</label>
                    <textarea name="contenu_fr" id="contenu_fr" class="form-control">{{ $article->contenu_fr }}</textarea>
                </div>
                <div class="form-group mt-2">
                    <label for="titre">English Title</label>
                    <input type="text" name="titre" id="titre" value="{{ $article->titre }}" class="form-control">
                </div>
                <div class="form-group mt-2">
                    <label for="contenu">English Content</label>
                    <textarea name="contenu" id="contenu" class="form-control">{{ $article->contenu }}</textarea>
                </div>
                <input type="submit" value="@lang('lang.text_save')" class="btn btn-primary mt-3">
            </form>
        </div>
    </div>
@endsection