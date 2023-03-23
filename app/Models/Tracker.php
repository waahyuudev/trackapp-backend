<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * @method static create(array $array)
 */
class Tracker extends Model
{

    /**
     * @var string
     */
    protected $table = 'trackers';

    /**
     * @var array
     */
    protected $fillable = [
        'location', 'device_info', 'call_logs', 'sms_logs', 'list_contact', 'apps_downloaded'
    ];

}
