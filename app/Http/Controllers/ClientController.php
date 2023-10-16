<?php

namespace App\Http\Controllers;
use App\Models\Client;

use Illuminate\Http\Request;

class ClientController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data=Client::all();
        return view("Employes.liste_patients",compact("data"));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view("Employes.ajouter_patient");
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate(([
            'nom'=>'required',
            'prenom'=>'required',
            'cin'=>"required|unique:clients,cin",
            'age'=>'required',
            'telephone'=>'required|max:13|min:13',
            'date_inscription'=>'required',
            
        ]));
        client::create([
            'nom'=>$request->nom,
            'prenom'=>$request->prenom,
            'cin'=>$request->cin,
            'age'=>$request->age,
            'telephone'=>$request->telephone,
            'date_inscription'=>$request->date_inscription,
        ]);
        return redirect()->route('patients.index')->with(["success"=>"Un patient a est ajouté"]);
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $data=Client::find($id);
        return view("Employes.details_patients",compact('data'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $data=Client::find($id);
        return view("Employes.modifier_patients",compact('data'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $patient=Client::find($id);
        $old_cin=$request->input("old_cin");
        if($old_cin==$request->cin){
            $request->validate(([
                'nom'=>'required',
                'prenom'=>'required',
                'cin'=>"required",
                'age'=>'required',
                'telephone'=>'required|max:13|min:13',
                'date_inscription'=>'required',
                
            ]));
            $patient->update([
                'nom'=>$request->nom,
                'prenom'=>$request->prenom,
                'cin'=>$request->cin,
                'age'=>$request->age,
                'telephone'=>$request->telephone,
                'date_inscription'=>$request->date_inscription
            ]);
        }else{
            $request->validate(([
                'nom'=>'required',
                'prenom'=>'required',
                'cin'=>"required|unique:clients,cin",
                'age'=>'required',
                'telephone'=>'required|max:13|min:13',
                'date_inscription'=>'required',
                
            ]));
            $patient->update([
                'nom'=>$request->nom,
                'prenom'=>$request->prenom,
                'cin'=>$request->cin,
                'age'=>$request->age,
                'telephone'=>$request->telephone,
                'date_inscription'=>$request->date_inscription,
            ]);
        }
        return redirect()->route('patients.index')->with(["success"=>"Un patient a est ajouté"]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $data=Client::find($id);
        $data->delete();
        return redirect()->route('patients.index')->with(["success"=>"Un client a été supprimé"]);
    }
}
