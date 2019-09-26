<?php
session_start();
require 'klantcontrole.php';
require 'dbconnection.php';
?>

<!DOCTYPE html>
<html lang="nl">
<<head>
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
  include 'navfile.php'
  ?>
       <br>
      
      <main>
      
      <section>
          <header class="tekst">Over ons</header>
          <article>
              <h2>
                  Wie zijn wij?
              </h2>
              <br>
              <p>
                  Wij zijn Unreal Engine. Wij zijn het dochterbedrijf van <a href="https://www.epicgames.com/site/en-US/home"><strong>Epic Games</strong></a>.  Zoals u al op de hoofdpagina heeft gelezen is Epic Games bekend door onder andere de titels Fortnite &amp; Unreal.
                  <br>
                  <br>
                  <hr>
                  <br>
                  Ons doel is het makkelijker maken om games te ontwerpen, maken en programmeren. Wij vinden namelijk dat het mogelijk zou moeten kunnen zijn dat iedereen games kan maken, zonder dat je een achtergrond hebt met C++. 
                  <br>
                  Dit doel behalen we door iets genaamd Blueprints. Blueprints is aan de ene kant een soort programmeertaal, maar aan de andere kant ook weer niet. Hoe kan dat denkt u waarschijnlijk. Het kan doordat Blueprints visueel scripten is. Als u Blueprints gebruikt, programmeerd u visueel met nodes die u met elkaar verbindt. Aan de linkerkant van de foto hieronder ziet u een Blueprint en aan de rechterkant van de foto ziet u hoe het eruit zou zien als het gecodeerd was met C++.
                  <br>
                  <br>
                  <img src="Images-kopie/BP_vs_C++.jpg" alt="Blueprints vs C++" width="99%">
                  <br>
                  <br>
                  <hr>
                  <br>
                  Blueprints gebruiken is natuurlijk niet de enige manier on uw game te programmeren in Unreal Engine. Behalve Blueprints kunt u ook C++ (het ondersteunde programmeertaal van Unreal Engine) gebruiken om uw zelfgemaakte game te programmeren.
              </p>
          </article>
      </section>
      
      </main>

  <?php
  include 'footerfile.php'
  ?>
  </body>
</html>