<?php

namespace App\Http\Controllers;

use App\Models\CalendarDaysDisabled;
use Illuminate\Http\Request;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

class CalendarController extends Controller
{
    public function getDisabledDays(Request $request)
    {
        try {
            $route = $request->route;
            $disableddays = CalendarDaysDisabled::getDisabledDays($route);

            return response()->json(["status" => "success", "error" => false, "data" => $disableddays], 200);
        }
        catch(NotFoundHttpException $exception) {
            return response()->json(["status" => "failed", "error" => $exception], 401);
        }
    }
}
