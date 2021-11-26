<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class UserController extends Controller
{

    public function register(Request $request) {
        $validator  =   Validator::make($request->all(), [
            "name"  =>  "required|string|between:2,100",
            "email"  =>  "required|string|email|unique:users",
            "password"  =>  "required|string|confirmed|min:6"
        ]);

        if($validator->fails()) {
            return response()->json([
                "status" => "failed", 
                "validation_errors" => $validator->errors()
            ]);
        }

        $inputs = $request->all();
        $inputs["password"] = Hash::make($request->password);

        $user = User::create($inputs);

        $token = $user->createToken('token')->plainTextToken;

        if(!is_null($user)) {
            return response()->json([
                "status" => "success", 
                "message" => "Création du compte réussi", 
                "data" => $user,
                'meta' => [
                    'token' => $token,
                ],
            ]);
        }
        else {
            return response()->json([
                "status" => "failed", 
                "message" => "Erreur dans la création du compte"
            ]);
        }       
    }

    public function login(Request $request) {

        $validator = Validator::make($request->all(), [
            "email" =>  "required|email",
            "password" =>  "required|string|min:6",
        ]);

        if($validator->fails()) {
            return response()->json([
                "validation_errors" => $validator->errors()
            ]);
        }

        $user = User::where("email", $request->email)->first();

        if(is_null($user)) {
            return response()->json([
                "status" => "failed", 
                "message" => "Aucun compte ne correspond à cette adresse mail"
            ]);
        }

        if(Auth::attempt(['email' => $request->email, 'password' => $request->password])){
            $user = Auth::user();
            $token = $user->createToken('token')->plainTextToken;

            return response()->json([
                "status" => "success", 
                "message" => "Création du compte réussi", 
                "data" => $user,
                'meta' => [
                    'token' => $token,
                ],
            ]);
        }
        else {
            return response()->json([
                "status" => "failed", 
                "success" => false, 
                "message" => "L'adresse mail et le mot de passe ne correspondent pas"
            ]);
        }
    }

    public function user() {
        $user = Auth::user();
        if(!is_null($user)) { 
            return response()->json([
                "status" => "success", 
                "data" => $user
            ]);
        }
        else {
            return response()->json([
                "status" => "failed", 
                "message" => "Aucun utilisateur trouvé"
            ]);
        }        
    }

    public function logout(Request $request) {
        auth('sanctum')->user()->tokens()->delete();

        return response()->json([
            'message' => 'Déconnexion réussie'
        ], 200);
	}
}