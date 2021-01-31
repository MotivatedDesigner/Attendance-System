<?php

    require_once "./db/conn.php";

    if( isset($_POST['login']) )
    {
        var_dump( $crud->verifyUser() );
    }

?>

<!doctype html>
<html lang="en">
<!-- Required meta tags -->
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">

<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">

<title>Hello, world!</title>
<h1>Hello, world!</h1>

<?php if ($msg != "") echo "<labe> . $msg . </labe>"; ?>
<div class="container">
    <form class="form col-lg-6 offset-lg-3" method="POST" action="index.php">
        <div class="form-group">
            <input class="form-control" type="text" name="username" placeholder="Username"><br>
            <input class="form-control" type="password" name="password" placeholder="Password"><br>
            <input type="checkbox" name="remember" checked>
            <input class="btn btn-primary" type="submit" name="login">
        </div>
    </form>
</div>

</html>