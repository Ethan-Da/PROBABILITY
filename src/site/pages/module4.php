<?php include '../includes/header.php';
require_once '../fonctions/fonctionsDroits.php';
include '../includes/profil.php';

addUserCheck();  //Vérification des droits d'accès
?>

<title>Module1</title>
</head>
<body>

<?php include '../includes/navbar.php'; ?>


<div class="container" style="background-color: #666666 ">
    <div class="content" style="">
        <div class="titre" id="m3">
            <h2a style="color: #00ffff;">{</h2a>
            <h2b style="color: #00ffff; background-color: #666666">Module 4</h2b>
            <h2c style="color: #00ffff;">}</h2c>
        </div>
        <p class="eb-garamond-text" style="color: #00ffff; font-size: 20px; opacity: 1;">Des choses extraordinaires se passeront dans ce module.</p>
    </div>
</div>

<?php include '../includes/footer.php';

/**
if (!isset($_SESSION["login"])) {
header("location:index.php");
}
 */
?>

</body>
</html>
