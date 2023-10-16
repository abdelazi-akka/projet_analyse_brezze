<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $currentYear=date('Y');
        $currentMonth = date('m');
        $currentDate = date('Y-m-d');
        $NombreResultat=DB::table("client_analyse")->where("etat",0)->count();
        $PayementAnne = DB::table('client_analyse')->select(DB::raw('YEAR(client_analyse.date_operation) AS anne'), DB::raw('COUNT(client_analyse.id_operation) as totalOperation'),
            DB::raw('SUM(analyses.prix) as totalPrix'))
            ->join('analyses', 'client_analyse.id_analyse', '=', 'analyses.id_analyse')
            ->whereYear("client_analyse.date_operation","=",$currentYear)
            ->groupBy('anne')
            ->get();
        /*---------------------------------------------------------------------- */
        $PayementMois = DB::table('client_analyse')
        ->select(DB::raw('YEAR(client_analyse.date_operation) AS anne'), DB::raw('MONTHNAME(client_analyse.date_operation) as month'), DB::raw('COUNT(client_analyse.id_operation) as totalOperation'), DB::raw('SUM(analyses.prix) as totalPrix'))
        ->join('analyses', 'client_analyse.id_analyse', '=', 'analyses.id_analyse')
        ->whereYear('client_analyse.date_operation', '=', $currentYear)
        ->whereMonth('client_analyse.date_operation', '=', $currentMonth)
        ->groupBy('anne', 'month')
        ->get();
        /*---------------------------------------------------------------------- */
        $PayementJour = DB::table('client_analyse')
            ->select(DB::raw('SUM(analyses.prix) as sumPrix'), DB::raw('COUNT(client_analyse.id_operation) as totalOperation'), 'client_analyse.date_operation')
            ->join('analyses', 'client_analyse.id_analyse', '=', 'analyses.id_analyse')
            ->whereDate('client_analyse.date_operation', '=', $currentDate)
            ->groupBy('client_analyse.date_operation')
            ->get();
        return view("Admin.Dashboard",compact("NombreResultat",'PayementAnne',"PayementMois","PayementJour"));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function listePaiements(){
        /*---------------------------------------------------------------------------------------------------------------- */
        $data = DB::table('clients')
        ->select('client_analyse.id_operation', 'clients.nom', 'clients.prenom', 'clients.cin', 'analyses.designation', 'analyses.prix', 'client_analyse.date_operation')
        ->join('client_analyse', 'clients.id_client', '=', 'client_analyse.id_client')
        ->join('analyses', 'client_analyse.id_analyse', '=', 'analyses.id_analyse')
        ->get();
        /*---------------------------------------------------------------------------------------------------------------- */
        $data2 = DB::table('client_analyse')
        ->select(DB::raw('SUM(analyses.prix) as sumPrix'), DB::raw('COUNT(client_analyse.id_operation) as totalOperation'), 'client_analyse.date_operation')
        ->join('analyses', 'client_analyse.id_analyse', '=', 'analyses.id_analyse')
        ->groupBy('client_analyse.date_operation')
        ->get();
        /*---------------------------------------------------------------------------------------------------------------- */
        $data3 = DB::table('client_analyse')
        ->select(DB::raw('YEAR(client_analyse.date_operation) AS anne'), DB::raw('MONTHNAME(client_analyse.date_operation) as month'),
        DB::raw('COUNT(client_analyse.id_operation) as totalOperation'), DB::raw('SUM(analyses.prix) as totalPrix'))
        ->join('analyses', 'client_analyse.id_analyse', '=', 'analyses.id_analyse')
        ->groupBy('anne', 'month')
        ->get();
        /*---------------------------------------------------------------------------------------------------------------- */
        $data4= DB::table('client_analyse')
        ->select(DB::raw('YEAR(client_analyse.date_operation) AS anne'), DB::raw('COUNT(client_analyse.id_operation) as totalOperation'), DB::raw('SUM(analyses.prix) as totalPrix'))
        ->join('analyses', 'client_analyse.id_analyse', '=', 'analyses.id_analyse')
        ->groupBy('anne')
        ->get();

        return view("Admin.liste_payments",compact("data","data2","data3","data4"));

    }
    public function create()
    {
        // $data=DB::select("SELECT id_operation,client.id_client,nom,prenom,etat,resultat,cin,designation,date_operation FROM client INNER JOIN operation ON client.id_client=operation.id_client
        // INNER JOIN analyse ON operation.id_analyse=analyse.id_analyse where etat=0");
        $data=DB::table("clients")->join("client_analyse","client_analyse.id_client","clients.id_client")
                                        ->join("analyses","client_analyse.id_analyse","analyses.id_analyse")
                                        ->where("client_analyse.etat",0)
                                        ->select("clients.*","analyses.*","client_analyse.*")
                                        ->get();
        return view("Admin.liste_resultat",compact("data"));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data=DB::table("clients")->join("client_analyse","client_analyse.id_client","clients.id_client")
                                        ->join("analyses","client_analyse.id_analyse","analyses.id_analyse")
                                        ->where("client_analyse.etat",1)
                                        ->select("clients.*","analyses.*","client_analyse.*")
                                        ->get();
        return view("Admin.historique_resultat",compact("data"));
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        DB::table("client_analyse")->where("id_operation",$id)->update([
            "etat"=>1
        ]);
        return redirect()->route("admin.AfficherResultat")->with(["success"=>"Le resultat a été modifié"]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $data=DB::table("client_analyse")->where("id_operation",$id)->get();
        return view("Admin.modifier_resultat",compact("data"));
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
            "date_resultat"=>$request->input("date_resultat"),
        ]);
        return redirect()->route("admin.AfficherResultat")->with(["success"=>"Le resultat a été modifié"]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        DB::table("client_analyse")->where("id_operation",$id)->delete();
        return redirect()->route("admin.AfficherResultat")->with(["success"=>"une opération a été supprimée"]);
    }
}
