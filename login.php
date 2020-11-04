<?php

require 'inc/head.php';

function cleanInput(string $str): ?string
{
    if($str === "") return null;
    $str = trim($str);
    $str = stripslashes($str);
    $str =  htmlspecialchars($str);
    return $str;
}

if (isset($loginName)) {
    header("Location: index.php");
}

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['btn-signin']) && !empty($_POST)) {
    $userName = cleanInput($_POST['login_name']);
    if(empty($userName)) {
        echo "un nom d'utilisateur est requis";
    }
    else {
        $_SESSION['login_name'] = $userName;
        header("Location: index.php");
    }
}

?>



<div class="container" style="margin-top:40px">
    <div class="row">
        <div class="col-sm-6 col-md-4 col-md-offset-4">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <strong> Sign in to continue</strong>
                </div>
                <div class="panel-body">
                    <form role="form" action="/login.php" method="POST">
                        <fieldset>
                            <div class="row">
                                <div class="center-block">
                                    <img class="profile-img"
                                         src="https://lh5.googleusercontent.com/-b0-k99FZlyE/AAAAAAAAAAI/AAAAAAAAAAA/eu7opA4byxI/photo.jpg?sz=120"
                                         alt="">
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-12 col-md-10  col-md-offset-1 ">
                                    <div class="form-group">
                                        <div class="input-group">
                                            <span class="input-group-addon">
                                              <i class="glyphicon glyphicon-user"></i>
                                            </span>
                                            <input class="form-control" placeholder="Username" name="login_name"
                                                   type="text" autofocus>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <input name="btn-signin" type="submit" class="btn btn-lg btn-primary btn-block"
                                           value="Sign in">
                                    </div>
                                </div>
                            </div>
                        </fieldset>
                    </form>
                </div>
                <div class="panel-footer ">
                    Don't have an account ? <a href="#" onClick="">Too bad !</a>
                </div>
            </div>
        </div>
    </div>
</div>
<?php require 'inc/foot.php'; ?>
