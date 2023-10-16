<?php

namespace App\Http\Controllers;
use App\Models\Analyse;
use App\Models\Client;
use Illuminate\Http\Request;

class AnalysesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data=Analyse::all();
        return view("Employes.liste_analyses",compact("data"));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            "id_client" => "required|exists:clients,id_client",
            "id_analyse" => "required|exists:analyses,id_analyse",
            "date_operation" => "required"
        ]);
    
        
        $client = Client::findOrFail($request->input("id_client"));
        $analyse = Analyse::findOrFail($request->input("id_analyse"));
    
        $client->analyses()->attach($analyse, [
            "date_operation" => $request->input("date_operation"),
            "resultat" => null,
            "date_resultat" => null,
            "etat" => 0
        ]);
    
        return redirect()->route("resultat.index")->with(["success" => "Un résultat a été ajouté"]);
    }
    

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $data=Analyse::find($id);
        return view("Employes.details_analyse",compact("data"));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $analyses=Analyse::all();
        $data=Client::find($id);
        return view("Employes.ajouter_operation",compact("analyses","data"));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
