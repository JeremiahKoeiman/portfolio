<?php
include 'test_input.php';

if (isset($_POST['verzenden'])){
    //look if passwords are the same
    if (test_input($_POST['herhaal_wachtwoord'])==test_input($_POST['wachtwoord'])){
        //look if tel_num and rekening_num are numeric
        if (is_numeric(test_input($_POST['telefoon']))){
            if (!empty(test_input($_POST['email']))){
                try{
                    //db connection
                    require ('dbconnection.php');
                    //statement
                    $emailCheck = "SELECT * FROM klant WHERE email = :email";
                    //prepares statement
                    $output = $db->prepare($emailCheck);
                    //bind value
                    $output->bindValue(':email', $_POST['email']);
                    //execute statement
                    $output->execute();

                    if ($output->rowCount()>0){
                        echo 'Dit emailadres is al in gebruik!';
                    }else{
                        //hash password
                        $ww = password_hash($_POST['herhaal_wachtwoord'], PASSWORD_DEFAULT);
                        //include ('hash.php');
                        //create query
                        $query = "INSERT INTO klant (beheer, voornaam, achternaam, gebdatum, adres, postcode, plaats, email, wachtwoord, tel_num, rekeningnummer) VALUES ('N',:voornaam, :achternaam, :gebdatum, :adres, :postcode, :plaats, :email, :wachtwoord, :tel_num, :rekeningnummer)";
                        //prepare statement
                        $result = $db->prepare($query);
                        //bind values
                        $result->bindValue(':voornaam', test_input($_POST['voornaam']));
                        $result->bindValue(':achternaam', test_input($_POST['achternaam']));
                        $result->bindValue(':gebdatum', test_input($_POST['geboortedatum']));
                        $result->bindValue(':adres', test_input($_POST['adres']));
                        $result->bindValue(':postcode', test_input($_POST['postcode']));
                        $result->bindValue(':plaats', test_input($_POST['plaats']));
                        $result->bindValue(':email', test_input($_POST['email']));
                        $result->bindValue(':wachtwoord', test_input($ww));
                        $result->bindValue(':tel_num', test_input($_POST['telefoon']));
                        $result->bindValue(':rekeningnummer', test_input($_POST['rekening_num']));

                        if ($result->execute()){
                            echo 'U bent succesvol geregistreerd!<br>U wordt over 5 seconden doorverwezen naar de login pagina.';
                            header("Refresh: 5; URL=login.php");
                        }else{
                            echo 'Er is iets fout gegaan!';
                            header("Refresh: 2; URL=insert.php");
                        }
                    }
                }catch (PDOException $e){
                    echo '<p>
                        Regelnummer: '.$e->getLine().'<br>
                        Bestand:  ' .$e->getFile().'<br>
                        Foutmelding: '.$e->getMessage().';
                        </p>';
                    die();
                }
            }
        }else{
            echo 'Het telefoonnummer is niet geldig!';
        }
    }else{
        echo 'De ingevoerde wachtwoorden zijn niet gelijk!';
	    header("Refresh: 2; URL=registreer.php");
    }
}
?>