<?php

namespace App\Http\Controllers;

use App\Models\Etudiant;
use App\Models\User;
use App\Models\Ville;
use Illuminate\Http\Request;

class EtudiantController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $etudiants = Etudiant::all(); 
        return view('etudiant.index', ["etudiants" => $etudiants]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $villes = Ville::all();
        return view('etudiant.create', compact('villes'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        
        $request->validate([
            'nom' => 'required|min:2|max:191|string',
            'adresse' => 'required|string',
            'téléphone' => 'required|numeric',
            'email' => 'required|email|unique:users', 
            'date_de_naissance' => 'required|date_format:Y-m-d|before:today',
            'ville_id' => 'required|exists:villes,id',
            'password' => 'min:6|max:20',
            'password_confirmation' => 'required|same:password'
        
        ]);

        $user = User::create([
            'nom' => $request->nom,
            'email' => $request->email,
            'password' => bcrypt($request->password)
        ]);

       
        $etudiant = Etudiant::create([
            // 'nom' => $request->nom,
            'adresse' => $request->adresse,
            'téléphone' => $request->téléphone,
            // 'email' => $request->email,
            'date_de_naissance' => $request->date_de_naissance,
            'ville_id' => $request->input('ville_id'),
    ]);

    
        if ($request->hasFile('avatar')) {
            $avatar = $request->file('avatar');
            $avatarName = time() . '.' . $avatar->getClientOriginalExtension();
            $avatar->move(public_path('avatar'), $avatarName);
            $etudiant->update(['avatar' => $avatarName]);
        }
    
        return redirect()->route('etudiant.show', $etudiant->id)->with('success', 'Étudiant créé!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Etudiant $etudiant)
    {
        $etudiant->load('user');
        return view('etudiant.show', ["etudiant" => $etudiant]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Etudiant $etudiant)
    {
        $villes = Ville::all();
        return view('etudiant.edit', ['etudiant' => $etudiant, 'villes' => $villes]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Etudiant $etudiant)
    {
        $request->validate([
            'nom' => 'required|min:2|max:191|string',
            'adresse' => 'required|string',
            'téléphone' => 'required|numeric',
            'email' => 'required|email', 
            'date_de_naissance' => 'required|date',
            'ville_id' => 'required|exists:villes,id'
        
        ]);

        $etudiant->update([
            'nom' => $request->nom,
            'adresse' => $request->adresse,
            'téléphone' => $request->téléphone,
            'email' => $request->email,
            'date_de_naissance' => $request->date_de_naissance,
            'ville_id' => $request->input('ville_id')

        ]);

        return redirect()->route('etudiant.show', $etudiant->id)->with('success', 'Étudiant updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Etudiant $etudiant)
    {
        $etudiant->delete();
       return redirect()->route('etudiant.index')->with('success', 'Étudiant deleted successfully!');
    }
}
