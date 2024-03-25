@extends('layouts.app')
@section('title', 'Etudiants List')
@section('content')
    <div class="row">
        <div class="col-md-4">
        <img src="{{ asset('avatar/' . $etudiant->avatar) }}" alt="Cover" class="img-fluid img-thumbnail rounded-circle border-5 mb-3">
 
        </div>
        <div class="col-md-6">
            <strong>Information</strong><br>
            <div class="table-responsive">
            <table class="table table-user-information">
                <tbody>
                    <tr>        
                        <td>
                            <strong>
                                <span class="glyphicon glyphicon-asterisk text-primary"></span>
                                @lang('Nom')                                               
                            </strong>
                        </td>
                        <td class="text-primary">
                        {{ $etudiant->user?->nom }}    
                        </td>
                    </tr>
                    <tr>    
                        <td>
                            <strong>
                                <span class="glyphicon glyphicon-user  text-primary"></span>    
                                @lang('Adresse')                                                
                            </strong>
                        </td>
                        <td class="text-primary">
                            {{ $etudiant->adresse }}    
                        </td>
                    </tr>
                    <tr>        
                        <td>
                            <strong>
                                <span class="glyphicon glyphicon-cloud text-primary"></span>  
                                @lang('Téléphone')                                                
                            </strong>
                        </td>
                        <td class="text-primary">
                        {{ $etudiant->téléphone }}    
                        </td>
                    </tr>

                    <tr>        
                        <td>
                            <strong>
                                <span class="glyphicon glyphicon-bookmark text-primary"></span> 
                                @lang('Email')                                                
                            </strong>
                        </td>
                        <td class="text-primary">
                        {{ $etudiant->user->email }}
                        </td>
                    </tr>


                    <tr>        
                        <td>
                            <strong>
                                <span class="glyphicon glyphicon-eye-open text-primary"></span> 
                                @lang('Date de naissance')                                                
                            </strong>
                        </td>
                        <td class="text-primary">
                        {{ $etudiant->date_de_naissance }} 
                        </td>
                    </tr>
                    <tr>        
                        <td>
                            <strong>
                                <span class="glyphicon glyphicon-envelope text-primary"></span> 
                                @lang('Ville')                                                
                            </strong>
                        </td>
                        <td class="text-primary">
                        {{ $etudiant->ville->nom }}
                        </td>
                    </tr>
                    <tr>        
                        <td>
                            <strong>
                                <span class="glyphicon glyphicon-calendar text-primary"></span>
                                @lang('Créé le')                                                
                            </strong>
                        </td>
                        <td class="text-primary">
                        {{ $etudiant->created_at }}
                        </td>
                    </tr>
                    <tr>        
                        <td>
                            <strong>
                                <span class="glyphicon glyphicon-calendar text-primary"></span>
                                @lang('Mis à jour le')                                                
                            </strong>
                        </td>
                        <td class="text-primary">
                        {{ $etudiant->updated_at }}
                        </td>
                    </tr>                                    
                </tbody>
            </table>
            <div class="card-footer">
                <div class="d-flex justify-content-between ">
                <a href="{{route('etudiant.edit', $etudiant->id)}}" class="btn btn-sm btn-outline-success">@lang('Modifier') </a>
                
                <form  method="post">
                    @csrf
                    @method('delete')
                    <button type="submit" class="btn btn-sm btn-outline-danger">@lang('Supprimer')</button>
                </form>
            </div>
            </div>
        </div>
    </div>
</div>
</div>
@endsection