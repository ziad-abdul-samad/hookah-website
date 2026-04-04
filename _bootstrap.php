<?php
declare(strict_types=1);

if (session_status() !== PHP_SESSION_ACTIVE) {
    session_start();
}

date_default_timezone_set('Asia/Damascus');

$GLOBALS['config'] = require __DIR__ . '/config.php';

require_once __DIR__ . '/_helpers.php';
require_once __DIR__ . '/_database.php';
require_once __DIR__ . '/_auth.php';
require_once __DIR__ . '/_uploads.php';
require_once __DIR__ . '/_store.php';
