<?php 
return [
    'thumbnails' => [
        'prefix'      => 't',
        'longPrefix'  => 'thumbs',
        'description' => 'Create thumbnails for processed images',
        'noValue'     => true
    ],
    'open' => [
        'prefix'      => 'o',
        'longPrefix'  => 'open',
        'description' => 'Open new folder once process completed',
        'noValue'     => true
    ],
    'force' => [
        'prefix'      => 'f',
        'longPrefix'  => 'force',
        'description' => 'Forces image process renders if folder already exists',
        'noValue'     => true
    ],
    'stats' => [
        'prefix'      => 's',
        'longPrefix'  => 'stats',
        'description' => 'Statistics of conversions e.g. file size',
        'noValue'     => true
    ],
    'folder' => [
        'prefix'      => 'f',
        'longPrefix'  => 'folder',
        'description' => 'Name of folder images will go in'
    ],
    'quality' => [
        'prefix'       => 'q',
        'longPrefix'   => 'quality',
        'description'  => 'Quality',
        'defaultValue' => '100'
    ]
];
?>
