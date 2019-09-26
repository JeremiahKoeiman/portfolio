<?php
session_start();
require ('klantcontrole.php');
require ('dbconnection.php');
?>

<!DOCTYPE html>
<html lang="nl">
<head>
    <meta charset="UTF-8">
    <title>Unreal Engine</title>

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.6.3/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-T8Gy5hrqNKT+hzMclPo118YTQO6cYprQmhrYwIiQ/3axmI1hQomh7Ud2hPOy8SP1" crossorigin="anonymous">

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
        <h2>Mijn bestellingen</h2>
        <br>

        <?php
        try{
    	$query = "SELECT bestelling.idbestelling, bestelling.datum, bestelling.betaald, 	bestelregel.idgame, game.naam, game.prijs, game.console
                      FROM klant
                      INNER JOIN bestelling ON klant.idklant=bestelling.idklant
                      INNER JOIN bestelregel ON bestelling.idklant=bestelregel.idklant
	    INNER JOIN game ON bestelregel.idgame=game.idgame
                      WHERE klant.idklant = :idklant";
            $result = $db->prepare($query);
            $result->bindValue(':idklant', $_SESSION['klantid']);
            $result->execute();

            echo "<table class='table'>";
            echo "<thead class='thead'>
                    <td class='td2'>Idbestelling</td>
                    <td class='td'>Datum</td>
                    <td class='td'>Betaald</td>
                    <td class='td'>Idgame</td>
                    <td class='td'>Game naam</td>
                    <td class='td'>Prijs</td>
                    <td class='td'>Console</td>";
            while ($rij = $result->fetch(PDO::FETCH_ASSOC)){
                ?>

                <form method="post" action="mijnbestellingen.php">
                    <tr class="tr">
                        <td class="td"><?php echo($rij['idbestelling']); ?><input type="hidden" name="idgame" value="<?php echo($rij['idbestelling']);?>"></td>
                        <td class="td"><?php echo($rij['datum']); ?><input type="hidden" name="idgame" value="<?php echo($rij['datum']);?>"></td>
                        <td class="td"><?php echo($rij['betaald']); ?><input type="hidden" name="idgame" value="<?php echo($rij['betaald']);?>"></td>
                        <td class="td"><?php echo($rij['idgame']); ?><input type="hidden" name="idgame" value="<?php echo($rij['idgame']);?>"></td>
                        <td class="td"><?php echo($rij['naam']); ?><input type="hidden" name="idgame" value="<?php echo($rij['naam']);?>"></td>
                        <td class="td"><?php echo($rij['prijs']); ?><input type="hidden" name="idgame" value="<?php echo($rij['prijs']);?>"></td>
                        <td class="td"><?php echo($rij['console']); ?><input type="hidden" name="idgame" value="<?php echo($rij['console']);?>"></td>

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