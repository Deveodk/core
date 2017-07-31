<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Validation Language Lines
    |--------------------------------------------------------------------------
    |
    | The following language lines contain the default error messages used by
    | the validator class. Some of these rules have multiple versions such
    | as the size rules. Feel free to tweak each of these messages here.
    |
    */

    "accepted"         => ":attribute skal være accepteret.",
    "active_url"       => ":attribute er ikke en gyldig URL.",
    "after"            => ":attribute skal være en dato efter :date.",
    "alpha"            => ":attribute må kun indeholde bogstaver.",
    "alpha_dash"       => ":attribute må kun indeholde bogstaver, tal og bindestreger.",
    "alpha_num"        => ":attribute må kun indeholde bogstaver og tal.",
    "array"            => ":attribute skal være en tabel.",
    "before"           => ":attribute skal være en dato før :date.",
    "between"          => [
        "numeric" => ":attribute skal være mellem :min - :max.",
        "file"    => ":attribute skal være mellem :min - :max kilobytes.",
        "string"  => ":attribute skal være mellem :min - :max characters.",
        "array"   => ":attribute skal have mellem :min - :max poster.",
    ],
    "confirmed"        => ":attribute bekræftelsen stemmer ikke overens.",
    "date"             => ":attribute er ikke en gyldig dato.",
    "date_format"      => ":attribute overholder ikke formatet :format.",
    "different"        => ":attribute og :other skal være forskellige.",
    "digits"           => ":attribute skal være :digits cifre.",
    "digits_between"   => ":attribute skal være mellem :min og :max cifre.",
    "email"            => ":attribute formatet er ikke gyldigt.",
    "exists"           => "Den gamle :attribute er ugyldig.",
    "image"            => ":attribute skal være et billede.",
    "in"               => ":attribute er ugyldig.",
    "integer"          => ":attribute skal være et heltal.",
    "ip"               => ":attribute skal være en gyldig IP-adresse.",
    "max"              => [
        "numeric" => ":attribute må ikke være større end :max.",
        "file"    => ":attribute må ikke være større end :max kilobytes.",
        "string"  => ":attribute må ikke være længere end :max karaktere.",
        "array"   => ":attribute må ikke have mere end :max poster.",
    ],
    "mimes"            => ":attribute skal være af filtypen: :values.",
    "min"              => [
        "numeric" => ":attribute skal være mindst :min.",
        "file"    => ":attribute skal være mindst :min kilobytes.",
        "string"  => ":attribute skal mindst være :min karaktere.",
        "array"   => ":attribute skal have mindst :min poster.",
    ],
    "not_in"           => "Den valgte :attribute er ugyldig.",
    "numeric"          => ":attribute skal være et tal.",
    "regex"            => ":attribute formatet er ugyldigt.",
    "required"         => "Feltet :attribute er påkrævet.",
    "required_if"      => ":attribute feltet er påkrævet når :other er :value.",
    "required_with"    => ":attribute feltet er påkrævet når :values er tilstede.",
    "required_without" => ":attribute feltet er påkrævet når :values ikke er tilstede.",
    "same"             => ":attribute og :other skal være ens.",
    "size"             => [
        "numeric" => ":attribute skal være :size.",
        "file"    => ":attribute skal være :size kilobytes.",
        "string"  => ":attribute skal være :size karaktere.",
        "array"   => ":attribute skal indeholde :size poster.",
    ],
    "unique"           => ":attribute er optaget.",
    "url"              => "Formatet for :attribute er ugyldigt.",


    /*
    |--------------------------------------------------------------------------
    | Custom Validation Language Lines
    |--------------------------------------------------------------------------
    |
    | Here you may specify custom validation messages for attributes using the
    | convention "attribute.rule" to name the lines. This makes it quick to
    | specify a specific custom language line for a given attribute rule.
    |
    */

    'custom' => [
        'attribute-name' => [
            'rule-name' => 'custom-message',
        ],
    ],

    /*
    |--------------------------------------------------------------------------
    | Custom Validation Attributes
    |--------------------------------------------------------------------------
    |
    | The following language lines are used to swap attribute place-holders
    | with something more reader friendly such as E-Mail Address instead
    | of "email". This simply helps us make messages a little cleaner.
    |
    */

    'attributes' => [],

];
