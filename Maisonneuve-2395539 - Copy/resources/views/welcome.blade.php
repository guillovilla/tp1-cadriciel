@extends('layouts.app')
@section('title', 'Etudiants List')
@section('content')
<section class="pricing py-5">
  <div class="container">
  <div class="container text-center">
  <h1 class="mt-5 text-dark fw-light">@lang('lang.texte_accueil')</h1>
  </div>
  <hr>
    <div class="row">
      <!-- Free Tier -->
      <div class="col-lg-4">
        <div class="card mb-5 mb-lg-0">
          <div class="card-body">
            <div class="d-grid">
              <a href="{{route('etudiant.index')}}" class="btn btn-primary text-uppercase">@lang('lang.text_liste') </a>
            </div>
          </div>
        </div>
      </div>
      <!-- Plus Tier -->
      <div class="col-lg-4">
        <div class="card mb-5 mb-lg-0">
          <div class="card-body">
            <div class="d-grid">
              <a href="{{route('etudiant.create')}}" class="btn btn-primary text-uppercase">@lang('lang.text_ajouter')</a>
            </div>
          </div>
        </div>
      </div>
      <!-- Plus Tier -->
      <div class="col-lg-4">
        <div class="card mb-5 mb-lg-0">
          <div class="card-body">
            <div class="d-grid">
              <a href="{{route('login')}}" class="btn btn-primary text-uppercase">@lang('Connexion')</a>
            </div>
          </div>
        </div>
      </div>
      
    </div>
  </div>
</section>
@endsection