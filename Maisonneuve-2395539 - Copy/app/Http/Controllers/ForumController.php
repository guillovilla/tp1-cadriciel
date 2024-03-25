<?php

namespace App\Http\Controllers;

use App\Models\Forum;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\Etudiant;
use App\Http\Resources\ForumResource;

class ForumController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $articles = Forum::all(); 
        $etudiants = Etudiant::all();
        return view('forum.index', compact('articles','etudiants'));
        
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('forum.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
{
    $request->validate([
        'titre_fr' => 'required|max:150',
        'titre_en' => 'max:150',
        'texte_fr' => 'required|max:1000',
        'texte_en' => 'max:1000',
    ]);
    $titre = [
        'fr' => $request->titre_fr,
    ];
    if($request->titre_en != null) { 
        $titre = $titre + ['en' => $request->titre_en];
    };

    $texte = [
        'fr' => $request->texte_fr,
    ];
    if($request->texte_en != null) { 
        $texte = $texte + ['en' => $request->texte_en];
    };


    Forum::create([
        'titre' => $titre,
        'texte' => $texte,
        'user_id' => Auth::user()->id,

    ]);
    return back()->with('success', trans('lang.post_created_successfully'));

}

    /**
     * Display the specified resource.
     */
    public function show(Forum $forum)
{
    $forums = Forum::get(); 
    return view('forum.show', ['forum' => $forum]);
}

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Forum $forum)
    {
        // $forum = ForumResource::collection(Forum::select()->where('id', $forum)->get());
        // $data = json_encode($forum);
        // $forum = json_decode($data, true);
        //  return $forum[0]['texte'];
        
        return view('forum.edit', ['forum' => $forum]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Forum $forum)
{
    
    $request->validate([
        'titre_fr' => 'required|max:150',
        'titre_en' => 'max:150',
        'texte_fr' => 'required|max:1000',
        'texte_en' => 'max:1000',
    ]);

    $titre = [
        'fr' => $request->titre_fr,
    ];

    if ($request->titre_en != null) {
        $titre['en'] = $request->titre_en;
    }

    $texte = [
        'fr' => $request->texte_fr,
    ];

    if ($request->texte_en != null) {
        $texte['en'] = $request->texte_en;
    }

    $forum->update([
        'titre' => $titre,
        'texte' => $texte,
    ]);

    return redirect()->route('forum.index')->with('success', trans('lang.article_updated_successfully'));

}



    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Forum $forum)
    {
        $forum->delete();
        return redirect()->route('forum.index')->with('success', trans('lang.article_deleted_successfully'));

    }
}
