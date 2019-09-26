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

try{

    if (isset($_POST['wijzig'])){
	    $query = $db->prepare("SELECT * FROM klant WHERE idklant = :idklant ");
	    $query->bindValue(':idklant', $_SESSION['klantid']);
	    $query->execute();

	    if ($query->rowCount() == 1){
		    $result = $query->fetch(PDO::FETCH_ASSOC);
		    if (password_verify(test_input($_POST['oww']), $result['wachtwoord'])){
			    if (test_input($_POST['nww']) == test_input($_POST['hnww'])){
				    $nieuw_ww = password_hash($_POST['hnww'], PASSWORD_DEFAULT);

				    $query = "UPDATE klant SET wachtwoord = :wachtwoord WHERE idklant = :idklant";
				    $query = $db->prepare($query);
				    $query->bindValue(':wachtwoord', $nieuw_ww);
				    $query->bindValue(':idklant', $result['idklant']);
				    $query->execute();

				    echo '<script>alert("Uw wachtwoord is succesvol gewijzig!");</script>';
			    } else{
				    echo 'De nieuwe wachtwoorden zijn niet gelijk!';
			    }
		    }else{
			    echo 'Het oude wachtwoord is niet correct.';
		    }
        }
    }

    ?>
    <form class="login-form border border-light p-5" method="post" action="ww_wijzigen.php">

        <p class="h4 mb-4 text-center">Wachtwoord wijzigen</p>
        <label for="1">Oude wachtwoord</label>
        <input id="1" required type="password" name="oww" id="defaultLoginFormEmail" class="form-control mb-4">
        <label for="2">Nieuw wachtwoord</label>
        <input id="2" required type="password" name="nww" id="defaultLoginFormEmail" class="form-control mb-4">
        <label for="3">Herhaal wachtwoord</label>
        <input id="3" required type="password" name="hnww" id="defaultLoginFormEmail" class="form-control mb-4">
        </div>

        <input class="btn btn-info btn-block my-4" type="submit" name="wijzig" value="Wijzig wachtwoord">
    </form>

    <?php
} catch (PDOException $e){
    die("Error!: " . $e->getMessage());
}
?>

</body>
</html>