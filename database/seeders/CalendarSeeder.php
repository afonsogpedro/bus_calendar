<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Calendar;

class CalendarSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $calendars = json_decode(file_get_contents('database/json/calendar.json'));

        foreach ($calendars->calendar as $value) {
            Calendar::create([
                "id" => $value->id,
                "calendar_id" => $value->calendar_id,
                "name" => $value->name,
                "updated_at" => $value->updated_at,
                "created_at" => $value->created_at
            ]);
        }
    }
}
