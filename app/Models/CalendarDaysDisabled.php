<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CalendarDaysDisabled extends Model
{
    use HasFactory;

    protected $table = 'calendar_days_disabled';

    protected $fillable = [	"id", "calendar_id", "day", "enabled", "updated_at", "created_at" ];

    public static function getDisabledDays($route)
    {
        if ($route) {
            $data = CalendarDaysDisabled::select('routes_data.route_id', 'calendar_days_disabled.day')
                ->join('calendar', 'calendar.id', '=', 'calendar_days_disabled.calendar_id')
                ->join('routes_data', 'routes_data.calendar_id', '=', 'calendar.id')
                ->where('calendar_days_disabled.enabled', 1)->where('routes_data.route_id', $route)->get();
        } else {
            $data = CalendarDaysDisabled::select('routes_data.route_id', 'calendar_days_disabled.day')
                ->join('calendar', 'calendar.id', '=', 'calendar_days_disabled.calendar_id')
                ->join('routes_data', 'routes_data.calendar_id', '=', 'calendar.id')
                ->where('calendar_days_disabled.enabled', 1)->get();
        }

        return $data;
    }

}
