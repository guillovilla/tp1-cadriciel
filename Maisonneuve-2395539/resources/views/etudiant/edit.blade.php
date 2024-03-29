@extends('layouts.app')
@section('title', 'Etudiants List')
@section('content')
<div class="container bootstrap snippets bootdey">
<div class="panel-body inf-content">
    
    <div class="row">
        <div class="col-md-4">
        <img src="{{ asset('avatar/' . $etudiant->avatar) }}" alt="Cover" class="img-fluid img-thumbnail rounded-circle border-0 mb-3">
        </div>
        <div class="col-md-6">
            <strong>Information</strong><br>
            <div class="table-responsive">
            <table class="table table-user-information">
            <form action="{{ route('etudiant.update', $etudiant->id) }}" method="POST">
                        @csrf
                        @method('put')
                <tbody>
                    <tr>        
                        <td class="text-primary">
                        <label for="nom" class="form-label">Nom</label>
                        <input type="text" class="form-control" id="nom" name="nom" value="{{old('nom', $etudiant->nom)}}">     
                        @if($errors->has('nom'))
                            <div class="text-danger mt-2">
                                {{ $errors->first('nom')}}
                            </div>
                        @endif
                        </td>
                    </tr>
                    <tr>    
                        <td class="text-primary">
                            <label for="adresse" class="form-label">Adresse</label>
                            <input type="text" class="form-control" id="adresse" name="adresse" value="{{old('adresse', $etudiant->adresse)}}">     
                            @if($errors->has('adresse'))
                            <div class="text-danger mt-2">
                                {{ $errors->first('adresse')}}
                            </div>
                            @endif
                        </td>
                    </tr>
                    <tr>        
                        <td class="text-primary">
                            <label for="téléphone" class="form-label">Téléphone</label>
                            <input type="text" class="form-control" id="téléphone" name="téléphone" value="{{old('téléphone', $etudiant->téléphone)}}">     
                            @if($errors->has('téléphone'))
                            <div class="text-danger mt-2">
                                {{ $errors->first('téléphone')}}
                            </div>
                            @endif
                        </td>
                    </tr>
                    <tr>        
                        <td class="text-primary">
                            <label for="email" class="form-label">Email</label>
                            <input type="text" class="form-control" id="email" name="email" value="{{old('email', $etudiant->email)}}">     
                            @if($errors->has('email'))
                            <div class="text-danger mt-2">
                                {{ $errors->first('email')}}
                            </div>
                            @endif
                        </td>
                    </tr>
                    <tr>        
                        <td class="text-primary">
                            <label for="date_de_naissance" class="form-label">Date de naissance</label>
                            <input type="text" class="form-control" id="date_de_naissance" name="date_de_naissance" value="{{old('date_de_naissance', $etudiant->date_de_naissance)}}">     
                            @if($errors->has('date_de_naissance'))
                            <div class="text-danger mt-2">
                                {{ $errors->first('date_de_naissance')}}
                            </div>
                            @endif
                        </td>
                    </tr>                                   
                    <tr>        
                        <td class="text-primary">
                        <label for="ville_id">Ville:</label>
                            <select class="form-control" id="ville_id" name="ville_id">
                            @foreach($villes as $ville)
                                <option value="{{ $ville->id }}" @if($etudiant->ville->nom == $ville->nom) selected @endif>
                                    {{ $ville->nom }}
                                </option>
                            @endforeach
                            </select>
                            @if($errors->has('ville_id'))
                            <div class="text-danger mt-2">
                                {{ $errors->first('ville_id')}}
                            </div>
                            @endif
                        </td>
                    </tr>                                   
                </tbody>
            
            </table>
            <div class="card-footer">
                <div class="d-flex justify-content-between ">
                    <button type="submit" class="btn btn-primary">Update</button>
                </div>
            </div>
            </form>
            </div>
        </div>
    </div>
</div>
</div>
@endsection