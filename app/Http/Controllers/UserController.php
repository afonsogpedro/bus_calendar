<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\User;
use Exception;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

class UserController extends Controller
{
    public function login(Request $request) {

        $validator = Validator::make($request->all(), [
            "email" => "required|email",
            "password" => "required|min:3"
        ]);

        if($validator->fails()) {
            return $this->validationErrors($validator->errors());
        }

        try {
            if(Auth::attempt(['email' => $request->email, 'password' => $request->password])) {
                $user = Auth::user();
                $token = $user->createToken('token')->accessToken;
                return response()->json(
                    [
                        "status" => "success",
                        "error" => false,
                        "message" => "Correcto! Usted está ya conectado.",
                        "token" => $token,
                    ]
                );
            }
            return response()->json(["status" => "failed", "message" => "Ups! credenciales invalidas."], 404);
        }
        catch(Exception $e) {
            return response()->json(["status" => "failed", "message" => $e->getMessage()], 404);
        }
    }

    public function user() {
        try {
            $user = Auth::user();
            return response()->json(["status" => "success", "error" => false, "data" => $user], 200);
        }
        catch(NotFoundHttpException $exception) {
            return response()->json(["status" => "failed", "error" => $exception], 401);
        }
    }

    public function logout() {

        if(Auth::check()) {
            Auth::user()->token()->revoke();
            return response()->json(["status" => "success", "error" => false, "message" => "Correcto! Usted se acaba de desconectar."], 200);
        }
        return response()->json(["status" => "failed", "error" => true, "message" => "Ups! Ya usted estaba desconectado."], 403);
    }
}
