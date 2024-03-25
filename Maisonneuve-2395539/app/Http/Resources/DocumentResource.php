<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class DocumentResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray($request)
     {
     
         return [
             'id' => $this->id,
             'nom' => isset($this->nom[app()->getLocale()]) ? $this->nom[app()->getLocale()] : $this->nom['fr'],
             'user_id' => $this->user_id,
             'nom_utilisateur' => $this->user->nom,
             'avatar' => $this->etudiant->avatar,
         ];
     }
}
