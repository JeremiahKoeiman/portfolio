<?php
if (!isset($_SESSION['klogin']) || $_SESSION['klogin'] == false){
    header("Location: ../login.php");
    exit();
}
?>