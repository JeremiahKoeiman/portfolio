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
require 'klantcontrole.php';
require 'dbconnection.php';

        try{

            if (isset($_POST['wijzig'])){
	            $emailCheck = "SELECT * FROM klant WHERE idklant = :idklant";
	            //prepares statement
	            $output = $db->prepare($emailCheck);
	            //bind value
	            $output->bindValue(':idklant', $_SESSION['klantid']);
	            //execute statement
	            $output->execute();
	            if ($output->rowCount()>0){
		            echo 'Dit emailadres is al in gebruik!';
                } else {
		            $vnaam = test_input($_POST['voornaam']);
		            $anaam = test_input($_POST['achternaam']);
		            $adres = test_input($_POST['adres']);
		            $postcode = test_input($_POST['postcode']);
		            $plaats = test_input($_POST['plaats']);
		            $email = test_input($_POST['email']);
		            $tel_num = test_input($_POST['tel_num']);
		            $rekening = test_input($_POST['rekeningnummer']);
		            if (is_numeric($tel_num)){
			            $query = "UPDATE klant SET voornaam = :vnaam, achternaam = :anaam,
                          adres = :adres, postcode = :postcode, plaats = :plaats, email = :email, tel_num = :tel_num, rekeningnummer = :rekeningnummer
                          WHERE idklant = :idklant";
			            $result = $db->prepare($query);
			            $result->bindValue(':idklant', $_SESSION['klantid']);
			            $result->bindValue(':vnaam', $vnaam);
			            $result->bindValue(':anaam', $anaam);
			            $result->bindValue(':adres', $adres);
			            $result->bindValue(':postcode', $postcode);
			            $result->bindValue(':plaats', $plaats);
			            $result->bindValue(':email', $email);
			            $result->bindValue(':tel_num', $tel_num);
			            $result->bindValue(':rekeningnummer', $rekening);
			            $result->execute();
		            } else {
			            echo 'Telefoonnummer moet numeriek zijn!';
		            }
                }
            }

            $query = "SELECT * FROM klant WHERE idklant = :idklant";
            $result = $db->prepare($query);
            $result->bindValue(':idklant', $_SESSION['klantid']);
            $result->execute();

            $rij = $result->fetch(PDO::FETCH_ASSOC);
                ?>
                <form class="login-form border border-light p-5" method="post" action="mijngegevens.php">

                        <p class="h4 mb-4 text-center">Mijn gegevens</p>
                    <label for="1">Voornaam</label>
                        <input id="1" type="text" name="voornaam" id="defaultLoginFormEmail" class="form-control mb-4" value="<?php echo($rij['voornaam'])?>">
                    <label for="2">Achternaam</label>
                        <input id="2" type="text" name="achternaam" id="defaultLoginFormEmail" class="form-control mb-4" value="<?php echo($rij['achternaam'])?>">
                    <label for="3">Adres</label>
                        <input id="3" type="text" name="adres" id="defaultLoginFormEmail" class="form-control mb-4" value="<?php echo($rij['adres'])?>">
                    <label for="4">Postcode</label>
                        <input id="4" type="text" pattern="^[0-9]{4}\s[A-Z]{2}" name="postcode" id="defaultLoginFormEmail" class="form-control mb-4" value="<?php echo($rij['postcode'])?>">
                    <label for="5">Plaats</label>
                        <input id="5" type="text" name="plaats" id="defaultLoginFormEmail" class="form-control mb-4" value="<?php echo($rij['plaats'])?>">
                    <label for="6">Email</label>
                        <input id="6" type="email" pattern="^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,4}$" name="email" id="defaultLoginFormEmail" class="form-control mb-4" value="<?php echo($rij['email'])?>">
                    <label for="7">Telefoonnummer</label>
                        <input id="7" type="text" minlength="10" maxlength="10" name="tel_num" id="defaultLoginFormEmail" class="form-control mb-4" value="<?php echo($rij['tel_num'])?>">
                    <label for="8">Iban</label>
                        <input id="8" type="text" pattern="[A-Z]{2}[0-9]{2}[A-Z]{4}[0-9]{4}[0-9]{4}[0-9]{2}" minlength="18" maxlength="18" name="rekeningnummer" id="defaultLoginFormEmail" class="form-control mb-4" value="<?php echo($rij['rekeningnummer'])?>">
                        
                        </div>
                    
                        <input class="btn btn-info btn-block my-4" type="submit" name="wijzig" value="Wijzig gegevens">
                    </form>

        <?php
        } catch (PDOException $e){
            die("Error!: " . $e->getMessage());
        }
        ?>

</body>
</html>