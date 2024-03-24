@extends('layouts.app')
@section('title', 'Forum')
@section('content')
<h1 class="my-5"> Forum</h1>
<a href="{{route('forum.create')}}" class="btn btn-sm btn-primary">@lang('lang.rédiger_un_article') </a>

    @foreach($articles as $article)
    <div class="inner-main-body p-2 p-sm-3 collapse forum-content show">
        <div class="card mb-2">
            <div class="card-body p-2 p-sm-3">
                <div class="media forum-item">
                    <a href="{{route('etudiant.show', $article->etudiant->id)}}" data-toggle="collapse" data-target=".forum-content"><img src="{{ asset('avatar/' . $article->etudiant->avatar) }}" class="mr-3 rounded-circle" width="50" alt="User" /></a>
                        <div class="media-body">
                            <h6>{{ $article->titre ? $article->titre[app()->getLocale()] ?? $article->titre['fr'] : '' }}</h6>
                            <p class="text-secondary">
                            {{ $article->texte ? $article->texte[app()->getLocale()] ?? $article->texte['fr'] : '' }}
                            </p>
                            <p class="text-secondary">
                            <strong>{{ $article->created_at }}</strong>
                            </p>
                            <div class="d-flex justify-content-between ">
                            @if(auth()->check() && $article->user_id == auth()->user()->id)
                                <a href="{{route('forum.edit', $article['id'])}}" class="btn btn-sm btn-outline-success">@lang('Modifier') </a>
                                <form action="/forum/{{ $article->id }}" method="post">
                                   @csrf
                                   @method('delete')
                                   <button type="submit" class="btn btn-sm btn-outline-danger">@lang('Supprimer')</button>
                               </form>
                               @endif 
                             </div> 
                        </div>    
                    </div>
                </div>
            </div>
        </div>
    @endforeach
@endsection