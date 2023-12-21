<?php

namespace App\Http\Controllers;

use App\Models\Sortie;
use App\Models\Produit;
use Illuminate\Http\Request;
use Illuminate\Auth\Events\Registered;
use App\Providers\RouteServiceProvider;

class SortieController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $sorties = Sortie::all();
        $produits = Produit::orderBy('libelle')->get();
        return view('sorties.index', compact('produits'), compact('sorties'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $produits = Produit::orderBy('libelle')->get();
        return view('sorties.create', compact('produits'));
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
            'quantite' => ['required', 'integer', 'min:1'],
            'prix' => ['required', 'integer', 'min:1'],
            'date' => ['required', 'date'],
        ]);

        $sortie = Sortie::create($request->all());

        event(new Registered($sortie));

        return back()->with('message', "Sortie enregistrée !");
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $sortie = Sortie::find($id);
        $produits = Produit::orderBy('libelle')->get();
        return view('sorties.show', compact('produits'), compact('sortie'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $sortie = Sortie::find($id);
        $produits = Produit::orderBy('libelle')->get();
        return view('sorties.edit', compact('produits'), compact('sortie'));
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
        $sortie = Sortie::find($id);
        $sortie->produit_id = $request->produit_id;
        $sortie->quantite = $request->quantite;
        $sortie->prix = $request->prix;
        $sortie->date = $request->date;
        $sortie->save();
        return back()->with('message', "La sortie a bien été modifiée !");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $sortie = Sortie::find($id);
        $sortie->delete();
        $sorties = Sortie::all();
        $produits = Produit::orderBy('libelle')->get();
        return view('sorties.index', compact('produits'), compact('sorties'));
    }
}
