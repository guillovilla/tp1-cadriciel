@extends('layouts.app')
@section('title', 'Etudiants List')
@section('content')
<div class="container bootstrap snippets bootdey">
<div class="panel-body inf-content">
    
    <div class="row">
        <div class="col-md-4">
        <img src="{{ asset('avatar/' . $etudiant->avatar) }}" alt="Cover" class="card-img-top">
 
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
                                Name                                                
                            </strong>
                        </td>
                        <td class="text-primary">
                        {{ $etudiant->nom }}     
                        </td>
                    </tr>
                    <tr>    
                        <td>
                            <strong>
                                <span class="glyphicon glyphicon-user  text-primary"></span>    
                                Adresse                                                
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
                                Téléphone                                                
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
                                Email                                                
                            </strong>
                        </td>
                        <td class="text-primary">
                        {{ $etudiant->email }} 
                        </td>
                    </tr>


                    <tr>        
                        <td>
                            <strong>
                                <span class="glyphicon glyphicon-eye-open text-primary"></span> 
                                Date de naissance                                                
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
                                Ville                                                
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
                                Created at                                                
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
                                Updated at                                                
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
                <a href="{{route('etudiant.edit', $etudiant->id)}}" class="btn btn-sm btn-outline-success">Modifier</a>
                
                <form  method="post">
                    @csrf
                    @method('delete')
                    <button type="submit" class="btn btn-sm btn-outline-danger">Supprimer</button>
                </form>
            </div>
            </div>
        </div>
    </div>
</div>
</div>
@endsection