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
  
  <body>

  <?php
  include 'navfile.php'
  ?>

      <main>

         <br>

          <div id="carouselExampleIndicators" class="d-none d-lg-block carousel slide" data-ride="carousel"register>
              <ol class="carousel-indicators">
                  <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
                  <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
                  <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
                  <li data-target="#carouselExampleIndicators" data-slide-to="3"></li>
              </ol>
              <div class="carousel-inner">
                  <div class="carousel-item active">
                      <img class="d-block w-100" src="Images-kopie/Welcome%20to%20UE4.jpg" width="960" height="540" alt="First slide">
                  </div>
                  <div class="carousel-item">
                      <img class="d-block w-100" src="Images-kopie/UE_8.png" width="960" height="540" alt="Second slide">
                  </div>
                  <div class="carousel-item">
                      <img class="d-block w-100" src="Images-kopie/UE_9.png" width="960" height="540" alt="Third slide">
                  </div>
                  <div class="carousel-item">
                      <img class="d-block w-100" src="Images-kopie/Unreal2.jpg" width="960" height="540" alt="Fourth slide">
                  </div>
                  <div class="carousel-item">
                      <img class="d-block w-100" src="Images-kopie/Unreal3.jpg" width="960" height="540" alt="Fifth slide">
                  </div>
              </div>
              <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
                  <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                  <span class="sr-only">Previous</span>
              </a>
              <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
                  <span class="carousel-control-next-icon" aria-hidden="true"></span>
                  <span class="sr-only">Next</span>
              </a>
          </div>

          <div class="row">
              <article class="col-12 col-lg video"><video src="Videos/Unreal Engine - GDC 2018 Features Trailer.mp4" poster="Images-kopie/Video.PNG" controls width="560" height="315"></video>
              </article>

              <section class="col-12 col-lg section1">
                  <header class="tekst">Over Unreal Engine</header>
                  <article id="overUE">
                      <h2>
                          Wat is Unreal Engine?
                      </h2>
                      <br>
                      <p>
                          Unreal Engine is een game engine die ontwikkeld is door Epic Games. De eerste game die met de game engine werd gemaakt was de first-person shooter game <a href="https://www.youtube.com/watch?v=FdoCdvLPEH4" target="_blank"><abbr title="Klik voor de trailer">Unreal.</abbr></a> Die game was de basis voor  een reeks spellen. De nieuwste spel van Epic Games is <a href="https://www.youtube.com/watch?v=2gUtfBmw86Y" target="_blank"><abbr title="Klik voor de trailer">Fortnite.</abbr></a>
                          <br>
                          De engine was origineel afgestemd voor het maken van first-person shooters, maar het werd ook gebruikt om third person shooters te maken. Ook kan je er race games mee maken.
                  </article>
              </section>
          </div>

          <br>

          <section class="col-12">
              <article>
                  <h2>Techniek achter de engine</h2>
                  <br>
                  <p>
                      De kern van Unreal Engine is geschreven in C++, daardoor heeft de engine de mogelijkheid om games op meerdere platforms uit te geven.
                      <br>
                      Games die gemaakt zijn in Unreal kunnen draaien op Windows, Linux en Apple pc's, maar ook op verschillende spelcomputers zoals de Xbox One (of 365), PS4 en de Nintendo Switch. Maar denk ook aan mobliele games, zoals games voor Android en iPhones.
                  </p>
                  <hr>
                  <h2>Unreal gebruiken</h2>
                  <p>
                      Iedereen kan Uneal Engine gratis gebruiken. Om er gebruik van te maken moet je wel eerst een gratis account aanmaken bij Epic Gams (Epic Games is de eigenaar van Unreal Eninge). Als je dat hebt gedaan kan je Unreal Engine downloaden en gebruiken. Ook krijg je dan gratis eventuele updates.Als je en game maakt in Unreal Engine, kan je behalve de gemaakte game programmeren met C++ (het ondersteunde programmeertaal van Unreal Engine) het ook programmeren met Blueprints. Dat is het visueel scripten zonder dat je ook maar een regel code hoeft te schrijven.
                  </p>
              </article>
          </section>

          <br>
          <br>
         
          <section class="col-12">
                <header class="tekst">VR</header>
              <article id="vr">
                <p>Unreal Engine stelt je in staat om werelden te maken met Virtual Reality. Unreal Engine ondersteund onder andere Playstation VR, Oculus en Samsung Gear VR. Unreal Engine biedt alles aan om volledige games in VR te maken, zodat het spelen van VR games er net zo goed uitziet.
                <br>
                Dat kan gedaan worden door uit te te grijpen naar je objecten en ze te manipuleren, terwijl je de kracht van de game engine behoud.</p>
              </article>
          </section>
      </main>

    <?php
    include 'footerfile.php'
    ?>

  </body>
</html>

