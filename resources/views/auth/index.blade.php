@extends('layouts.app')
@section('title', trans('lang.text_login'))
@section('titleHeader', trans('lang.text_login'))
@section('content')
@include('modals.connexion')
@endsection
@section('scriptLogin')
<script src="{{ asset('js/login.js') }}" defer></script>
@endsection