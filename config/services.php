
<?php

return [
    /*
    |--------------------------------------------------------------------------
    | Third Party Services
    |--------------------------------------------------------------------------
    |
    | This file is for storing the credentials for third party services such
    | as Mailgun, Postmark, AWS and more. This file provides the de facto
    | location for this type of information, allowing packages to have
    | a conventional file to locate the various service credentials.
    |
    */

    'mailgun' => [
        'domain' => env('MAILGUN_DOMAIN'),
        'secret' => env('MAILGUN_SECRET'),
        'endpoint' => env('MAILGUN_ENDPOINT', 'api.mailgun.net'),
        'scheme' => 'https',
    ],

    'postmark' => [
        'token' => env('POSTMARK_TOKEN'),
    ],

    'ses' => [
        'key' => env('AWS_ACCESS_KEY_ID'),
        'secret' => env('AWS_SECRET_ACCESS_KEY'),
        'region' => env('AWS_DEFAULT_REGION', 'us-east-1'),
    ],

    'google' => [
        'client_id'     => env('GOOGLE_CLIENT_ID'),
        'client_secret' => env('GOOGLE_CLIENT_SECRET'),
        'redirect'      => env('APP_URL').'auth/google/callback',
    ],

    'facebook' => [
        'client_id' => env('FACEBOOK_CLIENT_ID'),
        'client_secret' => env('FACEBOOK_CLIENT_SECRET'),
        'redirect' => env('APP_URL').'auth/facebook/callback',
    ],

    // 'twitter' => [
    //     'client_id' => env('TWITTER_CLIENT_ID'),
    //     'client_secret' => env('TWITTER_CLIENT_SECRET'),
    //     'redirect' => 'http://localhost:8000/auth/twitter/callback',
    // ],

    'razorpay' => [
        'key' => 'rzp_test_ImnZdPCDKBmCSP',
        'secret' => 'vTX48Qk4Idt5gc49386hu3Ra'
    ],
    
    'stripe' => [
        'key' => 'pk_test_51LJX8FSEPnfSjpsWa2KgzxFuk0i4inCFJvbFrx96EEaEl9RV7lw3UP0q5JSoVwsooAbtDKf67xwo4ErkRZ2kbR2400ohpvqobG',
        'secret' => 'sk_test_51LJX8FSEPnfSjpsW8odoNKmbHfWkTZbJhoNp3szgE5SyyFuK9h0JIhf33sgHXcsQL13mq4gM7hM5c7stit7sD3jQ00Ckh57Pc5',
    ],
    
    'paypal' => [
        'key' => 'AaOFHm9cvyu_v8w-gRkli4cfh5ltjx7zjeC9BOOv8Q9Wd4uEEAhOesCFB0thnCV-eiX0AqCHDbWjrSJi',
        'secret' => 'EAkWlkraPbYJOqLofZ6ZUxEHBIgrAcDLCiKvQeWtICNkiQsPjrYjucqKC2yeUN4em-svKeH8m7JRq5uy',
    ],
];
