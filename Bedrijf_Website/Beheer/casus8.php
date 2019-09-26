<?php
session_start();
require ('dbconnection.php');
require ('beheercheck.php');
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

    <link id="pagestyle" rel="stylesheet" href="opmaaksite.css">

    <link href="https://fonts.googleapis.com/css?family=Nanum+Gothic" rel="stylesheet">
    <link rel="icon" size="64*64" type="image/ico" href="favicon.ico.ico">
</head>

<body>

<?php
include ('navfile.php');
?>

<section class="col-12">
    <article>
        <h2>Tel alle klanten die (een) game(’s) hebben besteld die duurder is dan €24.99 is en die ervoor hebben betaald.</h2>
        <br>

        <?php
        try{
            //SQL statement voorbereiden en uitvoeren
            $query = $db->prepare("SELECT COUNT(*) AS AantalKlanten
                                            FROM klant
                                            INNER JOIN bestelling ON klant.idklant=bestelling.idbestelling
                                            INNER JOIN bestelregel ON bestelling.idbestelling=bestelregel.idbestelling
                                            INNER JOIN game ON game.idgame=bestelregel.idgame
                                            WHERE prijs > 24.99 AND betaald = 'ja'
                                            ");
            $query->execute();
            $result = $query->fetchAll(PDO::FETCH_ASSOC);

            //Resultaat weergeven
            echo "<table>";
            echo "<thead>";
            echo "<tr>";
            echo "<th>Aantal klanten:</th>";
            echo "</tr>";
            echo "</thead>";
            foreach ($result as &$data){
                echo "<tr>";
                echo "<td>" . $data["AantalKlanten"] . "</td>";
                echo "</tr>";
            }
            echo "</table>";
        } catch (PDOException $e){
            die("Error!: " . $e->getMessage());
        }
        ?>
    </article>
</section>
</body>
</html>