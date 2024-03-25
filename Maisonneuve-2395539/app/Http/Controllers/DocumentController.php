<?php

namespace App\Http\Controllers;

use App\Models\Document;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\Etudiant;
use App\Http\Resources\ForumResource;



class DocumentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $documents = Document::select()
        ->orderby('nom')
        ->paginate(5);
        $etudiants = Etudiant::all();
        
        return view('document.index', compact('documents','etudiants'));
        
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
{
    return view('document.create');
}

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
{
    $request->validate([
        'nom_fr' => 'required|max:120',
        'nom_en' => 'max:120',
        'doc' => 'nullable|file|mimes:pdf,doc,zip|max:10000',
    ]);
    $nom = [
        'fr' => $request->nom_fr,
    ];
    if($request->nom_en != null) { 
        $nom = $nom + ['en' => $request->nom_en];
    };
    
    $document = Document::create([
        'nom' => $nom,
        'user_id' =>  Auth::user()->id,
    ]);

    if ($request->hasFile('doc')) {
        $doc = $request->file('doc');
        $docName = time() . '.' . $doc->getClientOriginalExtension(); 
        $doc->move(public_path('doc'), $docName);
        $document->update(['doc' => $docName]); 
    }
    
    return back()->withSuccess('Document created successfully!');
}

    /**
     * Display the specified resource.
     */
    public function show(Document $document)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Document $document)
    {
        return view('document.edit', ['document' => $document]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Document $document)
    {
        $request->validate([
            'nom_fr' => 'required|max:120',
            'nom_en' => 'max:120',
            'doc' => 'nullable|file|mimes:pdf,doc,zip|max:10000',
        ]);
        $nom = [
            'fr' => $request->nom_fr,
        ];
        if($request->nom_en != null) { 
            $nom = $nom + ['en' => $request->nom_en];
        };
        
        if ($request->hasFile('doc')) {
            $doc = $request->file('doc');
            $docName = time() . '.' . $doc->getClientOriginalExtension(); // Corrección aquí
            $doc->move(public_path('doc'), $docName);
            $document->update(['doc' => $docName]); 
        }

        $document->update([
            'nom' => $nom,
            'user_id' =>  Auth::user()->id,
            'doc' => $docName,
        ]);
        
        return back()->withSuccess('Document created successfully!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Document $document)
    {
        $document->delete();
        return redirect()->route('document.index')->with('success', 'Document deleted successfully!');
    }
}
