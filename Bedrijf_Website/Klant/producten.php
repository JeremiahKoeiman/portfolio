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
include '../test_input.php';
?>

<section class="col-12">
    <article>
        <h2>Onze games</h2>
        <br>

        <?php
        try{

        if (isset($_POST['bestel'])){
            $idklant = $db->prepare("SELECT idklant FROM klant WHERE idklant = :idklant");
            $idklant->bindValue(':idklant', $_SESSION['klantid']);

            if ($idklant->execute()){
                $k_result = $idklant->fetch(PDO::FETCH_ASSOC);

                $date = date('Y-m-d');

                $bestelling = $db->prepare("INSERT INTO bestelling(datum, betaald, idklant) VALUES (:datum, 'nee', :idklant)");
                $bestelling->bindValue(':datum', $date);
                $bestelling->bindValue(':idklant', $_SESSION['klantid']);

                if ($bestelling->execute()){
                    $b_detail = $db->prepare("INSERT INTO bestelregel(idbestelling, idgame, idklant) VALUES (:idbestelling, :idgame, :idklant)");
                    $b_detail->bindValue(':idbestelling', $db->lastInsertId());
                    $b_detail->bindValue(':idgame', $_POST['idgame']);
                    $b_detail->bindValue(':idklant', $_SESSION['klantid']);
                    if ($b_detail->execute()){
                        echo '<script>confirm("Uw bestelling is geplaatst!");</script>';
                    }else{
                        echo '<script>confirm("Er is iets fout gegaan met het plaatsen van uw bestelling!")</script>';
                        header("Refresh: 4; URL=producten.php");
                    }
                }else{
                    echo '<script>confirm("Er is iets fout gegaan met het plaatsen van uw bestelling!")</script>';
                    header("Refresh: 4; URL=producten.php");
                }
            }
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
                    <td class='td'>Bestel</td>";

        while ($rij = $result->fetch(PDO::FETCH_ASSOC)){
        ?>

        <form method="post" action="producten.php">
            <tr class="tr">
                <td class="td"><?php echo($rij['idgame']); ?><input type="hidden" name="idgame" value="<?php echo($rij['idgame']);?>"></td>
                <td class="td"><?php echo($rij['naam']); ?></td>
                <td class="td"><?php echo($rij['prijs']);?></td>
                <td class="td"><?php echo($rij['console']);?></td>
                <td class="td"><input type="submit" name="bestel" value="Bestel"></td>
            </tr>
        </form>
        <?php
        }

        } catch (PDOException $e){
            die("Error!: " . $e->getMessage());
        }
        ?>
    </article>
</section>

</body>
</html>

