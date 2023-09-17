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
    <meta name="description" content=" <?php echo $args['description']; ?>">
    <link rel="stylesheet" href="/asset/style/<?= $theme ?>.css">
    <script src="/asset/js/script.js" defer></script>
    <title>
        <?php echo $args['pageTitle']; ?>
    </title>
</head>

<body>

    <nav class="bgc-blue m-b-35 d-flex wrap">
        <div class="d-flex align-center">
            <a href="/index.php"><img src="/asset/img/logo.png" alt="Logo" class="w-55 align-center"></a>

            <div class="dis-none">
                <!-- VIEW GESTIONNAIRE -->
                <?php if (isset($_SESSION['user']['idRole']) && ($_SESSION['user']['idRole'] === 10)) : ?>
                    <a href="/ctrl/user/list.php" class="text-deco police-color p-1">Utilisateurs</a>
                <?php endif; ?>

                <!-- SI LOGGÉ OU PAS -->
                <!-- VIEW MEMBRE -->

                <?php if (isset($_SESSION['user'])) { ?>
                    <a href="/ctrl/quiz/list.php" class="text-deco police-color p-1">Quiz</a>
                    <a href="/ctrl/user/score-list.php" class="text-deco police-color p-1">Historique</a>
                    <a href="/ctrl/auth/logout.php" class="text-deco police-color p-1">Logout</a>
                <?php } else { ?>
                    <a href="/ctrl/auth/login-display.php" class="text-deco police-color p-1">Login</a>
                <?php } ?>
            </div>

            <!-- BOUTTON CHANGEMENT DE THEME  -->
            <form action="/ctrl/invert-theme.php">
                <button type="submit" class="button border-ra m-10">Theme</button>
            </form>

            <!-- BAR MENU -->
            <header>
                <div class="menu-btn ">
                    <span class="bar"></span>
                    <span class="bar"></span>
                    <span class="bar"></span>
                </div>
            </header>

            <!-- MENU BURGER  -->
            <div class="header__nav">
                <nav class="navi">
                    <ul class="nav__list">
                        <?php if (isset($_SESSION['user']['idRole']) && ($_SESSION['user']['idRole'] === 10)) : ?>
                            <li class="nav__list_item"><a href="/ctrl/user/list.php" class="text-deco white p-1">Utilisateurs</a></li>
                        <?php endif; ?>
                        <?php if (isset($_SESSION['user'])) { ?>
                            <li class="nav__list_item"><a class="text-deco white p-1" href="/ctrl/quiz/list.php">Quiz</a></li>
                            <li class="nav__list_item"><a class="text-deco white p-1" href="/ctrl/user/score-list.php">Historique</a></li>
                            <li class="nav__list_item"><a class="text-deco white p-1" href="/ctrl/auth/logout.php">Logout</a></li>
                        <?php } else { ?>
                            <li class="nav__list_item"><a href="/ctrl/auth/login-display.php" class="text-deco white p-1">Login</a></li>
                        <?php } ?>
                    </ul>
                </nav>
            </div>

        </div>
    </nav>