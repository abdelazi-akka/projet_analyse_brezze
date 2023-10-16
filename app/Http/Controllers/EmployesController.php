<?php

namespace App\Http\Controllers;

use App\Models\Employe;
use Illuminate\Http\Request;

class EmployesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data=Employe::all();
        return view("Admin.liste_employes",compact("data"));
        // return $data;
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view("Admin.Ajouter_employe");
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'cin' => 'required|max:100|unique:employes,cin',
            'nom' => 'required|max:100',
            'prenom' => 'required|max:100',
            'adress' => 'required|max:100',
            'telephone' => 'required|max:13|min:13',
            'date_recrutement' => 'required',
        ]);
    
        Employe::create([
            'cin' => $request->cin,
            'nom' => $request->nom,
            'prenom' => $request->prenom,
            'adress' => $request->adress,
            'telephone' => $request->telephone,
            'date_recrutement' => $request->date_recrutement,
        ]);
    
        return redirect()->route('employes.index')->with(["success" => "Un employé a été ajouté"]);
    }
    

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $data=Employe::find($id);
        return view("Admin.details_employe",compact("data"));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $data=Employe::find($id);
        return view("Admin.modifier_employe",compact("data"));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request,$id)
    {
        $employe=Employe::find($id);
        $oldCin=$request->input("old_cin");
        if ($oldCin===$request->input("cin")){
            $request->validate([
                'cin' => 'required',
                'nom' => 'required|max:100',
                'prenom' => 'required|max:100',
                'adress' => 'required|max:100',
                'telephone' => 'required|max:13|min:13',
                'date_recrutement' => 'required',
            ]);
            $employe->update([
                'cin' => $request->cin,
            'nom' => $request->nom,
            'prenom' => $request->prenom,
            'adress' => $request->adress,
            'telephone' => $request->telephone,
            'date_recrutement' => $request->date_recrutement,
            ]);
    
        }else{
            $request->validate([
                'cin' => 'required|unique:employes,cin',
                'nom' => 'required|max:100',
                'prenom' => 'required|max:100',
                'adress' => 'required|max:100',
                'telephone' => 'required|max:13|min:13',
                'date_recrutement' => 'required',
            ]);
            $employe->update([
            'cin' => $request->cin,
            'nom' => $request->nom,
            'prenom' => $request->prenom,
            'adress' => $request->adress,
            'telephone' => $request->telephone,
            'date_recrutement' => $request->date_recrutement,
            ]);
        }
        return redirect()->route('employes.index')->with(["success" => "Un employé a été modifier"]);

        
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $data=Employe::find($id);
        $data->delete();
        return redirect()->route('employes.index')->with(["success" => "Un employé a été supprimé"]);


    }
}
