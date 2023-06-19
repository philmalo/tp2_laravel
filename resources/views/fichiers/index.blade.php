@extends('layouts.app')
@section('title', config('app.name'))
@section('titleHeader', trans('lang.text_file_repository'))
@section('content')
<div class="fichiers">
    <a href="{{ route('fichiers.create') }}">@lang('lang.text_add_file')</a>
    <table class="table table-striped">
        <thead>
            <tr>
                <th>@lang('lang.text_title')</th>
                <th>@lang('lang.text_file_added_by')</th>
                <th>@lang('lang.text_download')</th>
                @if(Auth::check())
                    @if($fichiers->where('user_id', Auth::user()->id)->count() > 0)
                        <th>@lang('lang.text_edit')</th>
                        <th>@lang('lang.text_delete')</th>
                    @endif
                @endif
            </tr>
        </thead>
        <tbody>
            @foreach($fichiers as $fichier)
                <tr>
                    <td>
                        <p>{{ session('locale') == 'fr' ? $fichier->titre_fr : $fichier->titre }}</p>
                    </td>
                    <td>
                        <p>{{ $fichier->televerseur->name }}</p>
                    </td>
                    <td>
                        <a href="{{ route('fichiers.telecharger', $fichier->nom_fichier) }}">@lang('lang.text_download')</a>
                    </td>
                    @if(Auth::check() && $fichier->user_id === Auth::user()->id)
                        <td>
                            <a href="{{route('fichiers.edit', $fichier->id) }}">@lang('lang.text_edit')</a>
                        </td>
                        <td>
                            <form action="{{ route('fichiers.delete', $fichier->id) }}" method="POST">
                                @csrf
                                @method('delete')
                                <button type="submit" class="btn btn-danger">@lang('lang.text_delete')</button>
                            </form>
                        </td>
                    @else
                        <td></td>
                        <td></td>
                    @endif
                </tr>
            @endforeach
        </tbody>
    </table>
    {{$fichiers}}
</div>
@endsection