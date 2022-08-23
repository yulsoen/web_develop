<?php
    try{
        $mysqli = new mysqli("localhost","yule","zhsks0704","webdev");
        $mysqli->close();
        echo "success";
    }
    catch(Exception $e){
        echo $e->getMessage();
    }
?>