<?php

return [
    // string, required, root directory of all source files
    'sourcePath' => __DIR__ . DIRECTORY_SEPARATOR . '..',
    'languages' => ['et'],
    'translator' => 'Yii::t',
    'sort' => false,
    'removeUnused' => true,
    'only' => ['*.php'],
    'except' => [
        '.svn',
        '.git',
        '.gitignore',
        '.gitkeep',
        '.hgignore',
        '.hgkeep',
        '/messages',
        '/vendor', // this will run into memory exhaust for some reason during message generateion
    ],

    'format' => 'php',
    'messagePath' => __DIR__,
    'overwrite' => true,

    'ignoreCategories' => [
        'yii',
    ],
];
