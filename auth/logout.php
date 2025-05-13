<?php 

    session_start();

    if(isset($_POST['logout'])){
        session_unset();
        session_destroy();
        // var_dump($_SESSION);
        header('location: /ntig2test/auth/login.php');
    }

?>