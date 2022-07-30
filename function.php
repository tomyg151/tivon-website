<?php
    // sending query to db and fetching the result for Login.
    function login($conn, $username, $password){
        $sql = "SELECT * FROM `users` WHERE `username`= '$username'";
        $query = mysqli_query($conn, $sql);

        return $query;
    }
    // sending query to db and fetching the result for adding player to db.
    function newPlayerAdult($conn, $pId, $Name, $age, $role, $imgsrc){
        $sql = "INSERT INTO `players`
        VALUES ('$pId','$Name','1','0','$age','$role','$imgsrc');";
        
        if (mysqli_query($conn, $sql)) {
            
            
            echo '<script>alert("שחקן חדש הוסף")</script>';
        } else {
            echo "Error: " . $sql . "<br>" . mysqli_error($conn);
        }
    }   
    // sending query to db and fetching the result for deleting player from db.
    function deletePlayer($conn, $pId){
        $sql = "DELETE FROM `players` WHERE `pId`=$pId";
        
        if (mysqli_query($conn, $sql)) {
           
            
            echo '<script>alert("שחקן נמחק")</script>';
        } else {
            echo "Error: " . $sql . "<br>" . mysqli_error($conn);
        }
    }  
    // sending query to db and fetching the result for adding new  team to db.
    function newTeam($conn,$tId, $Name, $imgsrc){
        $sql = "INSERT INTO `teams`
        VALUES ('$tId','$Name','$imgsrc');";
        
        if (mysqli_query($conn, $sql)) {
            
            
            echo '<script>alert("קבוצה חדשה הוספה")</script>';
        } else {
            echo "Error: " . $sql . "<br>" . mysqli_error($conn);
        }
    }
    // sending query to db and fetching the result for deleting tean from db.
    function deleteTeam($conn, $tId){
        $sql = "DELETE FROM `teams` WHERE `tId`=$tId";
        
        if (mysqli_query($conn, $sql)) {
            
            echo '<script>alert("קבוצה נמחקה")</script>';
        } else {
            echo "Error: " . $sql . "<br>" . mysqli_error($conn);
        }
    }
    // sending query to db and fetching the result for deleting U18 from db.    
    function deleteKid($conn, $kId){
        $sql = "DELETE FROM `kids` WHERE `kId`=$kId";
        
        if (mysqli_query($conn, $sql)) {
            
            echo '<script>alert("שחקן צעיר נמחק")</script>';
        } else {
            echo "Error: " . $sql . "<br>" . mysqli_error($conn);
        }
    }
    function addKid($conn,$NameK,$tId){
        $sql = "INSERT INTO `kids` ( `Name`,`Missed`,`tId`)
        VALUES ('$NameK', '0','$tId');";
        
        if (mysqli_query($conn, $sql)) {
            
            echo '<script>alert("שחקן צעיר הוסף")</script>';
        } else {
            echo "Error: " . $sql . "<br>" . mysqli_error($conn);
        }
    }



?>



