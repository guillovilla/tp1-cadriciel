<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class ForumResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */

    //  public function toArray($request)
    //  {
    //      $titreArray = json_decode($this->titre, true);
    //      $texteArray = json_decode($this->texte, true);
     
    //      return [
    //          'id' => $this->id,
    //          'titre' => isset($titreArray[app()->getLocale()]) ? $titreArray[app()->getLocale()] : (isset($titreArray['fr']) ? $titreArray['fr'] : $this->titre),
    //          'texte' => isset($texteArray[app()->getLocale()]) ? $texteArray[app()->getLocale()] : (isset($texteArray['fr']) ? $texteArray['fr'] : $this->texte),
    //          'user_id' => $this->user_id,
    //          'nom_utilisateur' => $this->user->nom,
    //          'avatar' => $this->etudiant->avatar,
    //      ];
    //  }
    
     public function toArray($request)
     {
     
         return [
             'id' => $this->id,
             'titre' => isset($this->titre[app()->getLocale()]) ? $this->titre[app()->getLocale()] : $this->titre['fr'],
             'texte' => isset($this->texte[app()->getLocale()]) ? $this->texte[app()->getLocale()] : $this->texte['fr'],
             'user_id' => $this->user_id,
             'nom_utilisateur' => $this->user->nom,
             'avatar' => $this->etudiant->avatar,
         ];
     }

}
