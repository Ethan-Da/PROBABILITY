<?php include '../includes/header.php';
?>

<title>Module3</title>
</head>
<body>

<?php include '../includes/navbar.php'; ?>



<div class="container">
    <h1>Module 3</h1>
    <div class="content">
        <form action="calcul.php" METHOD="post" class="form-damier">
            <label for="E"> Espérance : </label>
            <input type="number" name="E" id="E">
            <label for="F"> Forme : </label>
            <input type="number" name="F" id="F">
            <label for="T"> t tel que P(X<\t) : </label>
            <input type="number" name="T" id="T">
            <label for="N"> N : </label>
            <input type="number" name="N" id="N">
            <label for="Methode"> Méthode de calcul : </label>
            <input type="text" name="Methode" id="Methode">
            <input type="submit" name="OK" id="OK" value="Valider">
        </form>
    </div>



</div>

<?php include '../includes/footer.php'; ?>

</body>
</html>
