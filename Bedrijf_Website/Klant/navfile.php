<div class="sticky-top">
    <nav class="navbar navbar-expand-lg navbar-light bg-light col-12">
        <a class="navbar-brand" href="index.php"><img src="Unreal_Engine_Logo.png" width="97" height="95"></a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item active">
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="diensten.php#community" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Home
                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item" href="index.php#overUE">Over UE</a>
                        <a class="dropdown-item" href="index.php#vr">VR</a>
                    </div>
                </li>
                <li class="nav-item" class="nav-item dropdown">
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="casus" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Informatievragen
                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item" href="casus2.php">Alle games</a>
                        <a class="dropdown-item" href="casus3.php">Alle consoles</a>
                    </div>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="producten.php">Producten</a>
                </li>
            </ul>
            <form class="zoekfunctie" method="post" action="zoekresultaat.php">
                <input required type="search" name="input" placeholder="Zoek game" >
                <input type="submit" name="zoeken" value="Zoeken">
            </form>
            <ul>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <?php
                        echo $_SESSION['email'];
                        ?>
                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item" href="mijnbestellingen.php">Mijn bestellingen</a>
                        <a class="dropdown-item" href="mijngegevens.php">Mijn gegevens</a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="ww_wijzigen.php">Wachtwoord wijzigen</a>
                    </div>
                </li>
            </ul>
            <form class="zoekfunctie" method="post" action="../logout.php">
                <input type="submit" name="logout" value="Loguit">
            </form>
        </div>
    </nav>
</div>

