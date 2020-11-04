<?php
session_start();
if(!empty($_SESSION['login_name'])) {
    $loginName = $_SESSION['login_name'];
}

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['log_out']) && !empty($_POST)) {
        session_destroy();
        header("Location: index.php");
}

if (!empty($_GET['add_to_cart'])) {
    $_SESSION['id_cookies_added_to_cart'][] = $_GET['add_to_cart'];
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>The Cookie Factory</title>
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css"
          integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css?family=Kaushan+Script" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="assets/styles.css"/>
</head>
<body>
<header>
    <!-- MENU ENTETE -->
    <nav class="navbar navbar-default navbar-fixed-top">
        <div class="container-fluid">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse"
                        data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="/">
                    <img class="pull-left" src="assets/img/cookie_funny_clipart.png" alt="The Cookies Factory logo">
                    <h1>The Cookies Factory</h1>
                </a>
            </div>

            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav navbar-right">
                    <li><a href="#">Chocolates chips</a></li>
                    <li><a href="#">Nuts</a></li>
                    <li><a href="#">Gluten full</a></li>
                    <?php if (isset($loginName)): ?>
                    <li>
                        <form method="post" action="/index.php">
                            <input type="hidden" name="log_out" />
                            <button class="btn btn-success navbar-btn"
                            type="submit" name="btn_log_out">Se déconnecter</button>
                        </form>
                    </li>
                    <?php else : ?>
                        <li><a href="/login.php">login</a></li>
                    <?php endif; ?>
                    <li>
                        <a href=" <?php if (!isset($loginName)): ?> /login.php <?php else : ?>/cart.php <?php endif; ?>"
                           class="btn btn-warning navbar-btn">
                            <span class="glyphicon glyphicon-shopping-cart" aria-hidden="true"></span>
                            Cart
                        </a>
                    </li>
                </ul>
            </div><!-- /.navbar-collapse -->
        </div><!-- /.container-fluid -->
    </nav>
    <div class="container-fluid text-right">
        <?php if (isset($loginName)): ?>
        <strong>Hello <?= $loginName ?></strong>
        <?php else : ?>
        <strong>Hello Wilder !</strong>
        <?php endif; ?>
    </div>
</header>
