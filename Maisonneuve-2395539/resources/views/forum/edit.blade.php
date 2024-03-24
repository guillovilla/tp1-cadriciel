@extends('layouts.app')
@section('title', 'Forum')
@section('content')
    @if(!$errors->isEmpty())
    <div class="alert alert-danger alert-dismissible fade show" role="alert">
        <ul>
            @foreach($errors->all() as $error)
            <li>{{ $error }}</li>
            @endforeach
        </ul>     
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>                
    @endif
    <h1 class="mt-5 mb-4">Forum</h1>
    <div class="row justify-content-center mt-5 mb-5">
        <div class="col-md-4">
            <div class="card">
                <div class="card-header">
                    <h5 class="card-title">Titre</h5>
                </div>
                <div class="card-body">
                    <form action="{{ route('forum.update', $forum->id) }}" method="POST">
                        @csrf
                        @method('put')
                        <div class="mb-3">
                            <label for="titre_fr" class="form-label">Titre en français</label>
                            <input type="text" class="form-control" id="titre_fr" name="titre_fr" value="{{ $forum->titre['fr'] }}">
                        </div>
                        <div class="mb-3">
                            <label for="texte_fr" class="form-label">Texte en français </label>
                            <textarea class="form-control" id="texte_fr" name="texte_fr" value="">{{ $forum->texte['fr'] }}</textarea>
                        </div>

                        <div class="mb-3">
                            <label for="titre_en" class="form-label">Title in English</label>
                            <input type="text" class="form-control" id="titre_en" name="titre_en" value="{{ $forum->titre['en'] ?? '' }}">
                        </div>
                        <div class="mb-3">
                            <label for="texte_en" class="form-label">Texte in English</label>
                            <textarea class="form-control" id="texte_en" name="texte_en">{{ $forum->texte['en'] ?? '' }}</textarea>
                        </div>
                        
                        <button type="submit" class="btn btn-primary">@lang('Enregistrer')</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection