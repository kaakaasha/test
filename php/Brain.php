<?php
    require 'Connection.php';
    
    //Ввод
    function Inp($conn){

        $Name = $_POST["title"];

        if ($Name <> null){

            $sql = "INSERT INTO information (Nam) VALUES ('$Name')";
            $conn->query($sql);
            mysqli_close($conn);
        }
        header ('Location: ../html/Brain.html');
    }
    Inp($conn);
?>