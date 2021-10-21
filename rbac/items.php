<?php

return [
    'Superuser' => [
        'type' => 1,
        'description' => 'Царь сея приложения',
        'children' => [
            'Admin',
            'Master',
            'Manager',
        ],
    ],
    'Admin' => [
        'type' => 1,
        'description' => 'Администратор системы',
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
        'children' => [
            'EditOwnProfile',
            'ViewOwnApparatus',
            'SendFeedbackOwnRepair',
            'SendMessage',
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
        'ruleName' => 'OwnApparatus',
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
    'Master' => [
        'type' => 1,
        'description' => 'Мастер',
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
