<?php
require_once __DIR__ . '/../../src/controllers/UserController2.php';
require_once __DIR__ . '/../../config/Database.php';
require_once __DIR__ . '/../../src/controllers/UserRegController.php';?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body, html {
            height: 100%;
            display: flex;
            align-items: center;
            justify-content: center;
        }
        .card {
            width: 100%;
            max-width: 400px;
        }
    </style>
</head>
<body>
    <div class="card p-4">
        <form method="POST" action="">
            <div class="form-group<?= !empty($errors['username']) ? ' has-error' : '' ?>">
                <input type="text" class="form-control" id="username" name="username" value="<?= htmlspecialchars($input['username'] ?? '') ?>" placeholder="Enter username">
                <?php if (!empty($errors['username'])): ?>
                    <span class="help-block"><?= htmlspecialchars($errors['username']) ?></span>
                <?php endif; ?>
            </div>
            
            <div class="form-group<?= !empty($errors['password']) ? ' has-error' : '' ?>">
                <input type="password" class="form-control" id="password" name="password" placeholder="Enter password">
                <?php if (!empty($errors['password'])): ?>
                    <span class="help-block"><?= htmlspecialchars($errors['password']) ?></span>
                <?php endif; ?>
            </div>

            <button type="submit" class="btn btn-primary btn-block loginbutton" name="submit">Login</button>
        </form>
    </div>
</body>
</html>