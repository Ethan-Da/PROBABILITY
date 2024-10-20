<header style="background-color: #666666; padding: 10px 20px; display: flex; align-items: center; justify-content: space-between;">
    <div style="display: flex; align-items: center; justify-content: center; width: 100%;">
        <a href="index.php">
        <img src="../images/logo2.png" alt="Logo" style="height: 40px; margin-right: 20px;">
        </a>
        <nav>
            <ul style="list-style-type: none; padding: 0; display: flex;">
                <li style="margin-right: 20px;"><a href="index.php" style="color: white; text-decoration: none;" onmouseover="this.classList.add('active')" onmouseout="this.classList.remove('active')">Accueil</a></li>
                <li style="margin-right: 20px;"><a href="module1.php" style="color: white; text-decoration: none;" onmouseover="this.classList.add('active')" onmouseout="this.classList.remove('active')">Module1</a></li>
                <li style="margin-right: 20px;"><a href="module2.php" style="color: white; text-decoration: none;" onmouseover="this.classList.add('active')" onmouseout="this.classList.remove('active')">Module2</a></li>
            </ul>
        </nav>
    </div>
    <div style="background-color: white; height: 40px; width: 40px; border-radius: 50%;">
        <a href="Formulaire.php" style="display: block; width: 100%; height: 100%;"></a>
    </div>
</header>

<style>
    a.active {
        color: #000;
        background-color: #b0d8f8;
        padding: 5px 10px;
        border-radius: 5px;
    }
</style>