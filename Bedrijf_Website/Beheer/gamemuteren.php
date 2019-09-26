<?php
session_start();
    require ('beheercheck.php');
    require ('dbconnection.php');
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
        <h2>Games muteren</h2>
        <br>

        <?php
        try{
            require '../test_input.php';
            if (isset($_POST['wijzig'])){
                $id = test_input($_POST['idgame']);
                $naam = test_input($_POST['naam']);
                $prijs = test_input($_POST['prijs']);
                $console = test_input($_POST['console']);
                $voorraad = test_input($_POST['voorraad']);

                $query = "UPDATE game SET naam = :naam, prijs = :prijs, console = :console, voorraad = :voorraad WHERE idgame = :idgame";
                $result = $db->prepare($query);
                $result->bindValue(':idgame', $id);
                $result->bindValue(':naam', $naam);
                $result->bindValue(':prijs', $prijs);
                $result->bindValue(':console', $console);
                $result->bindValue(':voorraad', $voorraad);
                $result->execute();
            }

            if (isset($_POST['verwijder'])){
                $query = "DELETE FROM game WHERE idgame = :idgame";
                $result = $db->prepare($query);
                $result->bindValue(':idgame', $_POST['idgame']);
                $result->execute();
            }

            if (isset($_POST['toevoegen'])){
                $naam = test_input($_POST['naam']);
                $prijs = test_input($_POST['prijs']);
                $console = test_input($_POST['console']);
                $voorraad = test_input($_POST['voorraad']);

                $query = "INSERT INTO game (naam, prijs, console, voorraad) VALUES (:naam, :prijs, :console, :voorraad)";
                $result = $db->prepare($query);
                $result->bindValue(':naam', $naam);
                $result->bindValue(':prijs', $prijs);
                $result->bindValue(':console', $console);
                $result->bindValue(':voorraad', $voorraad);
                $result->execute();
            }

            $query = "SELECT * FROM game";
            $result = $db->prepare($query);
            $result->execute();

            echo "<table class='table'>";
            echo "<thead class='thead'>
                    <td class='td2'>Idgame</td>
                    <td class='td'>Naam</td>
                    <td class='td'>Prijs</td>
                    <td class='td'>Console</td>
                    <td class='td'>Voorraad</td>
                    <td class='td' colspan='2'>Actie</td>";
            while ($rij = $result->fetch(PDO::FETCH_ASSOC)){
                ?>

                <form method="post" action="gamemuteren.php">
                    <tr class="tr">
                        <td class="td"><?php echo($rij['idgame']); ?><input type="hidden" name="idgame" value="<?php echo($rij['idgame']);?>"></td>
                        <td class="td"><input class="inp" type="text" name="naam" value="<?php echo($rij['naam']);?>"></td>
                        <td class="td"><input type="text" name="prijs" value="<?php echo($rij['prijs']);?>"></td>
                        <td class="td"><input type="text" name="console" value="<?php echo($rij['console']);?>"></td>
                        <td class="td"><input type="text" name="voorraad" value="<?php echo($rij['voorraad']);?>"></td>
                        <td class="td"><input type="submit" name="wijzig" value="Wijzig"></td>
                        <td class="td"><input type="submit" name="verwijder" value="Wissen"></td>
                    </tr>
                </form>
        <?php
            }
            ?>
        <form method="post" action="gamemuteren.php">
            <tr class="tr">
                <td><input required type="text" name="naam" value="" placeholder="Game naam"></td>
                <td><input required type="text" name="prijs" value="" placeholder="Prijs"></td>
                <td><input required type="text" name="console" value="" placeholder="Console"></td>
                <td><input required type="text" name="voorraad" value="" placeholder="Voorraad" </td>
                <td colspan="2"><input type="submit" name="toevoegen" value="Toevoegen"></td>
            </tr>
        </form>


    <?php
        } catch (PDOException $e){
            die("Error!: " . $e->getMessage());
        }
        ?>
    </article>
</section>

</body>
</html>