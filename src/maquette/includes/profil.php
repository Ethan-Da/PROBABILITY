<?php
if (isset($_SESSION["login"])){
    $first = mb_substr($_SESSION["login"], 0, 1);
    $connecte = true;
}
else{
    $first = "?";
    $connecte = false;
}
?>

<div id="profil" class="hidden">
    <?php
    if ($connecte){
        echo'
                <table style="display: block;">
                    <tr style="display: inline-block"><div class="icone">'.$first.'</div><p>'.$_SESSION['login'].'</p></tr>
                    <br>
                    <br> 
                    <tr><a href="../pages/actions/logout.php">Logout</a></tr>
                    <br>
                    <br>
                    <tr><button id="close-button">close</button></tr>
                </table>
            ';
    }
    else{
        echo'
            <table style="display: block;">
                    <tr style="display: inline-block"><div class="icone">';echo $first;echo'</div><p>Visiteur</p></tr>
                    <br>
                    <br> 
                    <tr><a href="../pages/connexion.php">Connection</a></tr>
                    <br>
                    <tr><a href="../pages/inscription.php">Inscription</a></tr>
                    <br>
                    <br>
                    <tr><button id="close-button">close</button></tr>
                </table>';
    }
    ?>

</div>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        const openBtn = document.getElementById('button');
        const closeBtn = document.getElementById('close-button');
        const sidePanel = document.getElementById('profil');

        openBtn.addEventListener('click', function() {
            sidePanel.classList.remove('hidden');
            sidePanel.classList.add('visible');

        });
        closeBtn.addEventListener('click', function() {
            sidePanel.classList.remove('visible');
            sidePanel.classList.add('hidden');
        });
    });
</script>
