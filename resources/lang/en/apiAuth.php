<?php

return [

    'failed' => 'These credentials do not match our records.',
    'throttle' => 'Too many login attempts. Please try again in :seconds seconds.',

    'throttle_mail' => [
        'subject' => 'Your account have been disabled',
        'heading' => 'There have been to many login attempts',
        'body' => 'Your account have been deactivated the next two hours',
    ],

    'magic_link_mail' => [
        'subject' => 'Magic login link',
        'heading' => 'Here is your magic login link',
        'body' => 'you can use this link to login to your account.',
        'actionButton' => 'press to login'
    ],

    'password_reset_mail' => [
        'subject' => 'Password reset link',
        'heading' => 'Here is your password reset link',
        'body' => 'You can use this link to change your password.',
        'actionButton' => 'press to reset'
    ],

    'exceptions' => [
        'accountNotFound' => 'Account was not found',
        'magicLinkNotCreated' => 'Magic link was not created',
        'passwordResetNotCreated' => 'Password reset not created',
        'passwordResetInvalid' => 'Password reset token was invalid',
        'tokenNotInvalidated' => 'The token was not invalidated',
        'toManyLoginAttempts' => 'There have been to many login attempts',
        'toManyAttemptsToCreateMagicLink' => 'There have been to many attempts to generate the magic link',
        'userNotAuthenticated' => 'User was not authenticated.',
        'userNotFound' => 'User was not found'
    ]
];
