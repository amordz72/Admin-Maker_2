<?php

return [

    'title' => 'Login',

    'heading' => 'Sign in to your account',

    'buttons' => [

        'submit' => [
            'label' => 'Sign in',
        ],

    ],

    'fields' => [

        'email' => [
            'label' => 'Indirizzo Email',
        ],

        'password' => [
            'label' => 'Password',
        ],

        'remember' => [
            'label' => 'Ricordami',
        ],

    ],

    'messages' => [
        'failed' => 'I tuoi dati di accesso non sono corretti.',
        'throttled' => 'Troppi tentativi di accesso. Riprova tra :seconds secondi.',
    ],

];
