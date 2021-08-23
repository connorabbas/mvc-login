<?php
require '../../accessDB.php';
include '../../app/model/user.class.php';
$user = new user($db);

if(isset($_POST['signUpSubmit'])){
    $name = $_POST['name'];
    $username = $_POST['username'];
    $email = $_POST['email'];
    $pwd = $_POST['password'];
    $pwdR = $_POST['passwordR'];

    if($user->emptyInputSignUp($name, $email, $username, $pwd, $pwdR) !== false){
        header("location: /mvc-login/sign-up/?error=emptyInputSignUp");
        exit();
    }
    if($user->invalidUID($username) !== false){
        header("location: /mvc-login/sign-up/?error=invalidUID");
        exit();
    }
    if($user->pwdMatch($pwd, $pwdR) !== false){
        header("location: /mvc-login/sign-up/?error=pwdMatch");
        exit();
    }
    if($user->uIDExists($username, $email) !== false){
        header("location: /mvc-login/sign-up/?error=uIDExists");
        exit();
    }
    
    $user->createUser($name, $email, $username, $pwd);
    header("location: /mvc-login/sign-up/?created=true");
    exit();

} 
if(isset($_POST['loginSubmit'])){
    $username = $_POST['username'];
    $pwd = $_POST['password'];

    if($user->emptyInputLogin($username, $pwd) !== false){
        header("location: /mvc-login/sign-up/?error=emptyInputLogin");
        exit();
    }

    $user->loginUser($username, $pwd);
}
if(isset($_POST['checkLoginVal'])){
    $val = $_POST['checkLoginVal'];
    if($user->uIDExists($val, $val) !== false){
        echo json_encode('true');
    } else {
        echo json_encode('false');
    }
}
else{
    header("location: /mvc-login/sign-up/");
    exit();
}
?>