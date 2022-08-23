<?php
    $login_id=$_POST['login_id'];
    $login_pw=$_POST['login_pw'];
    $con = new mysqli("localhost","yule","zhsks0704","webdev");
    $stmt = $con->prepare("INSERT INTO login(login_id,login_pw) VALUES(?,?)");
    $stmt->bind_param("ss",$login_id,$login_pw);
    $stmt->execute();
    $result = $stmt->get_result();
    if(!$result){
        echo "<script> alert('회원가입 완료 :)'); location.href='newsucces.php'; </script>";
    }
    else{
    echo "<script> alert('회원가입 실패 :('); location.href='newfail.php'; </script>";
    }
    $stmt->close();
    $con->close();
?>