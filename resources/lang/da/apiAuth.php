<?php

return [

    'failed' => 'Vi kunne ikke finde nogle brugere med dine informationer',
    'throttle' => 'For mange login forsøg. Forsøg igen om :seconds sekunder.',

    'throttle_mail' => [
        'subject' => 'Din konto er blevet midlertidig deaktiveret',
        'heading' => 'Der har været for mange misslykkede login forsøg',
        'body' => 'Din konto er blevet deaktiveret de næste 2 timer',
    ],

    'magic_link_mail' => [
        'subject' => 'Magic login link',
        'heading' => 'Her er dit Magiske login link',
        'body' => 'Du kan benytte dette link til at logge ind på din konto en enkel gang',
        'actionButton' => 'Tryk for at logge ind'
    ],

    'password_reset_mail' => [
        'subject' => 'Nulstilling af adgangskode',
        'heading' => 'Her er dit link til nulstilling af adgangskode',
        'body' => 'Du kan bruge dette link til at nulstille din adgangskode',
        'actionButton' => 'Tryk for at nulstille'
    ],

    'exceptions' => [
        'accountNotFound' => 'Konto blev ikke fundet',
        'magicLinkNotCreated' => 'Magisk link ikke lavet',
        'passwordResetNotCreated' => 'Adgangskode nulstillings link kunne ikke laves',
        'passwordResetInvalid' => 'Adgangskode nulstillings token var ugyldig',
        'tokenNotInvalidated' => 'Din token kunne ikke invalideres',
        'toManyLoginAttempts' => 'Der har været for mange login forsøg',
        'toManyAttemptsToCreateMagicLink' => 'Der har været for mange forsøg på at lave et Magisk link',
        'userNotAuthenticated' => 'Konto blev ikke logget ind.',
        'userNotFound' => 'Konto blev ikke fundet'
    ]
];
