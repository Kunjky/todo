<?php

namespace App\Models;

use App\Models\Model;

class Task extends Model
{
    public $table = 'tasks';

    public const STATUS_PLANNING = 0;
    public const STATUS_DOING = 1;
    public const STATUS_COMPLETE = 2;

    public const STATUS = [
        self::STATUS_PLANNING,
        self::STATUS_DOING,
        self::STATUS_COMPLETE
    ];
}
