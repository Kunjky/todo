<?php

use App\Models\Task;

return [
    'regex' => [
        'name' => '/.{6,255}/', // 6-255 characters
        'date' => '/^(19|20)\d\d[- \/.](0[1-9]|1[012])[- \/.](0[1-9]|[12][0-9]|3[01])$/', // YYYY-MM-DD
        'task_status' => '/[' . implode('', Task::STATUS) . ']/',
    ]
];
