<?php
if (isset($_SESSION["login"])){
    $first = mb_substr($_SESSION["login"], 0, 1);
    $connecte = true;
} else {
    $first = "?";
    $connecte = false;
}
?>



<div id="profil" class="profile-panel hidden">
    <?php if ($connecte): ?>
        <div class="profile-header">
            <div class="profile-icon"><?php echo $first; ?></div>
            <p class="profile-name"><?php echo $_SESSION['login']; ?></p>
        </div>
        <a href="../pages/actions/logout.php" class="profile-link">Logout</a>
        <button id="close-button">close</button>
    <?php else: ?>
        <div class="profile-header">
            <div class="profile-icon"><?php echo $first; ?></div>
            <h1 class="profile-name">Visiteur</h1>
        </div>
        <a href="../pages/connexion.php" class="profile-link">Connexion</a>
        <a href="../pages/inscription.php" class="profile-link">Inscription</a>
        <button id="close-button">Close</button>
    <?php endif; ?>
</div>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        const openBtn = document.getElementById('button');
        const closeBtn = document.getElementById('close-button');
        const sidePanel = document.getElementById('profil');

        function togglePanel(show) {
            sidePanel.classList.toggle('hidden', !show);
            sidePanel.classList.toggle('visible', show);
        }

        openBtn.addEventListener('click', function() {
            const isHidden = sidePanel.classList.contains('hidden');
            togglePanel(isHidden);
        });

        closeBtn.addEventListener('click', function() {
            togglePanel(false);
        });
    });
</script>