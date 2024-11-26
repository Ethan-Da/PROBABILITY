<?php
session_start();

include '../includes/header.php'; ?>
<title>Proβability - Accueil</title>
</head>
<body>
<?php include '../includes/navbar.php';

?>


<div class="container">
    <div class="logo-container">
        <img src="../images/logo.png" alt="Logo Proβability">

    </div>
    <div class="content">
        <h2>Bienvenue sur notre site !</h2>
        <p>Ce site vous permet d'accéder à différents
            modules pour effectuer des calculs complexes.</p>



        <?php
        if (isset($_SESSION['login'])) {
            echo($_SESSION['login']);
        }else{
            echo("pas de session");
        } ?>

    </div>
</div>

<?php include '../includes/footer.php'; ?>

</body>
</html>