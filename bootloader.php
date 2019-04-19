<?php

declare (strict_types = 1);

require 'config.php';

define('ROOT_DIR', __DIR__);
define('DB_SCHEMA', 'poopwall_db');
define('DB_TABLE', 'pirmas_suolas');
define('DEBUG', true);

require ROOT_DIR . '/vendor/autoload.php';
require ROOT_DIR . '/core/functions/form.php';
require ROOT_DIR . '/app/functions/form.php';


