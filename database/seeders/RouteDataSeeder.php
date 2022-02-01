<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\RouteData;

class RouteDataSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $route_data = json_decode(file_get_contents('database/json/route_data.json'));

        foreach ($route_data->routes_data as $value) {
            RouteData::create([
                "id" => $value->id,
                "route_id" => $value->route_id,
                "calendar_id" => $value->calendar_id,
                "vinculation_route" => $value->vinculation_route,
                "route_circular" => $value->route_circular,
                "date_init" => $value->date_init,
                "date_finish" => $value->date_finish,
                "mon" => $value->mon,
                "tue" => $value->tue,
                "wed" => $value->wed,
                "thu" => $value->thu,
                "fri" => $value->fri,
                "sat" => $value->sat,
                "sun" => $value->sun,
                "updated_at" => $value->updated_at,
                "created_at" => $value->created_at
            ]);
        }
    }
}
