<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reservation extends Model
{
    use HasFactory;

    protected $fillable = [ "id", "user_plan_id", "route_id", "track_id", "reservation_start", "reservation_end",
        "route_stop_origin_id", "route_stop_destination_id", "created_at", "updated_at", "deleted_at" ];

    public static function getReservationUser($user, $route)
    {
        return Reservation::select('routes_data.date_init', 'routes_data.mon', 'routes_data.tue', 'routes_data.wed',
        'routes_data.thu', 'routes_data.fri', 'routes_data.sat', 'routes_data.sun')
            ->join('user_plans', 'user_plans.id', '=', 'reservations.user_plan_id')
            ->join('routes_data', 'routes_data.route_id', '=', 'reservations.route_id')
            ->where('user_plans.user_id', '=', $user)
            ->where('routes_data.route_id', '=', $route)->get();
    }
}
