<?php
require '../fonctions/Database.php';
require '../fonctions/fonctionsDroits.php';
include '../includes/profil.php';
include '../includes/navbar.php';
include '../includes/header.php';


addUserCheck();  //Vérification des droits d'accès

// Démarrage de la session
//session_start();

// Traitement des actions
if (isset($_GET['action'])) {
    $action = $_GET['action'];

    // Action: Télécharger un fichier log
    if ($action === 'download' && isset($_GET['file'])) {
        $file = basename($_GET['file']);
        $filePath = '../logs/'.$file;

        if (file_exists($filePath) && pathinfo($filePath, PATHINFO_EXTENSION) === 'json') {
            header('Content-Description: File Transfer');
            header('Content-Type: application/json');
            header('Content-Disposition: attachment; filename="'.$file.'"');
            header('Expires: 0');
            header('Cache-Control: must-revalidate');
            header('Pragma: public');
            header('Content-Length: '.filesize($filePath));
            readfile($filePath);
            exit;
        }
    }

    // Action: Supprimer un fichier log
    if ($action === 'delete' && isset($_GET['file'])) {
        $file = basename($_GET['file']);
        $filePath = '../logs/'.$file;

        if (file_exists($filePath) && pathinfo($filePath, PATHINFO_EXTENSION) === 'json') {
            if (unlink($filePath)) {
                $deleteSuccess = "Le fichier $file a été supprimé avec succès.";
            } else {
                $deleteError = "Impossible de supprimer le fichier $file.";
            }
        }
    }
}

// Fonction pour récupérer la liste des fichiers logs
function getLogFiles() {
    $logDir = '../logs/';
    $logFiles = [];

    if (is_dir($logDir)) {
        $files = scandir($logDir);
        foreach ($files as $file) {
            if ($file !== '.' && $file !== '..' && pathinfo($file, PATHINFO_EXTENSION) === 'json') {
                $logFiles[] = $file;
            }
        }
        // Trier les fichiers par date (du plus récent au plus ancien)
        rsort($logFiles);
    }

    return $logFiles;
}

// Récupération de la liste des fichiers logs
$logFiles = getLogFiles();
?>
<body>
<div class="container">
    <!-- Sidebar avec la liste des fichiers logs -->
    <div class="sidebar">
        <h2>Fichiers de logs</h2>
        <?php if (empty($logFiles)): ?>
            <p>Aucun fichier log disponible.</p>
        <?php else: ?>
            <?php foreach ($logFiles as $logFile): ?>
                <div class="log-file" onclick="loadLogFile('<?php echo $logFile; ?>')">
                    <div><?php echo $logFile; ?></div>
                    <div class="log-file-actions">
                        <a href="?action=download&file=<?php echo urlencode($logFile); ?>" class="btn-small">Télécharger</a>
                        <a href="javascript:void(0)" onclick="confirmDelete('<?php echo $logFile; ?>'); event.stopPropagation();" class="btn-small btn-danger">Supprimer</a>
                    </div>
                </div>
            <?php endforeach; ?>
        <?php endif; ?>
    </div>

    <!-- Contenu principal -->
    <div class="content">

        <?php if (isset($deleteSuccess)): ?>
            <div class="notification success"><?php echo $deleteSuccess; ?></div>
        <?php endif; ?>

        <?php if (isset($deleteError)): ?>
            <div class="notification error"><?php echo $deleteError; ?></div>
        <?php endif; ?>

        <!-- Zone de drag & drop pour les fichiers JSON -->
        <div id="dropZone" class="drop-zone">
            <p>Glissez-déposez un fichier log JSON ici pour visualiser son contenu</p>
            <p>ou</p>
            <label for="fileInput" class="btn">Sélectionner un fichier</label>
            <input type="file" id="fileInput" style="display: none;" accept=".json">
        </div>

        <!-- Zone d'affichage du contenu JSON -->
        <div id="jsonContent" class="json-content" style="display: none;"></div>
    </div>
</div>

<script>
    // Fonction pour charger un fichier log depuis le serveur
    function loadLogFile(fileName) {
        fetch('../logs/' + fileName)
            .then(response => response.json())
            .then(data => {
                displayJsonData(data, fileName);
            })
            .catch(error => {
                console.error('Erreur lors du chargement du fichier:', error);
                alert('Erreur lors du chargement du fichier: ' + error.message);
            });
    }

    // Fonction pour confirmer la suppression d'un fichier
    function confirmDelete(fileName) {
        if (confirm('Êtes-vous sûr de vouloir supprimer le fichier ' + fileName + ' ?')) {
            window.location.href = '?action=delete&file=' + encodeURIComponent(fileName);
        }
    }

    // Fonction pour afficher les données JSON
    function displayJsonData(data, fileName) {
        const jsonContent = document.getElementById('jsonContent');
        jsonContent.style.display = 'block';
        jsonContent.innerHTML = '<h2>Contenu du fichier: ' + fileName + '</h2>';

        if (Array.isArray(data)) {
            data.forEach(entry => {
                const logEntry = document.createElement('div');
                logEntry.className = 'log-entry';
                logEntry.innerHTML = `
                        <p><strong>Date:</strong> ${entry.jour}</p>
                        <p><strong>Heure:</strong> ${entry.heure}</p>
                        <p><strong>IP:</strong> ${entry.ip}</p>
                        <p><strong>Login:</strong> ${entry.login}</p>
                    `;
                jsonContent.appendChild(logEntry);
            });
        } else {
            // Si le format n'est pas celui attendu, afficher le JSON brut
            jsonContent.innerHTML += '<pre>' + JSON.stringify(data, null, 2) + '</pre>';
        }
    }

    // Configuration du drag & drop
    const dropZone = document.getElementById('dropZone');
    const fileInput = document.getElementById('fileInput');

    // Événements pour le drag & drop
    ['dragenter', 'dragover', 'dragleave', 'drop'].forEach(eventName => {
        dropZone.addEventListener(eventName, preventDefaults, false);
    });

    function preventDefaults(e) {
        e.preventDefault();
        e.stopPropagation();
    }

    ['dragenter', 'dragover'].forEach(eventName => {
        dropZone.addEventListener(eventName, highlight, false);
    });

    ['dragleave', 'drop'].forEach(eventName => {
        dropZone.addEventListener(eventName, unhighlight, false);
    });

    function highlight() {
        dropZone.classList.add('active');
    }

    function unhighlight() {
        dropZone.classList.remove('active');
    }

    // Gestion de la dépose de fichier
    dropZone.addEventListener('drop', handleDrop, false);

    function handleDrop(e) {
        const dt = e.dataTransfer;
        const files = dt.files;
        handleFiles(files);
    }

    // Gestion de la sélection de fichier via l'input
    fileInput.addEventListener('change', function() {
        handleFiles(this.files);
    });

    // Traitement des fichiers
    function handleFiles(files) {
        if (files.length > 0) {
            const file = files[0];

            if (file.type === 'application/json' || file.name.endsWith('.json')) {
                const reader = new FileReader();

                reader.onload = function(e) {
                    try {
                        const data = JSON.parse(e.target.result);
                        displayJsonData(data, file.name);
                    } catch (error) {
                        alert('Erreur lors de l\'analyse du fichier JSON: ' + error.message);
                    }
                };

                reader.readAsText(file);
            } else {
                alert('Veuillez sélectionner un fichier JSON.');
            }
        }
    }

    // Rendre l'input file cliquable depuis le drop zone
    document.querySelector('label[for="fileInput"]').addEventListener('click', function() {
        fileInput.click();
    });

</script>


</body>
<?php include '../includes/footer.php'; ?>