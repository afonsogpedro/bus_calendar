<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\CalendarDaysDisabled;

class CalendarDaysDisabledSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $calendarsdaysdisabled = json_decode(file_get_contents('database/json/calendar_days_disabled.json'));

        foreach ($calendarsdaysdisabled->calendar_days_disabled as $value) {
            CalendarDaysDisabled::create([
                "id" => $value->id,
		        "calendar_id" => $value->calendar_id,
		        "day" => $value->day,
                "enabled" => $value->enabled,
                "updated_at" => $value->updated_at,
                "created_at" => $value->created_at
            ]);
        }
    }
}
