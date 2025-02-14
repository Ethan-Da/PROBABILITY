<?php

require_once '../site/fonctions/RC4Cipher.php';
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Tests RC4</title>
    <link rel="stylesheet" type="text/css" href="../site/CSS/style.css">
</head>
<body>
    <h1>Résultats des Tests RC4</h1>
    <?php testRC4(); ?>
</body>
</html>

<?php
function testRC4() {
    $tests = [
        ['key' => 'Key', 'plaintext' => 'Plaintext'],
        ['key' => 'Wiki', 'plaintext' => 'pedia'],
        ['key' => 'Secret', 'plaintext' => 'Attack at dawn']
    ];

    foreach ($tests as $test) {
        $rc4 = new RC4Cipher($test['key']);
        $encrypted = $rc4->encrypt($test['plaintext']);
        $decrypted = $rc4->decrypt($encrypted);

        // Affichage des résultats avec HTML
        echo "<div class='test-result-RC4'>";
        echo "<h3>Test avec clé: " . htmlspecialchars($test['key']) . "</h3>";
        echo "<p><strong>Texte original:</strong> " . htmlspecialchars($test['plaintext']) . "</p>";
        echo "<p><strong>Texte chiffré (hex):</strong> " . htmlspecialchars($encrypted) . "</p>";
        echo "<p><strong>Texte déchiffré:</strong> " . htmlspecialchars($decrypted) . "</p>";
        echo "</div>";
    }
}
?>
