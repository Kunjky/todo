<?php

namespace App\Models;

use App\Models\Model;

class Task extends Model
{
    public $table = 'tasks';

    const STATUS_PLANNING = 0;
    const STATUS_DOING = 1;
    const STATUS_COMPLETE = 2;

    const STATUS = [
        self::STATUS_PLANNING,
        self::STATUS_DOING,
        self::STATUS_COMPLETE
    ];
}
