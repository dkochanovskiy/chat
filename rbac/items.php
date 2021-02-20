<?php

return [
    'createPost' => [
        'type' => 2,
        'description' => 'Create a post',
    ],
    'adminPerm' => [
        'type' => 2,
        'description' => 'Administrator permission',
    ],
    'user' => [
        'type' => 1,
        'children' => [
            'createPost',
        ],
    ],
    'admin' => [
        'type' => 1,
        'children' => [
            'adminPerm',
            'user',
        ],
    ],
    'updatePost' => [
        'type' => 2,
        'description' => 'Update post',
    ],
    'readUser' => [
        'type' => 2,
        'description' => 'Read user',
    ],
    'roleChange' => [
        'type' => 2,
        'description' => 'Role change',
    ],
    'markIncorrect' => [
        'type' => 2,
        'description' => 'Mark as incorrect',
    ],
    'markCorrect' => [
        'type' => 2,
        'description' => 'Mark as correct',
    ],
    'readIncorrect' => [
        'type' => 2,
        'description' => 'Read as incorrect',
    ],
];
