<?php
    $title = $_POST['title'];
    $content = $_POST['content'];
    $con = new mysqli("localhost","yule","zhsks0704","webdev");
    $stmt = $con->prepare("INSERT INTO comm(title, content) VALUES(?,?)");
    $stmt->bind_param("ss",$title,$content);
    $stmt->execute();
    $result = $stmt->get_result();
    if(!$result){
        echo "<script> alert('작성 완료 :)'); location.href='main.php'; </script>";
    }
    else{
        echo "FAIL";
    }
    $stmt->close();
    $con->close();
?>