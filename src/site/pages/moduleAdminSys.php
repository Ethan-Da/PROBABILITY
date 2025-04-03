<?php
require '../fonctions/Database.php';
require '../fonctions/fonctionsDroits.php';
include '../includes/profil.php';
include '../includes/navbar.php';
include '../includes/header.php';

addUserCheck();  //Vérification des droits d'accès

// Fonction pour récupérer le chemin absolu des logs
function getLogPath() {
    // Utilisez le chemin réel vers votre dossier de logs
    return __DIR__ . '/logs'; // Ajustez selon votre structure de dossiers
}

// Traitement des actions
if (isset($_GET['action'])) {
    $action = $_GET['action'];

    // Action: Télécharger un fichier log
    if ($action === 'download' && isset($_GET['file'])) {
        $file = basename($_GET['file']);
        $filePath = getLogPath() . '/' . $file;

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
        } else {
            http_response_code(404);
            echo json_encode(['error' => 'Fichier non trouvé']);
            exit;
        }
    }

    // Action: Supprimer un fichier log
    if ($action === 'delete' && isset($_GET['file'])) {
        $file = basename($_GET['file']);
        $filePath = getLogPath() . '/' . $file;

        if (file_exists($filePath) && pathinfo($filePath, PATHINFO_EXTENSION) === 'json') {
            if (unlink($filePath)) {
                $deleteSuccess = "Le fichier $file a été supprimé avec succès.";
            } else {
                $deleteError = "Impossible de supprimer le fichier $file.";
            }
        }
    }

    // Action: Récupérer un fichier log via AJAX
    if ($action === 'getlog' && isset($_GET['file'])) {
        $file = basename($_GET['file']);
        $filePath = getLogPath() . '/' . $file;

        if (file_exists($filePath) && pathinfo($filePath, PATHINFO_EXTENSION) === 'json') {
            header('Content-Type: application/json');
            echo file_get_contents($filePath);
            exit;
        } else {
            http_response_code(404);
            echo json_encode(['error' => 'Fichier non trouvé']);
            exit;
        }
    }
}

// Fonction pour récupérer la liste des fichiers logs
function getLogFiles() {
    $logDir = getLogPath();
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
                    <div class="log-file" id="<?php echo $logFile; ?>" draggable="true" ondragstart="dragstartHandler(event, '<?php echo $logFile; ?>')"
                         onclick="loadLogFile('<?php echo $logFile; ?>')">
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
            <div id="jsonContent" class="json-content" style="display: none;">
                <h2 id="json-content-title"></h2>
                <table class="historique">
                    <thead>
                    <tr>
                        <th>Date</th>
                        <th>Heure</th>
                        <th>IP</th>
                        <th>login</th>
                        <th>success</th>
                    </tr>
                    </thead>
                    <tbody id="json-cont">

                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <script>
        // Fonction pour charger un fichier log depuis le serveur
        function loadLogFile(fileName) {
            // Utiliser une URL dédiée pour récupérer les fichiers JSON
            fetch('?action=getlog&file=' + encodeURIComponent(fileName))
                .then(response => {
                    if (!response.ok) {
                        throw new Error('Erreur HTTP ' + response.status);
                    }
                    return response.json();
                })
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

        // Fonction pour normaliser les données JSON en format standard
        function normalizeLogData(data) {
            // Si les données sont déjà au format attendu
            if (data.logs && typeof data.logs === 'object') {
                return data;
            }

            // Convertir d'autres formats en format standard
            let normalizedData = {
                logs: {}
            };

            // Format tableau
            if (Array.isArray(data)) {
                data.forEach((entry, index) => {
                    let timeKey = entry.time || entry.timestamp || ('entry_' + index);
                    normalizedData.logs[timeKey] = {
                        date: entry.date || '',
                        ip: entry.ip || '',
                        login: entry.login || entry.user || entry.username || '',
                        success: entry.success !== undefined ? entry.success :
                            (entry.status === 'success' ? true : (entry.status === 'failure' ? false : false))
                    };
                });
            }
            // Format objet plat ou autre
            else if (typeof data === 'object') {
                // Vérifier si c'est un objet simple ou une collection d'objets
                if (data.date || data.ip || data.login || data.user || data.username) {
                    // Objet simple
                    let timeKey = data.time || data.timestamp || 'entry_0';
                    normalizedData.logs[timeKey] = {
                        date: data.date || '',
                        ip: data.ip || '',
                        login: data.login || data.user || data.username || '',
                        success: data.success !== undefined ? data.success :
                            (data.status === 'success' ? true : (data.status === 'failure' ? false : false))
                    };
                } else {
                    // Collection d'objets avec des clés comme identifiants
                    Object.entries(data).forEach(([key, value]) => {
                        if (typeof value === 'object') {
                            normalizedData.logs[key] = {
                                date: value.date || '',
                                ip: value.ip || '',
                                login: value.login || value.user || value.username || '',
                                success: value.success !== undefined ? value.success :
                                    (value.status === 'success' ? true : (value.status === 'failure' ? false : false))
                            };
                        }
                    });
                }
            }

            return normalizedData;
        }

        // Fonction pour afficher les données JSON
        function displayJsonData(data, fileName) {
            const jsonContent = document.getElementById('jsonContent');
            const contentTitle = document.getElementById('json-content-title');
            const tbody = document.getElementById('json-cont');

            // Réinitialiser le contenu
            contentTitle.textContent = '';
            tbody.innerHTML = "";

            try {
                // Normaliser les données pour les rendre compatibles
                const normalizedData = normalizeLogData(data);

                // Afficher le titre
                contentTitle.textContent = 'Contenu du fichier: ' + fileName;
                jsonContent.style.display = 'block';

                // Transformer les données en tableau pour l'affichage
                const logsList = Object.entries(normalizedData.logs).map(([time, log]) => [
                    log.date || '',
                    time || '',
                    log.ip || '',
                    log.login || '',
                    log.success !== undefined ? log.success : ''
                ]);

                console.log('Données normalisées:', logsList);

                // Afficher les données dans le tableau
                for (let i = 0; i < logsList.length; i++) {
                    const logEntry = document.createElement('tr');
                    logEntry.className = 'log-entry';

                    // Assurer que toutes les données sont affichées correctement (conversion de booléens en texte)
                    const displayValues = logsList[i].map(value => {
                        if (typeof value === 'boolean') {
                            return value ? 'true' : 'false';
                        }
                        return value;
                    });

                    logEntry.innerHTML = `
                    <td><p>${displayValues[0]}</p></td>
                    <td><p>${displayValues[1]}</p></td>
                    <td><p>${displayValues[2]}</p></td>
                    <td><p>${displayValues[3]}</p></td>
                    <td><p>${displayValues[4]}</p></td>
                `;
                    tbody.appendChild(logEntry);
                }
            } catch (error) {
                console.error('Erreur lors du traitement des données:', error);

                // Afficher un message d'erreur
                contentTitle.textContent = 'Erreur de traitement du fichier: ' + fileName;
                jsonContent.style.display = 'block';

                const errorRow = document.createElement('tr');
                errorRow.innerHTML = `
                <td colspan="5"><p class="error">Impossible d'interpréter le fichier. Format non compatible.</p></td>
            `;
                tbody.appendChild(errorRow);
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

        function dragstartHandler(event, fileName) {
            event.dataTransfer.setData("id", fileName);
            console.log(fileName.toString());
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
            console.log(e.dataTransfer.files.length);
            if (e.dataTransfer.files.length > 0) {
                const dt = e.dataTransfer;
                const files = dt.files;
                handleFiles(files);
            }
            else {
                loadLogFile(e.dataTransfer.getData("id"))
            }
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