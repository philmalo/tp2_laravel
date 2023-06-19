@extends('layouts.app')
@section('title', config('app.name'))
@section('titleHeader', trans('lang.text_edit_form') . $etudiant->id)
@section('content')
<div class="row mt-4 justify-content-center">
    <div class="col-6">
        <div class="card">
            <form method="POST">
                @csrf
                @method('put')
                <div class="card-header">
                    @lang('lang.text_form')
                </div>
                <div class="card-body">
                    <label for="nom">@lang('lang.label_name')</label>
                    <input type="text" id="nom" name="nom" class="form-control" value="{{ $etudiant->nom }}">
                    <label for="adresse">@lang('lang.label_address')</label>
                    <input type="text" id="adresse" name="adresse" class="form-control" value="{{ $etudiant->adresse }}">
                    <label for="telephone">@lang('lang.label_phone')</label>
                    <input type="text" id="telephone" name="telephone" class="form-control" value="{{ $etudiant->telephone }}">
                    <label for="courriel">@lang('lang.label_email')</label>
                    <input type="text" id="courriel" name="courriel" class="form-control" value="{{ $etudiant->courriel }}">
                    <label for="date_de_naissance">@lang('lang.label_birthdate')</label>
                    <input type="date" id="date_de_naissance" name="date_de_naissance" class="form-control" value="{{ $etudiant->date_de_naissance }}">
                    <label for="ville">@lang('lang.label_city')</label>
                    <select name="ville_id" id="ville" class="form-control">
                        @foreach($villes as $ville)
                            <option value="{{$ville->id}}">{{$ville->nom}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="card-footer text-center">
                    <a href="{{ route('etudiants.index') }}" class="btn btn-secondary">@lang('lang.text_go_back')</a>
                    <input type="submit" class="btn btn-success" value="@lang('lang.text_save')">
                </div>
            </form>
        </div>
    </div>
</div>
@endsection