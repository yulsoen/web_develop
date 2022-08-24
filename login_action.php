<?php
    session_start();
    $login_id = $_POST['login_id'];
    $login_pw = $_POST['lgoin_pw'];
    $con = new mysqli("localhost","yule","zhsks0704","webdev");
    $sql = "SELECT * FROM login where login_id= ? and login_pw=?";
    $stmt = $con->prepare($sql);
    $stmt->bind_param("ss",$login_id,$login_pw);
    $stmt->execute();
    $result = $stmt->get_result()->fetch_assoc();
    if(!$result){
        $_SESSION['login_id'] = $result['login_id'];
        $_SESSION['login_pw'] = $result['login_pw'];
        echo "<script>alert('로그인 성공 :)');";
        echo "window.location.replace('logsuc.php');</script>";
    }
    else{
       echo "<script>alert('로그인 실패 :(');";
       echo "window.location.replace('logfail.php');</script>";
    }
    $stmt->close();
    $con->close();
?>