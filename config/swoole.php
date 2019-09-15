<?php

return [
    'class'=>'tsingsun\swoole\server\HttpServer',
    'setting' => [
        'daemonize'=>0,
        'reactor_num'=>1,
        'worker_num'=>1,
        'task_worker_num' => 2,
        'max_coro_num' => 3000,
        'enable_coroutine' => true,
        'pid_file' => __DIR__ . '/../runtime/http.pid',
        'log_file' => __DIR__.'/../runtime/logs/swoole.log',
        'debug_mode'=> 1,
        //'user'=>'tsingsun',
        //'group'=>'staff',
    ],
];