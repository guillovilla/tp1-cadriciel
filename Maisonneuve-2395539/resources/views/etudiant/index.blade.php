@extends('layouts.app')
@section('title', 'Etudiants List')
@section('content')
    <h1 class="my-5"> Liste d'etudiants</h1>
        <div class="container">
            <div class="main-body">
                <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 row-cols-xl-4 gutters-sm">
            @foreach($etudiants as $etudiant)
                    <div class="col mb-3">
                        <div class="card">
                            <img src="https://www.bootdey.com/image/340x120/87CEFA/000000" alt="Cover" class="card-img-top">
                            <div class="card-body text-center">
                            <img src="{{ asset('avatar/' . $etudiant->avatar) }}" style="width:100px;margin-top:-65px" alt="User" class="img-fluid img-thumbnail rounded-circle border-0 mb-3">
                            <h5 class="card-title">{{ $etudiant->nom }}</h5>
                            <p class="text-muted font-size-sm">{{ $etudiant->email }}</p>
                            </div>
                            <div class="card-footer">
                                <div class="d-flex justify-content-end">
                                    <a href="{{route('etudiant.show', $etudiant->id)}}" class="btn btn-sm btn-outline-primary">Voir plus</a>
                                </div>
                            </div>
                            
                        </div>
                    </div>
                @endforeach
                </div>
            </div>
        </div>

@endsection