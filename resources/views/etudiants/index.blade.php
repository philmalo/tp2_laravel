@extends('layouts.app')
@section('title', config('app.name'))
@section('titleHeader', trans('lang.text_students'))
@section('content')

@php $admin = false @endphp
@if($admin)
<nav>
    <a href="{{ route('etudiants.create') }}" class="btn btn-outline-info">@lang('lang.text_add_student')</a>
</nav>
@endif
<table class="table table-striped">
    <thead>
        <tr>
            <th>@lang('lang.text_name')</th>
            <th>@lang('lang.text_detail')</th>
            @if($etudiants->where('user_id', Auth::user()->id)->count() > 0)

                <th>@lang('lang.text_edit')</th>
            @endif
            @if($admin)
            <th>@lang('lang.text_delete')</th>
            @endif
        </tr>
    </thead>
    <tbody>
        @foreach($etudiants as $etudiant)
        <tr>
            <td>{{$etudiant->nom}}</td>
            <td><a href="{{ route('etudiants.show', $etudiant->id) }}" class="btn btn-info">@lang('lang.text_detail')</a></td>
            @if(Auth::check() && $etudiant->user_id === Auth::user()->id)
                <td><a href="{{ route('etudiants.edit', $etudiant->id) }}" class="btn btn-success">@lang('lang.text_edit')</a></td>
            @else
            <td></td>
            @endif
            @if($admin)
                <td><a href="#" class="btn btn-danger delete-btn"data-etudiant-nom="{{ $etudiant->nom }}" data-etudiant-url="{{ route('etudiants.delete', $etudiant->id) }}">@lang('lang.text_delete')</a></td>
            @endif
            @include('modals.modal')
        </tr>
        @endforeach
    </tbody>
</table>
{{ $etudiants }}
@endsection

@section('scriptDelete')
<script src="{{ asset('js/delete.js') }}" defer></script>
@endsection