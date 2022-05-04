<?php
    function login($conn,$username,$password){
        $sql = "SELECT * FROM users WHERE = '$username'";
        $query = mysqli_query($conn,$sql);
        return $query;
    }

?>