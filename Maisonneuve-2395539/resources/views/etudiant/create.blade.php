@extends('layouts.app')
@section('title', 'Etudiants List')
@section('content')
<div class="container bootstrap snippets bootdey">
<div class="panel-body inf-content">
    
    <div class="row">
        <div class="col-md-4">
            <img alt="" style="width:600px;" title="" class="img-circle img-thumbnail isTooltip" src="{{ asset('img/logo.jpg') }}" data-original-title="Usuario"> 
        </div>
        <div class="col-md-6">
            <div class="table-responsive">
            <table class="table table-user-information">
            <form action="{{ route('etudiant.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                <tbody>
                    <tr>        
                        <td class="text-primary">
                        <label for="nom" class="form-label">@lang('Nom')</label>
                        <input type="text" class="form-control" id="nom" name="nom" value="{{old('nom')}}">     
                        @if($errors->has('nom'))
                            <div class="text-danger mt-2">
                                {{ $errors->first('nom')}}
                            </div>
                        @endif
                        </td>
                    </tr>
                    <tr>    
                        <td class="text-primary">
                            <label for="adresse" class="form-label">@lang('Adresse')</label>
                            <input type="text" class="form-control" id="adresse" name="adresse" value="{{old('adresse')}}">     
                            @if($errors->has('adresse'))
                            <div class="text-danger mt-2">
                                {{ $errors->first('adresse')}}
                            </div>
                            @endif
                        </td>
                    </tr>
                    <tr>        
                        <td class="text-primary">
                            <label for="téléphone" class="form-label">@lang('Téléphone')</label>
                            <input type="text" class="form-control" id="téléphone" name="téléphone" value="{{old('téléphone')}}">     
                            @if($errors->has('téléphone'))
                            <div class="text-danger mt-2">
                                {{ $errors->first('téléphone')}}
                            </div>
                            @endif
                        </td>
                    </tr>
                    
                    <tr>        
                        <td class="text-primary">
                            <label for="date_de_naissance" class="form-label">@lang('Date de naissance')</label>
                            <input type="text" class="form-control" id="date_de_naissance" name="date_de_naissance" value="{{old('date_de_naissance')}}">     
                            @if($errors->has('date_de_naissance'))
                            <div class="text-danger mt-2">
                                {{ $errors->first('date_de_naissance')}}
                            </div>
                            @endif
                        </td>
                    </tr>                                   
                    <tr>        
                        <td class="text-primary">
                        <label for="ville_id">@lang('Ville'):</label>
                            <select class="form-control" id="ville_id" name="ville_id">
                                @foreach($villes as $ville)
                                <option value="{{ $ville->id }}">{{ $ville->nom }}</option>
                                @endforeach
                            </select>
                            @if($errors->has('ville_id'))
                            <div class="text-danger mt-2">
                                {{ $errors->first('ville_id')}}
                            </div>
                            @endif
                        </td>
                    </tr>
                    <tr>        
                        <td class="text-primary">
                            <label for="email" class="form-label">@lang('Email')</label>
                            <input type="text" class="form-control" id="email" name="email" value="{{old('email')}}">     
                            @if($errors->has('email'))
                            <div class="text-danger mt-2">
                                {{ $errors->first('email')}}
                            </div>
                            @endif
                        </td>
                    </tr>
                    <tr>        
                     
                        <td class="text-primary">
                            <label for="password" class="form-label">@lang('Mot de passe')</label>
                            <input type="password" class="form-control" id="password" name="password">     
                            @if($errors->has('password'))
                            <div class="text-danger mt-2">
                                {{ $errors->first('password')}}
                            </div>
                            @endif
                        </td>
                    </tr>
                    <tr>        
                        <td class="text-primary">
                            <label for="password_confirmation" class="form-label">@lang('Confirmation du mot de passe')</label>
                            <input type="password" class="form-control" id="password_confirmation" name="password_confirmation">     
                            @if($errors->has('password_confirmation'))
                            <div class="text-danger mt-2">
                                {{ $errors->first('password_confirmation')}}
                            </div>
                            @endif
                        </td>
                    </tr>
                    <tr>
                        <td class="text-primary">
                        <label for="avatar">Avatar (jpg):</label>
                        <input class="form-control" type="file" id="avatar" name="avatar">
                        @if($errors->has('avatar'))
                            <div class="text-danger mt-2">
                                {{ $errors->first('avatar')}}
                            </div>
                            @endif
                        </td>
                    </tr>
                </tbody>
            
            </table>
            <div class="card-footer">
                <div class="d-flex justify-content-between ">
                    <button type="submit" class="btn btn-primary">@lang('Enregistrer')</button>
                </div>
            </div>
            </form>
            </div>
        </div>
    </div>
</div>
</div>
@endsection