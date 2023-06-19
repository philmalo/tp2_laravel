@extends('layouts.app')
@section('title', config('app.name'))
@section('titleHeader', trans('lang.text_detail'))
@section('content')
@php $admin = false @endphp
<nav>
    <a href="{{ route('etudiants.index') }}" class="mb-3 btn btn-primary btn-sm">@lang('lang.text_go_back')</a>
</nav>

<div class="card">
    <div class="card-header">
        <h2 class="card-title">{{ $etudiant->nom }}</h2>
    </div>
    <div class="card-body">
        <p class="card-text"><strong>@lang('lang.text_address')</strong> {{ $etudiant->adresse }}</p>
        <p class="card-text"><strong>@lang('lang.text_phone')</strong> {{ $etudiant->telephone }}</p>
        <p class="card-text"><strong>@lang('lang.text_email')</strong> {{ $etudiant->courriel }}</p>
        <p class="card-text"><strong>@lang('lang.text_birthdate')</strong> {{ $etudiant->date_de_naissance }}</p>
        <p class="card-text"><strong>@lang('lang.text_city')</strong> {{ $etudiant->etudiantHasVille->nom }}</p>
    </div>
    <div class="card-footer">
        @if(Auth::check() && $etudiant->user_id === Auth::user()->id)
            <a href="{{ route('etudiants.edit', $etudiant->id) }}" class="btn btn-primary">@lang('lang.text_edit')</a>
        @endif
        @if($admin)
            <a href="#" class="btn btn-danger delete-btn" data-etudiant-nom="{{ $etudiant->nom }}" data-etudiant-url="{{ route('etudiants.delete', $etudiant->id) }}">@lang('lang.text_delete')</a>
        @endif
    </div>
</div>
    
@include('modals.modal')
@endsection