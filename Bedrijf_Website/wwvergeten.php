<!DOCTYPE html>
<html lang="nl">
<head>
    <meta charset="UTF-8">
    <title>Unreal Engine</title>

    <link rel="stylesheet" href="../Bootstrap/css/bootstrap.min.css">
    <script src="../Bootstrap/js/jquery-3.4.1.min.js"></script>
    <script src="../Bootstrap/js/popper.min.js"></script>
    <script src="../Bootstrap/js/bootstrap.min.js"></script>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link href="../FontAwesome/css/all.min.css" rel="stylesheet">

    <link id="pagestyle" rel="stylesheet" href="opmaaksite.css">

    <link href="https://fonts.googleapis.com/css?family=Nanum+Gothic" rel="stylesheet">
    <link rel="icon" size="64*64" type="image/ico" href="favicon.ico.ico">
</head>
<body class="body">

<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css" />

<?php

try {
    require ('dbconnection.php');
    include 'test_input.php';

    if (isset($_POST['emailverzenden'])) {
        $token = "ABCDEFGHIJKLMNOPQRSTUVWXYZ1234567890abcdefghijklmnopqrstuvwxyz()/$*+-.<>?/|][{}=*&^%$#@!`~";
        $token = str_shuffle($token);
        $token = substr($token, 0, 10);
        $tokenHash = password_hash($token, PASSWORD_DEFAULT);

        $query = $db->prepare("UPDATE klant SET wachtwoord = :tokenHash WHERE email = :email");
        $query->bindValue(':tokenHash', $tokenHash);
        $query->bindValue(':email', test_input($_POST['email']));

        $query->execute();
        if ($query->rowCount() == 1) {
            echo "Dit is uw nieuwe wachtwoord: $token <br><br>Deze wachtwoord moet u gebruiken om opnieuw te kunnen inloggen.<br>Als u eenmaal weer bent ingelogd kunt u in uw accountinstellingen het wachtwoord weer veranderen";
        } else {
            echo "<h2>Oeps...<br>Deze emailadres kennen we niet!</h2>";
        }
        echo "<br>";
    }
}catch (PDOException $e){
    echo "Regel: " . $e->getLine();
    echo "Bestand: " . $e->getFile();
    echo "Code: " . $e->getCode();
    die("Error!: " . $e->getMessage());
}
?>

<form class="login-form border border-light p-5" method="post" action="wwvergeten.php">

    <p class="h4 mb-4 text-center">Wachtwoord vergeten</p>

    <input required autofocus type="email" name="email" id="defaultLoginFormEmail" class="form-control mb-4" placeholder="E-mailadres">

    <input class="btn btn-info btn-block my-4" type="submit" name="emailverzenden" value="Wachtwoord vergeten">
</form>

</body>
</html>