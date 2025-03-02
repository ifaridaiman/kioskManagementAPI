<?php

return [
    'billplz' => [
        'url' => env('BILLPLZ_URL', ''),
        'secret' => env('BILLPLZ_SECRET', ''),
        'callback_url' => env('BILLPLZ_CALLBACK_URL', ''),
        'redirect_url' => env('BILLPLZ_REDIRECT_URL', '')
    ]
];
