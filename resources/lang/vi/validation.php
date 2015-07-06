<?php

return [

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
        'name' => [
            'required' => 'Vui lòng nhập tên',
        ],
        'email' => [
            'required' => 'Vui lòng nhập email',
            'email'    => 'Email của bạn chưa đúng',
            'unique'   => 'Email này đã được sử dụng, vui lòng nhập email khác',
        ],
        'identity_number' => [
            'required' => 'Vui lòng nhập CMND',
            'numeric'  => 'CMND chỉ được nhập số',
            'unique'   => 'CMND này đã được sử dụng, vui lòng nhập CMND khác',
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
