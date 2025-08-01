<?php
namespace App\Http\Controllers\Api;

use App\Models\Produit;
use Illuminate\Http\Request;


class ProduitController extends Controller
{
      public function createproduit(Request $request)
    {
        $request->validate([
            'nom' => 'required',
            'description' => 'required',
            'prix' => 'required',
        ]);

        $produit = Produit::create([
            'nom' => $request->nom,
            'description' => $request->description,
            'prix' => $request->prix
        ]);

        return response(["message"=>"success produit crée avec success","produit"=>$produit],200);
    }
    public function showproduits()
    {
        $produits = Produit::all();
        return response(["message"=>"success liste produits","produits"=>$produits],200);
    }

    public function deleteproduit($id)
{
    $produit = Produit::find($id); // Ici $id est bien un entier ou string, pas un Produit

    if ($produit) {
        $produit->delete();
        return response()->json(["message" => "success produit supprimé avec succès"], 200);
    }

    // Si le produit n'existe pas
    return response()->json(["message" => "error produit introuvable"], 404);
}
public function updateproduit(Request $request, $id)
{
   
    // Validation des champs si nécessaire
    $request->validate([
        'nom' => "required",
        'description' => "required",
        'prix' => "required",
        // ajoute ici les autres champs nécessaires
    ]);

     $produit = Produit::find($id);

    if ($produit) {
            $produit->update([
                'nom' => $request->nom,
                'description' => $request->description,
                'prix' => $request->prix,
                // Ajoute ici les autres champs à mettre à jour
            ]);

        return response([
            "message" => "success produit mis à jour avec succès"
        ]);
     
    }
    // Si le produit n'existe pas
    return response([
        "message" => "error produit introuvable"
    ]);
}


}