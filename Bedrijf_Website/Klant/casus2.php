<?php
session_start();
require 'klantcontrole.php';
require 'dbconnection.php';
?>

<!DOCTYPE html>
<html lang="nl">
<head>
    <meta charset="UTF-8">
    <title>Unreal Engine</title>

    <link rel="stylesheet" href="../../Bootstrap/css/bootstrap.min.css">
    <script src="../../Bootstrap/js/jquery-3.4.1.min.js"></script>
    <script src="../../Bootstrap/js/popper.min.js"></script>
    <script src="../../Bootstrap/js/bootstrap.min.js"></script>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link href="../../FontAwesome/css/all.min.css" rel="stylesheet">

    <link id="pagestyle" rel="stylesheet" href="../opmaaksite.css">

    <link href="https://fonts.googleapis.com/css?family=Nanum+Gothic" rel="stylesheet">
    <link rel="icon" size="64*64" type="image/ico" href="favicon.ico.ico">
</head>

<body>

<?php
include ('navfile.php');
?>

<section class="col-12">
    <article>
        <h2>Maak een overzicht van alle games.</h2>
        <br>

        <?php
        try{
            include ('dbconnection.php');
            //SQL statement voorbereiden en uitvoeren
            $query = $db->prepare("SELECT * FROM game");
            $query->execute();
            $result = $query->fetchAll(PDO::FETCH_ASSOC);

            //Resultaat weergeven
            echo "<table class='table'>";
            echo "<thead class='thead'>";
            echo "<tr class='tr'>";
            echo "<th>Idgame:</th>";
            echo "<th>Naam:</th>";
            echo "<th>Prijs:</th>";
            echo "<th>Console:</th>";
            echo "<th>Voorraad:</th>";
            echo "</tr>";
            echo "</thead>";
            foreach ($result as &$data){
                echo "<tr class='tr'>";
                echo "<td class='td'>" . $data["idgame"] . "</td>";
                echo "<td class='td'>" . $data["naam"] . "</td>";
                echo "<td class='td'>" . $data["prijs"] . "</td>";
                echo "<td class='td'>" . $data["console"] . "</td>";
                echo "<td class='td'>" . $data["voorraad"] . "</td>";
                echo "</tr>";
            }
            echo "</table>";
        } catch (PDOException $e){
            die("Error!: " . $e->getMessage());
        }
        ?>
    </article>
</section>

<?php
include ('footerfile.php');
?>
</body>
</html>