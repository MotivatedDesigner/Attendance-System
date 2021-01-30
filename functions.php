<?php

require_once("./connection.php");

function switchToUserPage($userType)
{
    switch ($userType)
    {
        case 'admin':
            header("location:admin.php");
            break;
        case 'student':
            header("location:student.php");
            break;
        case 'trainer':
            header("location:trainer.php");
            break;
        case 'secretary':
            header("location:secretary.php");
            break;
    }
}

function verifyUser()
{
    $con = connection();
    $stmt = $con->prepare("SELECT COUNT('userName') FROM o1 WHERE userName = ?");
    $stmt->bindParam(1, $_POST["username"], PDO::PARAM_STR);
    $stmt->execute();
    
    if( $stmt->fetchColumn() ) return TRUE;
    return FALSE;
}

function generateString($len)
{
    return bin2hex(random_bytes($len));    
}

function rememberMe($userId)
{
    $identifier = generateString(32);
    $token = generateString(32);

    $con = connection();
    $stmt = $con->prepare( "INSERT rm (userId,identifier,token) VALUES(?,?,?)");
    $stmt->bindParam(3, $userId, $identifier, password_hash($token, PASSWORD_DEFAULT), PDO::PARAM_STR);
    $stmt->execute();

    $expTime = new DateTime("+ 1 week");
    setcookie($userId, $identifier."___".$token, $expTime->getTimestamp());
}

function authUserByUsername()
{
    if( verifyUser() )
    {
        $con = connection();
        $stmt = $con->prepare("SELECT userId,userPass,userType FROM o1 WHERE userName = ?");
        $stmt->bindParam(1, $_POST["username"], PDO::PARAM_STR);
        $stmt->execute();
        $result = $stmt->fetch();

        if( password_verify($_POST["password"], $result["userPass"]) ) 
        {
            // if ( isset($_POST["remember"]) ) 
            //     rememberMe($result["userId"]);

            switchToUserPage($result["userType"]);
            exit();
        }
        else return "Wrong password";
    }
    else return "ur not regestred";
}

?>