@extends('layouts.app')
@section('title', config('app.name'))
@section('titleHeader', trans('lang.text_edit_file'))
@section('content')
<div class="row justify-content-center">
    <div class="col-lg-6">
        <form method="POST">
            @csrf
            @method('put')
            <div class="mb-3">
                <label for="titre_fr" class="form-label">Titre Français</label>
                <input type="text" name="titre_fr" id="titre_fr" class="form-control" value="{{ $fichier->titre_fr }}">
            </div>
            <div class="mb-3">
                <label for="titre" class="form-label">English Title</label>
                <input type="text" name="titre" id="titre" class="form-control" value="{{ $fichier->titre }}">
            </div>
            <button type="submit" class="btn btn-primary">@lang('lang.text_save')</button>
        </form>
    </div>
</div>
@endsection