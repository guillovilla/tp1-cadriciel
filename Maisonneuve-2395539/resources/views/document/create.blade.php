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
    <h1 class="mt-5 mb-4">Répertoire</h1>
    <div class="row justify-content-center mt-5 mb-5">
        <div class="col-md-4">
            <div class="card">
                <div class="card-header">
                    <h5 class="card-title">Nom</h5>
                </div>
                <div class="card-body">
                    <form  method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="mb-3">
                            <label for="nom_fr" class="form-label">Nom en français</label>
                            <input type="text" class="form-control" id="nom_fr" name="nom_fr" value="">
                        </div>

                        <div class="mb-3">
                            <label for="nom_en" class="form-label">Name in English</label>
                            <input type="text" class="form-control" id="nom_en" name="nom_en" value="">
                        </div>
            
                        <div class="mb-3">
                        <label for="doc">Document:</label>
                        <input class="form-control" type="file" id="doc" name="doc">
                        @if($errors->has('doc'))
                            <div class="text-danger mt-2">
                                {{ $errors->first('doc')}}
                            </div>
                            @endif
                            </div>
                        <button type="submit" class="btn btn-primary">@lang('Enregistrer')</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection