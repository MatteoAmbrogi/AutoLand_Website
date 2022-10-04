        <nav class="navigation-list">
            <!-- titolo -->
            <div>
                <a class="nav item title" href="./nuovo.php">AutoLand</a>
            </div>
            <div class="Titolo-right">
                <!-- nome utente -->
                <?php
                    // cambio del link in base al tipo di accesso
                    if($_SESSION['concessionariaCars'] == "false"){
                        echo '<a class="nav item" id="account" href="./accountUtente.php">';
                    }else{
                        echo '<a class="nav item" id="account" href="./accountConcessionaria.php">';
                    }
                ?>
                    <img src="./../css/img/user.svg" alt="utente">
                    <span><?php echo $_SESSION['usernameCars'] ?></span>
                </a>
                <!-- bottone logout -->
                <a class="nav button" href="./logout.php">Logout</a>
            </div>
        </nav>

        <!-- aside -->
        <aside class="menu-list">
            <a class = "menu item" id="Nuovo" href="./nuovo.php">
                <img src="./../css/img/nuovo.png" alt="Nuovo">
                <span class="menuSpan">Nuovo</span>
            </a>
            <a class = "menu item" id="Usato" href="./usato.php">
                <img src="./../css/img/usato.png" alt="Usato">
                <span class="menuSpan">Usato</span>
            </a>
            <a class = "menu item" id="VeicoliCommerciali" href="./veicolicommerciali.php">
                <img src="./../css/img/veicoliCommerciali.png" alt="veicoli commerciali">
                <span class="menuSpan">Veicoli Commerciali</span>
            </a>
            <a class = "menu item" id="Elettrico" href="./elettrico.php">
                <img src="./../css/img/elettrico.png" alt="Elettrico">
                <span class="menuSpan">Elettrico</span>
            </a>
            <a class = "menu item" id="Ricerca" href="./ricerca.php">
                <img src="./../css/img/ricerca.png" alt="Ricerca">
                <span class="menuSpan">Ricerca</span>
            </a>
        </aside> 