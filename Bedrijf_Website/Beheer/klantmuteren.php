<?php
session_start();
require ('beheercheck.php');
require ('dbconnection.php');
include '../test_input.php';
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
        <h2>Klant muteren</h2>
        <br>

        <?php
        try{

            if (isset($_POST['wijzig'])){
                $vnaam = test_input($_POST['voornaam']);
                $anaam = test_input($_POST['achternaam']);
                $gebdatum = test_input($_POST['gebdatum']);
                $adres = test_input($_POST['adres']);
                $email = test_input($_POST['email']);
                $postcode = test_input($_POST['postcode']);
                //$beheer = test_input($_POST['beheer']);

                $query = "UPDATE klant SET beheer = :beheer, voornaam = :vnaam, achternaam = :anaam, gebdatum = :gebdatum, adres = :adres, postcode = :postcode, email = :email 
                          WHERE email = :email";
                $result = $db->prepare($query);
                $result->bindValue(':beheer', $_POST['beheer']);
                $result->bindValue(':vnaam', $vnaam);
                $result->bindValue(':anaam', $anaam);
                $result->bindValue(':gebdatum', $gebdatum);
                $result->bindValue(':adres', $adres);
                $result->bindValue(':postcode', $postcode);
                $result->bindValue(':email', $email);
                $result->execute();
            }

            if (isset($_POST['verwijder'])){
                $email = test_input($_POST['email']);
                $query = "DELETE FROM klant WHERE email = :email";
                $result = $db->prepare($query);
                $result->bindValue(':email', $email);
                $result->execute();
            }

            $query = "SELECT * FROM klant";
            $result = $db->prepare($query);
            $result->execute();

            echo "<table class='table'>";
            echo "<thead class='thead'>
                    <td class='td'>Beheer</td>
                    <td class='td'>Voornaam</td>
                    <td class='td'>Achternaam</td>
                    <td class='td'>Geboortedatum</td>
                    <td class='td'>Adres</td>
                    <td class='td'>Postcode</td>
                    <td class='td'>Email</td>
                    <td class='td' colspan='2'>Actie</td>";
            while ($rij = $result->fetch(PDO::FETCH_ASSOC)){
                ?>

                <form method="post" action="klantmuteren.php">
                    <tr class="tr">
                        <td class="td"><input type="text" name="beheer" value="<?php echo($rij['beheer']);?>"></td>
                        <td id='vnaam' class="td"><input type="text" name="voornaam" value="<?php echo($rij['voornaam']);?>"></td>
                        <td class="td"><input type="text" name="achternaam" value="<?php echo($rij['achternaam']);?>"></td>
                        <td class="td"><input type="text" name="gebdatum" value="<?php echo($rij['gebdatum']);?>"></td>
                        <td class="td"><input type="text" name="adres" value="<?php echo($rij['adres']);?>"></td>
                        <td class="td"><input type="text" name="postcode" value="<?php echo($rij['postcode']);?>"></td>
                        <td class="td"><input type="text" name="email" value="<?php echo($rij['email']);?>"></td>
                        <td class="td"><input type="submit" name="wijzig" value="Wijzig"></td>
                        <?php
                        if ($rij['beheer'] == 'N'){
                            echo '<td class="td"><input type="submit" name="verwijder" value="Wissen"></td>';
                        }
                        ?>
                    </tr>
                </form>
                <?php
            }
            ?>

            <?php
        } catch (PDOException $e){
            die("Error!: " . $e->getMessage());
        }
        ?>
    </article>
</section>

</body>
</html>