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
                    <h2>Maak een overzicht van alle klanten.</h2>
                    <br>
                    <?php
                        try{
                            //SQL statement voorbereiden en uitvoeren
                            $query = $db->prepare("SELECT * FROM klant");
                            $query->execute();
                            $result = $query->fetchAll(PDO::FETCH_ASSOC);

                            //Resultaat weergeven
                            echo "<table>";
                                echo "<thead>";
                                    echo "<tr>";
                                        echo "<th>Idklant:</th>";
                                        echo "<th>Voornaam:</th>";
                                        echo "<th>Achternaam:</th>";
                                        echo "<th>Gebdatum:</th>";
                                        echo "<th>Adres:</th>";
                                        echo "<th>Postcode:</th>";
                                        echo "<th>Plaats:</th>";
                                        echo "<th>Email:</th>";
                                        echo "<th>Rekeningnummer:</th>";
                                    echo "</tr>";
                                echo "</thead>";
                                foreach ($result as &$data){

                                        echo "<tr>";
                                        echo "<td>" . $data["idklant"] . "</td>";
                                        echo "<td>" . $data["voornaam"] . "</td>";
                                        echo "<td>" . $data["achternaam"] . "</td>";
                                        echo "<td>" . $data["gebdatum"] . "</td>";
                                        echo "<td>" . $data["adres"] . "</td>";
                                        echo "<td>" . $data["postcode"] . "</td>";
                                        echo "<td>" . $data["plaats"] . "</td>";
                                        echo "<td>" . $data["email"] . "</td>";
                                        echo "<td>" . $data["rekeningnummer"] . "</td>";
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