<?php

session_start();
include 'test_input.php';
    try{
        require ('dbconnection.php');

        if (isset($_POST['login'])){
            $email = $db->prepare("SELECT * FROM klant WHERE email = :email ");
            $email->bindValue(':email', test_input($_POST['email']));
            $email->execute();

            if ($email->rowCount()==1) {
                $resut = $email->fetch(PDO::FETCH_ASSOC);
                if (password_verify(test_input($_POST['wachtwoord']), test_input($resut['wachtwoord']))) {
                    $_SESSION['klantid']=$resut['idklant'];
                    $_SESSION['email']=$resut['email'];
                    $_SESSION['beheer']=$resut['beheer'];
                    if ($_SESSION['beheer'] == "J"){
                        $_SESSION['blogin'] = true;
                        echo 'U bent succesvol ingelogd als beheerder!';
                        header("Refresh: 3; URL=Beheer/index.php");
                    }else{
                        $_SESSION['klogin'] = true;
                        echo 'U bent succesvol ingelogd als klant!';
                        //header("Location: Klant/index.php");
                        header("Refresh: 3; URL=Klant/index.php");
                    }
                } else {
                    echo 'Onjuiste gegevens! Probeer het opnieuw!';
                    header("Refresh: 3; URL=login.php");
                }
            } else{
                echo 'Onjuiste emailadres! Probeer het opnieuw!';
                header("Refresh: 3; URL=login.php");
            }

        }else{
            echo 'U bent niet ingelogd!';
            header("Refresh: 2; URL=login.php");
            exit();
        }

    }catch (PDOException $e){
        echo '<p>
                 Regelnummer: '.$e->getLine().'<br>
                 Bestand:  ' .$e->getFile().'<br>
                 Foutmelding: '.$e->getMessage().';
                 </p>';
        die();
    }
?>
