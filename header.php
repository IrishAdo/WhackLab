<?php require_once('init.php'); ?>
<!DOCTYPE html>
<html>
<head>
    <title>WhackLab v0.0.1</title>
    <link rel="shortcut icon" type="image/x-icon" href="favicon.ico">
    <link rel="stylesheet" href="assets/css/style.css">
</head>
<body>
    <header id="top">
        <h1>WhackLab v0.0.1</h1>
        <span class="label"><a href="?toggle=security">Security Level:</a></span> <?php echo $securityLevel; ?>
        <span class="label">
            <?php if ($securityLevel <= 1): ?>
            <a href="?toggle=hints">Hints:</a>
            <?php else: ?>
            Hints:
            <?php endif; ?>
        </span>
        <?php echo $hintLevel; ?>
        <div class="user-box">
            <?php if (!$user->isLoggedIn()): ?>
            <a href="login.php">Login</a> |
            <a href="register.php">Register</a>
            <?php else: ?>
            <strong>Welcome back, <?php echo $user->realname; ?>!</strong>
            <?php endif; ?>
        </div>
    </header>
    <section id="middle">
        <?php include('sidebar.php'); ?>
        <div id="content">