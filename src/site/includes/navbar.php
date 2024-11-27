
    <?php

    if(isset($_SESSION["login"])){
        $first = mb_substr($_SESSION["login"], 0, 1);
        echo '
         <header style="background-color: #666666; padding: 10px 20px; display: flex; align-items: center;">
    <div style="display: flex; align-items: center; justify-content: flex-start; width: 100%;">
        <a href="index.php" title="Accueil">
            <img src="../images/logo2.png" alt="Logo" style="height: 80px; margin-right: 20px;">
        </a>
        <nav>
            <ul style="list-style-type: none; padding: 0; display: flex;">
                <li style="margin-right: 20px;">
                    <a href="index.php" class="bouton-nav" id="bouton-nav0" title="Accueil">Accueil</a></li>
                <li style="margin-right: 20px;  ">
                    <a href="module1.php" class="bouton-nav" id="bouton-nav1" title="Module1">Module1</a></li>
                <li style="margin-right: 20px;">
                    <a href="module2.php"  class="bouton-nav" id="bouton-nav2" title="Module2">Module2</a></li>
                <li style="margin-right: 20px;">
                    <a href="module3.php" class="bouton-nav" id="bouton-nav3" title="Module3">Module3</a></li>
                <li style="margin-right: 20px;">
                    <a href="module4.php" style="" class="bouton-nav" id="bouton-nav4" title="Module4">Module4</a></li>
            </ul>
        </nav>
    </div>
    
        <label for="logout" style="padding: 15px">Logout</label>
        <div class="icone"> >
            <a href="logout.php" class="icone-text" id="logout">';
        echo $first;
        echo'</a>
        </div> 
        ';
    }
    else{
        echo '
        <header style="background-color: #666666; padding: 10px 20px; display: flex; align-items: center;">
    <div style="display: flex; align-items: center; justify-content: flex-start; width: 100%;">
        <a href="index.php">
            <img src="../images/logo2.png" alt="Logo" style="height: 80px; margin-right: 20px;">
        </a>
        <nav>
            <ul style="list-style-type: none; padding: 0; display: flex;">
                <li style="margin-right: 20px;">
                    <a href="index.php" class="bouton-nav" id="bouton-nav0">Accueil</a></li>
                <li style="margin-right: 20px;  ">
                    <a href="module1.php" class="bouton-nav-disabled">Module1</a></li>
                <li style="margin-right: 20px;">
                    <a href="module2.php"  class="bouton-nav-disabled">Module2</a></li>
                <li style="margin-right: 20px;">
                    <a href="module3.php" class="bouton-nav-disabled">Module3</a></li>
                <li style="margin-right: 20px;">
                    <a href="module4.php" style="" class="bouton-nav-disabled">Module4</a></li>
            </ul>
        </nav>
    </div>

        <label for="login" style="padding: 15px">Login</label>
        <div style="background-color: white; height: 80px; width: 80px; border-radius: 50%;">
            <a href="connexion.php" style="display: block; width: 100%; height: 100%;" id="login"></a>
        </div> ';
    }


    ?>

</header>

