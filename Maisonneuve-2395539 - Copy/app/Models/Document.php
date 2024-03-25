<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Casts\Attribute;
use App\Http\Resources\ForumResource;

class Document extends Model
{
    use HasFactory;

    protected $fillable = ['id', 'nom', 'user_id', 'doc'];


    public function user(){
        return $this->belongsTo(User::class);
    }

    public function etudiant(){
        return $this->belongsTo(Etudiant::class, 'user_id');
    }

    protected function nom(): Attribute
    {
        return Attribute::make(
            [
                'get' => function ($value) {
                    return json_decode($value, true);
                },
                'set' => function ($value) {
                    return json_encode($value);
                }
            ]
        );
    }
    
    static public function noms(){
        $noms = DocumentResource::collection(self::select()->orderBy('nom')->get());
        $data = json_encode($noms);
        return json_decode($data, true);
        
    }
   
    
}

