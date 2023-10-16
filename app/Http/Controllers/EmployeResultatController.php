<?php

namespace App\Http\Controllers;

use App\Models\Client;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class EmployeResultatController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // $data=DB::select("SELECT id_operation,clients.id_client,nom,etat,prenom,resultat,cin,designation,date_operation FROM clients
        //  INNER JOIN client_analyse ON clients.id_client=client_analyse.id_client INNER JOIN analyses ON client_analyse.id_analyse=analyses.id_analyse");
        $data=DB::table("clients")->join("client_analyse","client_analyse.id_client","clients.id_client")
                                        ->join("analyses","client_analyse.id_analyse","analyses.id_analyse")
                                        ->select("clients.*","analyses.*","client_analyse.*")
                                        ->get();
        return view("Employes.liste_resultat",compact("data"));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $data=DB::select("SELECT 
        id_operation, nom, prenom, resultat, date_resultat, norme, unite, cin, designation, date_operation 
    FROM 
        clients 
        INNER JOIN client_analyse ON clients.id_client = client_analyse.id_client 
        INNER JOIN analyses ON client_analyse.id_analyse = analyses.id_analyse 
    WHERE 
        client_analyse.id_client = '{$id}' 
        AND DATE(date_operation) = (
            SELECT DATE(date_operation) 
            FROM client_analyse 
            WHERE client_analyse.id_client = '{$id}' LIMIT 1
        )
    ");
        return view("Employes.Resultat_finale",compact("data"));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        // $data=DB::select("SELECT id_operation,nom,prenom,resultat,date_resultat,cin,designation,date_operation FROM clients
        // INNER JOIN client_analyse ON clients.id_client=client_analyse.id_client
        // INNER JOIN analyses ON client_analyse.id_analyse=analyses.id_analyse WHERE id_operation='{$id}'");
        $data=DB::table("clients")->join("client_analyse","client_analyse.id_client","clients.id_client")
                                        ->join("analyses","client_analyse.id_analyse","analyses.id_analyse")
                                        ->where("client_analyse.id_operation",$id)
                                        ->select("clients.*","analyses.*","client_analyse.*")
                                        ->get();
        return view("Employes.modifier_resultat")->with(['data'=>$data]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request,$id)
    {
        $request->validate([
            "resultat"=>"required",
            "date_operation"=>"required",
            "date_resultat"=>"required|after_or_equal:".$request->input("date_operation")
        ]);
        DB::table("client_analyse")->where("id_operation",$id)->update([
            "resultat"=>$request->input("resultat"),
            "date_operation"=>$request->input("date_operation"),
            "date_resultat"=>$request->input("date_resultat")
        ]);
        return redirect()->route("resultat.index")->with(["success"=>"Le resultat a été modifié"]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        DB::table("client_analyse")->where("id_operation",$id)->delete();
        return redirect()->route("resultat.index")->with(["success"=>"un resultat a été supprimé"]);
    }
}
