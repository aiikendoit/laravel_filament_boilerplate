<?php

return [
    'show_custom_fields' => true,
    ' custom_fields' => [
        'github' => [
            'type' => 'text',
            ' labell' => 'GitHub username',
            ' placeholder' => '',
            ' rules' => 'nullable Istring Imax: 255',
            'required' => false,
        ],

        'twitter' => [
            'type' => 'text',
            ' label ' => 'Twitter username',
            ' placeholder' => '',
            ' rules' => 'nullablelstring Imax: 255',
            ' required' => false,
        ],
    ],
];
