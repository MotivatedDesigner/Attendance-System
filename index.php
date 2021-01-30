<?php

require_once("./functions.php");

$msg = "";

if (isset($_POST["login"])) 
{
    if ( empty($_POST["username"]) || empty($_POST["password"]) ) {
        $msg = "Both feilds are required";
    } 
    else 
    {
        $msg = authUserByUsername();
        // if (!empty($result)) 
        // {
        //     if (password_verify($_POST["password"], $result["userPass"])) 
        //     {

        //             if () 
        //             {
                        
        //                 // $expiry = new DateTime("+1 day");
        //                 // setcookie("omma","koko",$expiry->getTimestamp());
        //             }
        //         header("location:admin.php");
        //         exit();
        //     } 
        // } 
    }
}

//     if( isset($_POST['login']) )
//     {
//         $con = new mysqli("localhost","root","olloommoLM","oo");
//         if( empty($_POST['username']) || empty($_POST['password']) )
//         {
//             $msg = "empty";
//         }
//         else {
//             $username = $_POST['username'];
//             $password = $_POST['password'];
//             $hash = password_hash($password, PASSWORD_DEFAULT);
//             $con->query("INSERT  INTO o1 (username,userPass,userType) VALUES ('$username','$hash','secretary') ");
//         }
// }
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