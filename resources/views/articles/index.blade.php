@extends('layouts.app')
@section('title', config('app.name'))
@section('titleHeader', trans('lang.text_article_forum'))
@section('content')
<a href="{{ route('articles.create') }}" class="btn btn-primary">@lang('lang.text_add_article')</a>

@foreach($articles as $article)
    <div class="card mt-4">
        <div class="card-body">
            <h3 class="card-title">{{ session('locale') == 'fr' ? $article->titre_fr : $article->titre }}</h3>
            <p class="card-text">{{ session('locale') == 'fr' ? $article->contenu_fr : $article->contenu }}</p>
            <p class="card-text"><small>@lang('lang.text_author') {{ $article->auteur->name }}</small></p>
            <p class="card-text"><small>@lang('lang.text_updated') {{ $article->updated_at }}</small></p>
            @if(Auth::check() && $article->user_id === Auth::user()->id)
                <a href="{{ route('articles.edit', $article->id) }}" class="btn btn-primary">@lang('lang.text_edit')</a>
                <form action="{{ route('articles.delete', $article->id) }}" method="POST" class="d-inline">
                    @csrf
                    @method('delete')
                    <button type="submit" class="btn btn-danger">@lang('lang.text_delete')</button>
                </form>
            @endif
        </div>
    </div>
@endforeach

{{ $articles }}
@endsection