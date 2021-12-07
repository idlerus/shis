<?php

return [
        'custom' => [
            'name' => [
                'required' => 'Uživatelské jméno není vyplněno',
                'max' => 'Uživatelské jméno je moc dlouhé'
            ],
            'password' => [
                'required' => 'Heslo není vyplněno',
                'min' => 'Heslo je moc krátké',
                'confirmed' => 'Hesla se neshodují',
                'regex' => 'Heslo není dostatečně bezpečné'
            ],
            'email' => [
                'required' => 'E-mail není vyplněn',
                'max' => 'E-mail je moc dlouhý!',
                'email' => 'E-mail není platný'
            ],
            'agree' => [
                'required' => 'Je potřeba souhlasit s podmínkami'
            ]
        ],
    ];
