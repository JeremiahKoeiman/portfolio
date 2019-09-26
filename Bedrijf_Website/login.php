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

<form class="login-form border border-light p-5" method="post" action="loginCheck.php">

    <p class="h4 mb-4 text-center">Log in</p>

    <input required autofocus type="email" name="email" id="defaultLoginFormEmail" class="form-control mb-4" placeholder="E-mailadres">

    <input required type="password" name="wachtwoord" id="defaultLoginFormPassword" class="form-control mb-4" placeholder="Wachtwoord">

        <div>
            <a href="wwvergeten.php">Wachtwoord vergeten?</a>
        </div>
    </div>

    <input class="btn btn-info btn-block my-4" type="submit" name="login" value="Log in">

    <div class="text-center">
        <p>Nog geen lid?
            <a href="registreer.php">Register</a>
        </p>
    </div>
</form>

</body>
</html>