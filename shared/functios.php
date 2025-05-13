<?php

require "./database/db.php";

    function check($var , $message){

        if($var){
            echo $message .  " true";
        }else{
            echo  $message .   " false";
        }
    }



    function doQuery($query){
       return  mysqli_query($GLOBALS['conn'] , $query);
    }
?>