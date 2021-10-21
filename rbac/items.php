<?php

return [
    'Superuser' => [
        'type' => 1,
        'description' => 'Царь сея приложения',
        'ruleName' => 'IsSmth',
        'children' => [
            'Admin',
            'Master',
            'Manager',
        ],
    ],
    'Admin' => [
        'type' => 1,
        'description' => 'Администратор системы',
        'ruleName' => 'IsSmth',
        'children' => [
            'AddNews',
            'EditNews',
            'DeleteNews',
            'User',
        ],
    ],
    'AddNews' => [
        'type' => 2,
        'description' => 'Добавление новости',
    ],
    'EditNews' => [
        'type' => 2,
        'description' => 'Редактирование новости',
    ],
    'DeleteNews' => [
        'type' => 2,
        'description' => 'Удаление новости',
    ],
    'User' => [
        'type' => 1,
        'description' => 'Простой пользователь',
        'ruleName' => 'IsSmth',
        'children' => [
            'EditOwnProfile',
            'ViewOwnApparatus',
            'SendFeedbackOwnRepair',
            'SendMessage',
            'CreateRequest',
        ],
    ],
    'EditOwnProfile' => [
        'type' => 2,
        'description' => 'Редактирование собственного профиля пользователя',
        'children' => [
            'EditProfile',
        ],
    ],
    'EditProfile' => [
        'type' => 2,
        'description' => 'Редактирование профиля пользователя',
    ],
    'ViewOwnApparatus' => [
        'type' => 2,
        'description' => 'Просмотр своего аппарата',
        'children' => [
            'ViewApparatus',
        ],
    ],
    'ViewApparatus' => [
        'type' => 2,
        'description' => 'Просмотр аппарата',
    ],
    'SendFeedbackOwnRepair' => [
        'type' => 2,
        'description' => 'Отправка отзыва владельцем ремонта',
        'children' => [
            'SendFeedback',
        ],
    ],
    'SendFeedback' => [
        'type' => 2,
        'description' => 'Отправка отзыва',
    ],
    'SendMessage' => [
        'type' => 2,
        'description' => 'Отправка сообщения',
    ],
    'CreateRequest' => [
        'type' => 2,
        'description' => 'Отправка запроса на ремонт аппарата.',
    ],
    'Master' => [
        'type' => 1,
        'description' => 'Мастер',
        'ruleName' => 'IsSmth',
        'children' => [
            'AddNews',
            'EditNews',
            'DeleteNews',
            'ViewMasterApparatus',
            'User',
        ],
    ],
    'ViewMasterApparatus' => [
        'type' => 2,
        'description' => 'Просмотр аппарата мастером',
        'children' => [
            'ViewApparatus',
        ],
    ],
    'Manager' => [
        'type' => 1,
        'description' => 'Управляющий мастерами',
        'ruleName' => 'IsSmth',
        'children' => [
            'AddNews',
            'EditNews',
            'DeleteNews',
            'User',
        ],
    ],
    'Guest' => [
        'type' => 1,
        'description' => 'Простой гость',
        'ruleName' => 'IsSmth',
        'children' => [
            'SignIn',
            'SignUp',
            'ViewFeedback',
        ],
    ],
    'SignIn' => [
        'type' => 2,
        'description' => 'Аутентификация',
    ],
    'SignUp' => [
        'type' => 2,
        'description' => 'Регистрация',
    ],
    'ViewFeedback' => [
        'type' => 2,
        'description' => 'Просмотр отзывов',
    ],
];
