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
        VALUES ('$tId','$Name','$imgsrc',null);";
        
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

    // sending query to db and fetching the result for addind U18 to db. 
    function addKid($conn,$NameK,$tId,$jdate){
        $sql = "INSERT INTO `kids` ( `Name`,`Missed`,`tId`,`jdate`)
        VALUES ('$NameK', '0','$tId','$jdate');";
        
        if (mysqli_query($conn, $sql)) {
            
            echo '<script>alert("שחקן צעיר הוסף")</script>';
        } else {
            echo "Error: " . $sql . "<br>" . mysqli_error($conn);
        }
    }

    // sending query to db and fetching the result for adding user history to db. 
    function addUserHistory($conn,$Hname,$Hdate,$Page){
        $sql = "INSERT INTO `userhistory` ( `username`,`date`,`page`)
        VALUES ('$Hname', '$Hdate','$Page');";
        
        mysqli_query($conn, $sql);
    }

    // sending query to db and fetching the result for adding coach to db. 
    function addCoach($conn,$CName){
        $sql = "INSERT INTO `coach` ( `Name`)
        VALUES ('$CName');";
        
        mysqli_query($conn, $sql);
    }

    // sending query to db and fetching the result for adding coach to team db. 
    function addCoachToTeam($conn,$CName,$tId){
        $sql1 = "SELECT `cId` FROM `coach` WHERE `name`='$CName'";
        $query1 = mysqli_query($conn, $sql1);
        $rows = $query1 -> fetch_assoc();
        $cId = (int) $rows['cId'];
        $sql2 = "UPDATE teams
                SET cId = $cId
                WHERE tId = '$tId'";
        if (mysqli_query($conn, $sql2)) {
            
            echo '<script>alert(" מאמן הוסף לקבוצה ")</script>';
        } else {
            echo "Error: " . $sql2 . "<br>" . mysqli_error($conn);
        }
        
    }

      // sending query to db and fetching the result for adding coach to db. 
      function deleteCoach($conn,$CName,$tId){
        $sql2 = "UPDATE teams
                SET cId = Null
                WHERE tId = '$tId'";
        $sql = "DELETE FROM `coach` WHERE `Name`='$CName'";

        mysqli_query($conn, $sql2);
        
        if (mysqli_query($conn, $sql)) {
            
            echo '<script>alert("מאמן נמחק")</script>';
        } else {
            echo "Error: " . $sql . "<br>" . mysqli_error($conn);
        }
    
    }
       // sending query to db and fetching the result for adding new equ` to db. 
       function addSupply($conn,$id,$name,$total){
      
        $sql = "INSERT INTO `equipment` VALUES('$id','$name','$total','0')";
        
        if (mysqli_query($conn, $sql)) {
            
            echo '<script>alert("ציוד חדש הוסף")</script>';
        } else {
            echo "Error: " . $sql . "<br>" . mysqli_error($conn);
        }
    
    }
       // sending query to db and fetching the result for updating equ` in db. 
       function updateSupply($conn,$id,$total,$taken){
      
        $sql = "UPDATE `equipment`
        SET `total` = '$total' , `taken` = '$taken'
        WHERE `id`='$id'";
        
        if (mysqli_query($conn, $sql)) {
            
            echo '<script>alert("ציוד עודכן")</script>';
        } else {
            echo "Error: " . $sql . "<br>" . mysqli_error($conn);
        }
    
    }

         // sending query to db and fetching the result for updating equ` in db. 
         function deleteSupply($conn,$id){
      
            $sql = "DELETE FROM `equipment` WHERE `id`='$id'";
            
            if (mysqli_query($conn, $sql)) {
                
                echo '<script>alert("ציוד עודכן")</script>';
            } else {
                echo "Error: " . $sql . "<br>" . mysqli_error($conn);
            }
        
        }



?>



