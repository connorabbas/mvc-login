<?php
class user{

    protected $db;

    public function __construct($db){
        $this->db = $db;
    }

    function createUser($name, $email, $userName, $password){
        $hashedPwd = password_hash($password, PASSWORD_DEFAULT);
        $sql = "INSERT INTO users(userName, userEmail, userUID, userPwd) VALUES('".$name."','".$email."','".$userName."','".$hashedPwd."');";
        $resultSQL = $this->db->query($sql);
    }

    function emptyInputSignUp($name, $email, $userName, $pwd, $pwdR){
        $result;
        if(empty($name) || empty($email) || empty($userName) || empty($pwd) || empty($pwdR)){
            $result = true;
        } else{
            $result = false;
        }
        return $result;
    }

    function invalidUID($userName){
        $result;
        if(!preg_match('/^[a-zA-Z0-9]*$/', $userName)){
            $result = true;
        } else{
            $result = false;
        }
        return $result;
    }

    function invalidEmail($email){
        $result;
        if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
            $result = true;
        } else{
            $result = false;
        }
        return $result;
    }

    function pwdMatch($pwd, $pwdR){
        $result;
        if($pwd !== $pwdR){
            $result = true;
        } else{
            $result = false;
        }
        return $result;
    }

    function uIDExists($userName, $email){
        $sql = "SELECT * FROM users WHERE userUID = '".$userName."' OR userEmail = '".$email."';";
        $resultSQL = $this->db->query($sql);

        if($row = $this->db->fetchArray($resultSQL)){
            return $row;
        } else{
            $result = false;
            return $result;
        }
    }

    function emptyInputLogin($userName, $pwd){
        $result;
        if(empty($userName) || empty($pwd)){
            $result = true;
        } else{
            $result = false;
        }
        return $result;
    }

    function loginUser($userName, $pwd){
        $uidExists = $this->uIDExists($userName, $userName);
        if($uidExists == false){
            header("location: /mvc-login/login/?error=invalidUID");
            exit();
        }

        $pwdHashed = $uidExists['userPwd'];
        $checkPwd = password_verify($pwd, $pwdHashed);

        if($checkPwd == false){
            header("location: /mvc-login/login/?error=wrongPWD");
            exit();
        }
        else if($checkPwd == true){
            session_start();
            $_SESSION['userid'] = $uidExists['userID'];
            $_SESSION['useruid'] = $uidExists['userUID'];

            header("location: /mvc-login/?loggedIn=true");
            exit();
        }
    }
    


}
?>