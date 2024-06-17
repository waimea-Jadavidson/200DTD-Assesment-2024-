<?php require_once '_config.php'; ?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title><?= SITE_NAME ?></title>

    <link rel="stylesheet" href="styles.css"/>
</head>

<body>

    <header>
        <img src=<?= HEADER_PIC ?> alt="Logo">
        <h1><?= HEADER ?></h1>

        <nav>
            <a href="admin.php" class="<?= $page=='admin.php' ? 'active' : '' ?>">Admin</a>
        </nav>
    </header>

    <main>