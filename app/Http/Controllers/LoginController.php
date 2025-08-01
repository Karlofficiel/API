<?php

namespace App\Http\Controllers;

use App\Models\RegisterUser;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class LoginController extends Controller
{
    public function login(Request $request)
{
    $validator = Validator::make($request->all(), [
        'name' => 'required|string',
        'password' => 'required|string|min:6',
    ]);
// 
    if ($validator->fails()) {
        return response()->json([
            'status' => false,
            'errors' => $validator->errors(),
        ], 422);
    }

    // Chercher l'utilisateur par le nom
    $user = RegisterUser::where('name', $request->name)->first();

    // Vérifier le mot de passe
    if (!$user || !Hash::check($request->password, $user->password)) {
        return response()->json([
            'status' => false,
            'message' => 'Nom ou mot de passe incorrect.',
        ], 401);
    }

    // Connexion réussie
    return response()->json([
        'status' => true,
        'message' => 'Connexion réussie.',
        'user' => $user,
    ]);
}

}
