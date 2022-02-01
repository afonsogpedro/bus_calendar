<?php

namespace Database\Seeders;

use App\Models\CalendarDaysDisabled;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(CalendarSeeder::class);
        $this->call(UsersSeeder::class);
        $this->call(CalendarDaysDisabledSeeder::class);
        $this->call(UserPlansSeeder::class);
        $this->call(RoutesSeeder::class);
        $this->call(ReservationsSeeder::class);
        $this->call(RouteDataSeeder::class);
        $this->call(ServicesSeeder::class);
    }
}
