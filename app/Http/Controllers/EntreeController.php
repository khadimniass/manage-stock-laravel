<?php

namespace App\Http\Controllers;

use App\Models\Entree;
use App\Models\Produit;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Auth\Events\Registered;
use App\Providers\RouteServiceProvider;

class EntreeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $entrees = Entree::all();
        $produits = Produit::orderBy('libelle')->get();
        return view('entrees.index', compact('produits'), compact('entrees'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $produits = Produit::orderBy('libelle')->get();
        return view('entrees.create', compact('produits'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'produit_id' =>['required'],
            'quantite' => ['required', 'integer', 'min:1'],
            'prix' => ['required', 'integer', 'min:1'],
            'date' => ['required', 'date'],
        ]);

        $entree = Entree::create($request->all());

        event(new Registered($entree));

        return back()->with('message', "Entrée enregistrée !");
    }

    /**
     * Display the specified resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function show(int $id)
    {
        $entree = Entree::find($id);
        $produits = Produit::orderBy('libelle')->get();
       return view('entrees.show', compact('produits'), compact('entree'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $entree = Entree::find($id);
        $produits = Produit::orderBy('libelle')->get();
        return view('entrees.edit', compact('produits'), compact('entree'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $data = $request->validate([
            'produit_id' =>['required'],
            'quantite' => ['required', 'integer', 'min:1'],
            'prix' => ['required', 'integer', 'min:1'],
            'date' => ['required', 'date'],
        ]);
        $entree = Entree::find($id);
        $entree->produit_id = $request->produit_id;
        $entree->quantite = $request->quantite;
        $entree->prix = $request->prix;
        $entree->date = $request->date;
        $entree->save();
        return back()->with('message', "L'entrée a bien été modifiée !");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $entree = Entree::find($id);
        $entree->delete();
        $entrees = Entree::all();
        $produits = Produit::orderBy('libelle')->get();
        return view('entrees.index', compact('produits'), compact('entrees'));
    }
}
