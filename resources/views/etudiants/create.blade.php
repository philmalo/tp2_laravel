@extends('layouts.app')
@section('title', config('app.name'))
@section('titleHeader', trans('lang.text_add_student'))
@section('content')
<div class="row mt-4 justify-content-center">
    <div class="col-6">
        <div class="card">
            <form method="POST">
                @csrf
                <div class="card-header">
                    @lang('lang.text_form')
                </div>
                <div class="card-body">
                    <label for="nom">@lang('lang.text_full_name')</label>
                    <input type="text" id="nom" name="nom" class="form-control">

                    <label for="adresse">@lang('lang.text_address')</label>
                    <input id="adresse" name="adresse" class="form-control">
                    <label for="ville">@lang('lang.text_city')</label>
                    <select name="ville_id" id="ville" class="form-control">
                        @foreach($villes as $ville)
                            <option value="{{$ville->id}}">{{$ville->nom}}</option>
                        @endforeach
                    </select>
                    <label for="telephone">@lang('lang.text_phone')</label>
                    <input type="text" name="telephone" id="telephone">
                    <label for="courriel">@lang('lang.text_email')</label>
                    <input type="text" name="courriel" id="courriel">
                    <label for="date_de_naissance">@lang('lang.text_birthdate')</label>
                    <input type="date" name="date_de_naissance" id="date_de_naissance">
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