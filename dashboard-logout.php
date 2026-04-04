<?php
declare(strict_types=1);

require __DIR__ . '/_bootstrap.php';

logout_admin();
set_flash('success', 'You have been logged out.');
redirect('dashboard-login.php');
