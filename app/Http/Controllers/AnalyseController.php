<?php

namespace App\Http\Controllers;

use App\Models\Analyse;
use Illuminate\Http\Request;

class AnalyseController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data=Analyse::all();
        return view("Admin.liste_analyses",compact("data"));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view("Admin.ajouter_analyse");
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate(([
            'abrv'=>'required',
            'designation'=>'required',
            'prix'=>'required',
            'unite'=>'required',
            'norme'=>'required',
            
        ]));
        Analyse::create([
            'abrv'=>$request->abrv,
            'designation'=>$request->designation,
            'prix'=>$request->prix,
            'unite'=>$request->unite,
            'norme'=>$request->norme,
        ]);
        return redirect()->route('analyse.index')->with(["success"=>"Une Analyse est ajouté"]);
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $data=Analyse::find($id);
        return view("Admin.details_analyse",compact("data"));
    }
 
    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $data=Analyse::find($id);
        return view("Admin.modifier_analyse",compact("data"));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request,$id)
    {
        $analyse=Analyse::find($id);
        $request->validate(([
            'abrv'=>'required',
            'designation'=>'required',
            'prix'=>'required',
            'unite'=>'required',
            'norme'=>'required',
            
        ]));
        $analyse->update([
            'abrv'=>$request->abrv,
            'designation'=>$request->designation,
            'prix'=>$request->prix,
            'unite'=>$request->unite,
            'norme'=>$request->norme,
        ]);
        return redirect()->route('analyse.index')->with(["success"=>"Une analyse a été modifiée"]);

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $data=Analyse::find($id);
        $data->delete();
        return redirect()->route('analyse.index')->with(['success'=>'Une analyse est supprimée']);
    }
}
