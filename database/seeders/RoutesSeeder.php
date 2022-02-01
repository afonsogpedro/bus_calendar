<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Route;

class RoutesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $routes = json_decode(file_get_contents('database/json/routes.json'));

        foreach ($routes->routes as $value) {
            Route::create([
                "id" => $value->id,
                "external_id" => $value->external_id,
                "invitation_code" => $value->invitation_code,
                "title" => $value->title,
                "start_timestamp" => $value->start_timestamp,
                "end_timestamp" => $value->end_timestamp,
            ]);
        }
    }
}
