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
    <link href="../FontAwesome/css/brands.min.css" rel="stylesheet">
    <link href="../FontAwesome/css/solid.min.css" rel="stylesheet">

    <link id="pagestyle" rel="stylesheet" href="opmaaksite.css">

    <link href="https://fonts.googleapis.com/css?family=Nanum+Gothic" rel="stylesheet">
    <link rel="icon" size="64*64" type="image/ico" href="favicon.ico.ico">
</head>
  
  <body>

  <?php
  include 'navfile.php';
  ?>
        

       <br>
      
      <main>

          <div class="row">
              <aside class="col-12 col-lg">
                  <iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d11748.856028996532!2d-78.7342018!3d35.7595384!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x89acf4964103c69f%3A0x4fd397078ceffa1!2sEpic+Games!5e1!3m2!1snl!2snl!4v1541069688068" width="600" height="450" frameborder="" style="border:" allowfullscreen></iframe>
              </aside>

              <article class="col-12 col-lg topgegevens">
                  <h2>
                      Contactgegevens
                  </h2>
                  <hr>
                  <img src="Images-kopie/EpicGamesLogo.png">
                  <br>
                  Bedrijf: <strong>Epic Games, Inc.</strong>
                  <br>
                  Locatie: 620 Crossroads Blvd.
                  <br>
                  Plaats: Cary, NC USA
                  <br>
                  Telefoon: <a href="tel:+19198540070">+1 919 854 0070</a>
                  <br>
                  Email: <a href="mailto:dmca@epicgames.com">dmca@epicgames.com</a>
              </article>
          </div>

          <br>
          <br>
      
      <article class="col-12 artc_background_form">
          <h2>
              Contactformulier
          </h2>
          <hr>
		<form class="contact" name="reactieformulier" method="post" action="reactie.php">
            
		<fieldset>
			<legend>Uw gegevens</legend>
			<label for="voornaam">Voornaam:</label>
			<input class="input" required="" type="text" name="voornaam" placeholder="Vul uw voornaam in"><br>
			<label  class="input" for="achternaam">Achternaam:</label>
			<input  class="input" type="text" name="achternaam" placeholder="Vul uw achternaam in">
			<br>
			<label for="email">Email:</label>
			<input class="input" required="" type="email" name="email" placeholder="Vul uw email-adres in">
		</fieldset>
		
		<br>
		
		<fieldset><legend>Informatie</legend>
		    <label for="onderwerp">Onderwerp:</label>
			<input class="input" type="text" name="onderwerp">
			<br>
			<br>
			<label>Vragen of opmerkingen:</label>
			<br>
			<textarea cols="40" rows="5" name="vragen_opmerkingen" id="reactie" placeholder="Beschrijf in een paar regels uw toevoeging als u dat wilt."></textarea>
		</fieldset>
			
            <br>

		<fieldset>
			<legend> Alles ingevuld? </legend>
			<input type="submit" id="submit" name="submit" value="Verzenden">
			<input type="reset" id="reset" name="reset" value="Resetten">
		</fieldset>
		</form>
          </0div>
      </article>
      
     </main>
     
      <br>

  <?php
  include 'footerfile.php'
  ?>
  </body>
</html>
