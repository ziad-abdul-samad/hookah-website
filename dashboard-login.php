<?php
declare(strict_types=1);

require __DIR__ . '/_bootstrap.php';

if (is_admin_logged_in()) {
    redirect('dashboard.php');
}

$pageTitle = app_name() . ' | Dashboard Login';
$flash = pull_flash();
$errors = [];
$username = 'admin';

if (is_post()) {
    ensure_csrf_or_abort();

    $username = trim((string) ($_POST['username'] ?? ''));
    $password = (string) ($_POST['password'] ?? '');

    if ($username === '' || $password === '') {
        $errors[] = 'Username and password are required.';
    } elseif (!attempt_admin_login($username, $password)) {
        $errors[] = 'The provided login credentials are invalid.';
    } else {
        login_admin($username);
        set_flash('success', 'Welcome back to the dashboard.');
        redirect('dashboard.php');
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= e($pageTitle) ?></title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Cormorant+Garamond:wght@500;600;700&family=Manrope:wght@400;500;600;700;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="app.css">
</head>
<body>
    <main class="login-shell">
        <section class="login-card">
            <span class="eyebrow">Admin Access</span>
            <h1>Dashboard Login</h1>
            <p class="lead">Use the credentials requested for this project to manage sections, products, prices, descriptions, and product galleries.</p>

            <?php if ($flash): ?>
                <div class="flash flash--<?= e($flash['type']) ?>" style="margin-top:1rem;"><?= e($flash['message']) ?></div>
            <?php endif; ?>

            <?php foreach ($errors as $error): ?>
                <div class="flash flash--error" style="margin-top:1rem;"><?= e($error) ?></div>
            <?php endforeach; ?>

            <form method="post" style="margin-top:1.5rem;">
                <?= csrf_input() ?>
                <div class="field">
                    <label for="username">Username</label>
                    <input id="username" name="username" type="text" value="<?= e($username) ?>" required>
                </div>

                <div class="field" style="margin-top:1rem;">
                    <label for="password">Password</label>
                    <input id="password" name="password" type="password" value="123" required>
                </div>

                <div class="toolbar-actions" style="margin-top:1.5rem;">
                    <button class="button button-primary" type="submit">Login</button>
                    <a class="button button-secondary" href="index.php">Back to Storefront</a>
                </div>
            </form>
        </section>
    </main>
</body>
</html>
