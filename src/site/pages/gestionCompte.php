
<?php include '../includes/header.php'; ?>
<title>Proβability - Accueil</title>
</head>
<body>
<?php include '../includes/navbar.php'; ?>



<div class="container">
    <?php
        $database = new Database();


        database->userQuery("SELECT", "SELECT * FROM compte where login = ?;", "s", array("test"));


        $result = mysqli_query($database, "SELECT * FROM compte;");
        $row = mysqli_fetch_assoc($result);
        echo $row['password'];
        echo "<br>";
        echo mysqli_get_host_info($database);






    /*INSERT INTO compte(login, password) VALUES ('test1', md5('test1'));
    DELETE * FROM compte WHERE login == 'test1';
    */

    ?>
</div>

<?php include '../includes/footer.php'; ?>

</body>
</html>
