<?php
$theme = 'style';
if (isset($_COOKIE['prefer-inverted-theme'])) {
    $theme .= '-inverted';
}

?>


<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/asset/style/<?= $theme ?>.css">
    <title> 
        <?php if (isset($args)) {
            echo $args['pageTitle'];
        } else {
            echo $pageTitle;
        } ?>
    </title>
</head>
<body>
    <header>
        <nav class="bgc-blue m-b-35 d-flex sp-bet">
            <div id="menu">
                <div class="d-flex jc-end">
                    <a href="../index.php"><img src="/asset/img/logo.png" alt="Logo" class="w-55 align-center"></a>
                    
                    <!-- SI LOGGÉ OU PAS -->
                    <?php if (isset($_SESSION['utilisateur_id'])) { ?>
                        <a href="/ctrl/quiz/list.php" class="text-deco police-color p-1">Quiz</a>
                        <a href="/ctrl/quiz/ranked.php" class="text-deco police-color p-1">Classement</a>
                        <a href="/ctrl/user/list.php" class="text-deco police-color p-1">Utilisateurs</a>
                        <a href="/ctrl/auth/logout.php" class="text-deco police-color p-1">Logout</a>
                    <?php } else { ?>
                        <a href="/ctrl/auth/login-display.php" class="text-deco police-color p-1">Login</a>
                    <?php } ?>

                    <!-- BOUTTON THEME SOMBRE -->
                    <form action="/ctrl/invert-theme.php">
                        <button type="submit" class="button border-ra m-10">Theme</button>
                    </form>

                </div>
            </div>
        </nav>
    </header>