<?php

function validate_select_option($field_input, &$field, &$safe_input) {
    if (array_key_exists($field_input, $field['options'])) {
        return true;
    } else {
        $field['error_msg'] = strtr('Jobans/a tu buhurs/gazele, '
                . 'nes @field yra neteisingas', ['@field' => $field['label']
        ]);
    }
}

function validate_coordinate($field_input, &$field, &$safe_input) {
    if ($field_input >= 0 && $field_input < 500) {
        return true;
    } else {
        $field['error_msg'] = 'Drauguzi, kordinate negali but mazesne uz 0 arba didesne uz 500!';
    }
}
