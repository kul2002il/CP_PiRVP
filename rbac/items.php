<?php

return [
    'AddNews' => [
        'type' => 2,
        'description' => 'Добавление новости',
    ],
    'Admin' => [
        'type' => 1,
        'description' => 'Главный администратор',
        'children' => [
            'AddNews',
            'EditNews',
            'DeleteNews',
        ],
    ],
    'EditNews' => [
        'type' => 2,
        'description' => 'Редактирование новости',
    ],
    'DeleteNews' => [
        'type' => 2,
        'description' => 'Удаление новости',
    ],
];
