<?php
	$conn = mysqli_connect("localhost","root", "", "Zak");
        if($conn->connect_error){
            die("Ошибка: " . $conn->connect_error);
        }
    $conn->set_charset('utf8');
?>