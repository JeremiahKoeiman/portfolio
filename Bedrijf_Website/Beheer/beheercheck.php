<?php
if (!isset($_SESSION['blogin']) || $_SESSION['blogin'] == false){
    header("Location: ../login.php");
    exit();
}
?>