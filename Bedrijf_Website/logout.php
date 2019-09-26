<?php
session_start();

    try{
        require ('dbconnection.php');
        if (isset($_POST['logout'])){
            session_destroy();
            echo "U wordt uitgelogd!";
            header("Refresh: 3; URL=index.php");
        }
    } catch (PDOException $e){
        die('Error!: '.$e->getMessage());
    }

?>