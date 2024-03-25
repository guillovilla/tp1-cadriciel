@extends('layouts.app')
@section('title', 'Etudiants List')
@section('content')
<section class="py-8">
  <div class="container">
    <div class="px-4 pb-4 mb-6 bg-white rounded shadow">
      <div class="table-responsive">
      <a href="{{route('document.create')}}" class="btn btn-sm btn-primary">@lang('lang.télécharger_un_fichier') </a>
        <table class="table mb-0 table-borderless table-striped small">
          <thead>
            <tr class="text-secondary"><th class="pt-4 pb-3 px-6">@lang('lang.Titre_du_document')</th><th class="pt-4 pb-3 px-6">@lang('Utilisateur')</th><th class="pt-4 pb-3 px-6">@lang('lang.Nom_du_document')</th><th class="pt-4 pb-3 px-6">@lang('lang.Modifier_supprimer')</th></tr>
          </thead>
          <tbody>
          @foreach($documents as $document)
            <tr>
              <td class="py-5 px-6">{{ $document->nom ? $document->nom[app()->getLocale()] ?? $document->nom['fr'] : '' }}</td>
              <td class="py-3 px-6">
                <div class="d-flex align-items-center">
                  <img class="me-4 img-fluid rounded" src="{{ asset('avatar/' . $document->etudiant->avatar) }}" alt="" style="width: 32px; height: 32px;">
                  <div>
                    <p class="mb-0">{{ $document->user->nom}}</p>
                  </div>
                </div>
              </td>
              <td class="py-5 px-6">
                <a href="{{ asset('doc/' . $document->doc) }}" class="badge bg-primary-light text-primary" download>{{ $document->doc }}</a>
              </td>
              <td class="py-5 px-6">
                  <div style="display: flex; align-items: center;">
                      @if(auth()->check() && $document->user_id == auth()->user()->id)
                      <a href="{{ route('document.edit', $document['id']) }}" class="btn btn-sm btn-outline-success">@lang('Modifier')</a>
                      <div style="padding-left: 10px;">
                          <form action="/document/{{ $document->id }}" method="post">
                              @csrf
                              @method('delete')
                              <button type="submit" class="btn btn-sm btn-outline-danger">@lang('Supprimer')</button>
                          </form>
                      </div>
                    
                  </div>
              </td>
            </tr>
            @endif 
            @endforeach
          </tbody>
        </table>
        {{ $documents }}
      </div>
    </div>
  </div>
</section>
@endsection