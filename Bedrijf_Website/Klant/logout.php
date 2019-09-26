<?php

session_start();
try{
    require ('dbconnection.php');

    if (isset($_POST['login'])){
        $email = $db->prepare("SELECT * FROM klant WHERE email = :email ");
        $email->bindValue(':email', $_POST['email']);

        //$wwCheck->bindValue(':wachtwoord', $_POST['wachtwoord']);
        $email->execute();


        if ($email->rowCount()>=1) {
            $resut = $email->fetch(PDO::FETCH_ASSOC);
            if (password_verify($_POST['wachtwoord'], $resut['wachtwoord'])) {
                $_SESSION['klantid']=$resut['idklant'];
                $_SESSION['email']=$resut['email'];
                $_SESSION['beheer']=$resut['beheer'];
                if ($_POST['email'] == 'beheer@si.te' && $_SESSION['beheer'] == "J"){
                    $_SESSION['blogin'] = true;
                    echo 'U bent succesvol ingelogt!';
                    header("Refresh: 3; URL=Beheer/index.php");
                }else{
                    $_SESSION['klogin'] = true;
                    echo 'U bent succesvol ingelogt!';
                    //header("Location: Klant/index.php");
                    header("Refresh: 3; URL=Klant/index.php");
                }
            } /*else {
                    echo 'Onjuiste gegevens! Probeer het opnieuw!';
                }*/
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
?>