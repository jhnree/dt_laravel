<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TimeEntry extends Model
{
    //
    public $timestamps = false;
    protected $table = 'tbl_time_entries';
    protected $fillable = [
        'user_id',
        'client',
        'location',
        'ip_address',
        'location_address',
        'device_type',
        'latitude',
        'longitude',
        'is_synced',
        'time',
        'type',
        'synced_date',
        'date_modified',
    ];
}
