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

<form class="login-form border border-light p-5" method="post" action="insert.php">

    <p class="h4 mb-4 text-center">Registreer</p>

    <input required type="text" name="voornaam" id="defaultLoginFormEmail" class="form-control mb-4" placeholder="Voornaam">

    <input required type="text" name="achternaam" id="defaultLoginFormEmail" class="form-control mb-4" placeholder="Achternaam">

    <input required type="date" name="geboortedatum" id="defaultLoginFormEmail" class="form-control mb-4" placeholder="Geboortedatum">

    <input required type="text" name="adres" id="defaultLoginFormEmail" class="form-control mb-4" placeholder="Adres">
    <label for="postcode">VB: 1234 (spatie) AB</label>
    <input id="postcode" required type="text" pattern="^[0-9]{4}\s[A-Z]{2}" name="postcode" id="defaultLoginFormEmail" class="form-control mb-4" placeholder="Postcode">

    <input required type="text" name="plaats" id="defaultLoginFormEmail" class="form-control mb-4" placeholder="Plaats">
    <label for="email">VB: iemand@domein.nl</label>
    <input id="email" required type="email" pattern="^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,4}$" name="email" id="defaultLoginFormEmail" class="form-control mb-4" placeholder="E-mailadres">

    <input required type="password" minlength="10" name="wachtwoord" id="defaultLoginFormPassword" class="form-control mb-4" placeholder="Wachtwoord">

    <input required type="password" minlength="10" name="herhaal_wachtwoord" id="defaultLoginFormPassword" class="form-control mb-4" placeholder="Herhaal Wachtwoord">

    <input required type="text" minlength="10" maxlength="10" name="telefoon" id="defaultLoginFormEmail" class="form-control mb-4" placeholder="Telefoonnummer">
    <label for="iban">VB: NL91ABNA0417164300</label>
    <input id="iban" required type="text" pattern="[A-Z]{2}[0-9]{2}[A-Z]{4}[0-9]{4}[0-9]{4}[0-9]{2}" minlength="18" maxlength="18" name="rekening_num" id="defaultLoginFormEmail" class="form-control mb-4" placeholder="Iban">

    </div>

    <input class="btn btn-info btn-block my-4" type="submit" name="verzenden" value="Registreer nu!">

    <div class="text-center">
        <p>Al een account?
            <a href="login.php">Login</a>
        </p>
    </div>
</form>

</body>
</html>


