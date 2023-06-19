@extends('layouts.app')
@section('title', config('app.name'))
@section('titleHeader', trans('lang.text_create_file'))
@section('content')
<div class="row justify-content-center">
    <div class="col-lg-6">
        <form method="POST" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label for="titre_fr">Titre Français</label>
                <input type="text" name="titre_fr" id="titre_fr" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="titre">English Title</label>
                <input type="text" name="titre" id="titre" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="fichier">@lang('lang.text_choose_file')</label>
                <input type="file" name="fichier" id="fichier" class="form-control-file" required accept=".pdf,.zip,.doc">
            </div>
            <button type="submit" class="btn btn-primary">@lang('lang.text_upload')</button>
        </form>
    </div>
</div>
@endsection