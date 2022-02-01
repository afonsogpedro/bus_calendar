<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Route extends Model
{
    use HasFactory;

    protected $fillable = [ "id", "external_id", "invitation_code", "title", "start_timestamp", "end_timestamp" ];
}
