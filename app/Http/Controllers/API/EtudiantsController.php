<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Etudiants;


class EtudiantsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */


     ///liste des étudiants
    public function listEtudiants()
    {
        $etudiant = etudiants::get();

        return response()->json([
            "status"=> 1,
            "message" => "listes des étudiants",
            "data" => $etudiant],200);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */

     //insertion des etudiants
    public function create(Request $request)
    {
        $request->validate([
            'nom' =>'required',
            'email' =>'required|email|unique:etudiants',
            'password' =>'required',
        ]);

        $etudiant = new Etudiants();
        $etudiant->nom = $request->nom;
        $etudiant->email = $request->email;
        $etudiant->password = $request->password;
        $etudiant->save();

        return response()->json([
            "status"=> 1,
            "message" => "etudiant creer avec succes"]);

    }


    public function getEtudiant($id)
     {
         $etudiant = Etudiants::where("id",$id)->exists();
         
         
         if($etudiant){

            $info = Etudiants::find($id);

            return response()->json([
                "status"=> 1,
                "message" => "etudiant trouvé",
                "data" => $info],200);
         }else{

            return response()->json([
                "status"=> 0,
                "message" => "Acune donnée trouvé"
            ],404);
         }
         
     }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

     

    public function edit($id)
    {
        //
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
        $etudiant = Etudiants::where("id",$id)->exists();
         
         
        if($etudiant){

           $info = Etudiants::find($id);
            $info->nom = $request->nom;
            $info->email = $request->email;
            $info->password = $request->password;
            $info->save();

           return response()->json([
               "status"=> 1,
               "message" => "mise à jour effctuée"
            ]);
        }else{

           return response()->json([
               "status"=> 0,
               "message" => "Error 404"
           ],404);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function delete($id)
    {
        $etudiant = Etudiants::where("id",$id)->exists();
         
         
        if($etudiant){

           $etudiant = Etudiants::find($id);
            $etudiant->delete();

           return response()->json([
               "status"=> 1,
               "message" => "Suppresion réussie"
            ]);
        }else{

           return response()->json([
               "status"=> 0,
               "message" => "Error 404 etudiant introuvable"
           ],404);
        }

    }


}
