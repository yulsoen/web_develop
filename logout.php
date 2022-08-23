<?php
 session_start();
 $result = session_destroy();

 if($result) {
    echo "<script>alert('로그아웃 됬어용 :)');";
    echo "window.location.replace('main.php');</script>";
 }
?>