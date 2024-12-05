<?php
$first = mb_substr($_SESSION["login"], 0, 1);
?>

<div id="profil" class="hidden">
    <div class="icone">
            <?php echo $first?>
        </a>
    </div>
    <button id="close-button">close</button>
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
