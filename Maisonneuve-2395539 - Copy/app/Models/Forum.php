<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Casts\Attribute;
use App\Http\Resources\ForumResource;

class Forum extends Model
{
    use HasFactory;

    protected $fillable = ['id', 'titre', 'texte', 'user_id'];


    public function user(){
        return $this->belongsTo(User::class);
    }

    public function etudiant(){
        return $this->belongsTo(Etudiant::class, 'user_id');
    }
    
    // static public function articles(){
    //     $resource = ForumResource::collection(self::select()->orderBy('titre')->get());
    //     $data = json_encode($resource);
    //     return json_decode($data, true);
    // }
    
    static public function titre(): Attribute
    {
        return Attribute::make(
            get: fn($value) => json_decode($value, true),
            set: fn($value) => json_encode($value)
        );
    }
    static public function texte(): Attribute
    {
        return Attribute::make(
            get: fn($value) => json_decode($value, true),
            set: fn($value) => json_encode($value)
        );
    }

    static public function titres(){
        $titres = ForumResource::collection(self::select()->orderBy('titre')->get());
        $data = json_encode($titres);
        return json_decode($data, true);
        
    }
    
    static public function textes(){
        $textes = ForumResource::collection(self::select()->get());
        $data = json_encode($textes);
        return json_decode($data, true);
        
    }

    
}

// static public function forum()
// {
//     return self::orderBy('titre')->get();
// }