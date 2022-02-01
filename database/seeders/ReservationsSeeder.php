<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Reservation;

class ReservationsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $reservations = json_decode(file_get_contents('database/json/reservations.json'));

        foreach ($reservations->reservations as $value) {
            Reservation::create([
                "id" => $value->id,
                "user_plan_id" => $value->user_plan_id,
                "route_id" => $value->route_id,
                "track_id" => $value->track_id,
                "reservation_start" => $value->reservation_start,
                "reservation_end" => $value->reservation_end,
                "route_stop_origin_id" => $value->route_stop_origin_id,
                "route_stop_destination_id" => $value->route_stop_destination_id,
                "created_at" => $value->created_at,
                "updated_at" => $value->updated_at,
                "deleted_at" => $value->deleted_at
            ]);
        }
    }
}
