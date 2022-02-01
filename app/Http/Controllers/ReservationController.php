<?php

namespace App\Http\Controllers;

use App\Models\Reservation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

class ReservationController extends Controller
{
    public function getReservation(Request $request)
    {
        try {
            $user = Auth::user()->id;
            $reservations = Reservation::getReservationUser($user, $request->route);
            return response()->json(["status" => "success", "error" => false, "data" => $reservations], 200);
        }
        catch(NotFoundHttpException $exception) {
            return response()->json(["status" => "failed", "error" => $exception], 401);
        }
    }
}
