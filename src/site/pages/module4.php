<?php include '../includes/header.php';
require_once '../fonctions/fonctionsDroits.php';
include '../includes/profil.php'

//addSubscribedUserCheck();  Vérification des droits d'accès
?>

<title>Module1</title>
</head>
<body>

<?php include '../includes/navbar.php'; ?>


<div class="container">
    <div class="content">
        <div class="titre" id="m3">
        <h2a style="color: goldenrod;">{</h2a>
        <h2b style="color: goldenrod;">Module 4</h2b>
        <h2c style="color: goldenrod;">}</h2c>
        </div>
    <p class="eb-garamond-text" style="color: goldenrod; font-size: 20px;">Des choses extraordinaires se passeront dans ce module.</p>
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
