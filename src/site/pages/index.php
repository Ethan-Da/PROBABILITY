<?php
session_start();
include '../includes/header.php';
?>
<html lang="fr">
<head>
<title>Proβability - Accueil</title>
    <!-- Police d'écirture -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=EB+Garamond:ital,wght@0,400..800;1,400..800&family=Montserrat:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">
    <script>
        function checkResize(){
            var body = document.getElementById("body");
            var sizes = body.getBoundingClientRect();
            var width = sizes.width;
            if (width < 600){
                div = document.getElementById('logo-container').innerHTML="";
                document.getElementById('logo-container').innerHTML = "<img src='../images/logo2.png' alt='Logo Proβability'>";
            }
            else {
                div = document.getElementById('logo-container').innerHTML="";
                document.getElementById('logo-container').innerHTML = "<img src='../images/logo.png' alt='Logo Proβability'>";
            }
        }
    </script>
</head>
<body id="body" onresize="checkResize()">
<?php include '../includes/navbar.php';
include '../includes/profil.php'?>

<?php
if (isset($_SESSION['login'])) {
    echo '<p class="welcome-message eb-garamond-text"> Je te souhaite la bienvenue sur le MEILLEUR site de calcul,  ' . htmlspecialchars($_SESSION['login']) . '</p>';
} else {
    echo '<p class="none-connection-message eb-garamond-text">Est-ce que tu veux accéder à toutes les fonctionnalités du sites ? Si oui, Connecte toi !</p>';
}
?>

<div class="container" id="index-container">
    <div id="logo-container" class="logo-container">
        <img  src="../images/logo.png" alt="Logo Proβability">
    </div>
    <div class="content eb-garamond-text" >
        <h1>Bienvenue sur notre site !</h1>
        <p>Ce site vous permet d'accéder à différents modules pour effectuer des calculs complexes.</p>
    </div>
</div>

<?php include '../includes/footer.php'; ?>
</body>
</html>
