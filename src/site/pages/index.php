<?php
session_start();
include '../includes/header.php';
?>
<head>
<title>Proβability - Accueil</title>
    <!-- Police d'écirture -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=EB+Garamond:ital,wght@0,400..800;1,400..800&family=Montserrat:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">
</head>
<body>
<?php include '../includes/navbar.php'; ?>

<?php
if (isset($_SESSION['login'])) {
    echo '<p class="welcome-message eb-garamond-text"> Je te souhaite la bienvenue sur le meilleur site de calcul,  ' . htmlspecialchars($_SESSION['login']) . '</p>';
} else {
    echo '<p class="none-connection-message eb-garamond-text">Est-ce que tu veux accéder à toutes les fonctionnalités du sites ? Si oui, Connecte toi !</p>';
}
?>

<div class="container" id="index-container">
    <div class="logo-container">
        <img src="../images/logo.png" alt="Logo Proβability">
    </div>
    <div class="content">
        <h2>Bienvenue sur notre site !</h2>
        <p>Ce site vous permet d'accéder à différents modules pour effectuer des calculs complexes.</p>
    </div>
</div>

<?php include '../includes/footer.php'; ?>
</body>
</html>
