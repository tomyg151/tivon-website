<?php

    if(isset($_POST['login'])){
        $result = login($conn , $username, $password);

        foreach($result as $r){

            if($password === $r['password']){
                $_SESSION['username'] = $r['username'];
                
            }
        }
    }

    if(isset($_POST['logout'])){
        session_destroy();
        header("Refresh:0");
        exit();
    }
    
?>