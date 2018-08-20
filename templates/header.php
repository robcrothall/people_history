<!DOCTYPE html>

<html>

    <head>
        <meta charset="utf-8"/>
        
        <link href="css/bootstrap.min.css" rel="stylesheet"/>
        <link href="css/bootstrap-theme.min.css" rel="stylesheet"/>
        <link href="css/styles.css" rel="stylesheet"/>

        <?php if (isset($title)): ?>
            <title>Kowie Museum: <?= htmlspecialchars($title) ?></title>
        <?php else: ?>
            <title>Kowie Museum</title>
        <?php endif ?>

        <script src="js/jquery-1.10.2.min.js"></script>
        <script src="js/bootstrap.min.js"></script>
        <script src="js/scripts.js"></script>

    </head>

    <body>

        <div class="container">

            <div id="top">
                <a href="/"><img alt="Kowie Museum People History" src="img/logo.gif"/></a>
				<?php
    				require("../templates/menu.php");
				?>
            </div>

            <div id="middle">
