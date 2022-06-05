<?php
    function login($conn, $username, $password){
        $sql = "SELECT * FROM `users` WHERE `username`= '$username'";
        $query = mysqli_query($conn, $sql);

        return $query;
    }

    function newPlayerAdult($conn, $pId, $Name, $age, $role, $imgsrc){
        $sql = "INSERT INTO `players`
        VALUES ('$pId','$Name','1','0','$age','$role','$imgsrc');";
        
        if (mysqli_query($conn, $sql)) {
            unset($_POST);
            
            echo '<script>alert("שחקן חדש הוסף")</script>';
        } else {
            echo "Error: " . $sql . "<br>" . mysqli_error($conn);
        }
    }   

    function deletePlayer($conn, $pId){
        $sql = "DELETE FROM `players` WHERE `pId`=$pId";
        
        if (mysqli_query($conn, $sql)) {
            unset($_POST);
            
            echo '<script>alert("שחקן נמחק")</script>';
        } else {
            echo "Error: " . $sql . "<br>" . mysqli_error($conn);
        }
    } 

?>



