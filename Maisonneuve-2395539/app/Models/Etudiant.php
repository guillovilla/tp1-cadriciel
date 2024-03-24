<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Etudiant extends Model
{
    use HasFactory;
   

    protected $fillable = [
        // 'nom',
        'id',
        'adresse',
        'téléphone',
        // 'email',
        'date_de_naissance',
        'ville_id',
        'avatar'
    ];

    public function ville(){

        return $this->belongsTo(Ville::class);

    }
    
    public function user()
    {
        return $this->hasOne(User::class, 'id');
    }
    
    public function forum()
    {
        return $this->hasOne(Forum::class, 'user_id');
    }
}
