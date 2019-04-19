<?php

function validate_field_select($field_input, &$field, &$safe_input) {
    if (array_key_exists($field_input, $field['options'])) {
        return true;
    } else {
        $field['error_msg'] = strtr('Jobans/a tu buhurs/gazele, '
                . 'nes @field yra neteisingas', ['@field' => $field['label']
        ]);
    }
}

function validate_coordinate($field_input, &$field, &$safe_input) {

    $color = $field_input;
    if ($color >= 0 && $color < 500) {
        return true;
    } else {
        $field['error_msg'] = strtr('Drauguzi, '
                . '@field negali but mazesnis uz 0 arba didesnis uz 500!', ['@field' => $field['label']
        ]);
    }
}
