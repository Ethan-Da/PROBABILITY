<?php
class RC4Cipher {
    private $S = array();
    private $key;

    public function __construct($key) {
        $this->key = $key;
    }

    /**
     * Implémente l'algorithme KSA (Key Scheduling Algorithm)
     * Initialise le tableau de permutation S avec la clé fournie
     */
    private function initializeState() {
        // Initialisation du tableau S avec les valeurs de 0 à 255
        for ($i = 0; $i < 256; $i++) {
            $this->S[$i] = $i;
        }

        // Mélange du tableau S en fonction de la clé
        $j = 0;
        $keyLength = strlen($this->key);

        for ($i = 0; $i < 256; $i++) {
            // Calcul de j selon l'algorithme KSA
            $j = ($j + $this->S[$i] + ord($this->key[$i % $keyLength])) % 256;

            // Échange des valeurs
            $temp = $this->S[$i];
            $this->S[$i] = $this->S[$j];
            $this->S[$j] = $temp;
        }
    }

    /**
     * Génère la suite chiffrante selon l'algorithme PRGA
     * @param int $length Longueur de la suite chiffrante désirée
     * @return string Suite chiffrante en hexadécimal
     */
    private function generateKeystream($length) {
        $i = 0;
        $j = 0;
        $keystream = '';

        // Initialisation de l'état avec KSA
        $this->initializeState();

        // Génération de la suite chiffrante
        for ($k = 0; $k < $length; $k++) {
            $i = ($i + 1) % 256;
            $j = ($j + $this->S[$i]) % 256;

            // Échange des valeurs
            $temp = $this->S[$i];
            $this->S[$i] = $this->S[$j];
            $this->S[$j] = $temp;

            // Génération de l'octet de la suite chiffrante
            $t = ($this->S[$i] + $this->S[$j]) % 256;
            $keystream .= sprintf("%02X", $this->S[$t]);
        }

        return $keystream;
    }

    /**
     * Chiffre un texte avec RC4
     * @param string $plaintext Texte à chiffrer
     * @return string Texte chiffré en hexadécimal
     */
    public function encrypt($plaintext) {
        $length = strlen($plaintext);
        $keystream = $this->generateKeystream($length);
        $ciphertext = '';

        // XOR entre le texte clair et la suite chiffrante
        for ($i = 0; $i < $length; $i++) {
            $ciphertext .= sprintf("%02X",
                ord($plaintext[$i]) ^ hexdec(substr($keystream, $i * 2, 2))
            );
        }

        return $ciphertext;
    }

    /**
     * Déchiffre un texte chiffré avec RC4
     * @param string $ciphertext Texte chiffré en hexadécimal
     * @return string Texte déchiffré
     */
    public function decrypt($ciphertext) {
        $length = strlen($ciphertext) / 2; // Car le texte chiffré est en hex
        $keystream = $this->generateKeystream($length);
        $plaintext = '';

        // XOR entre le texte chiffré et la suite chiffrante
        for ($i = 0; $i < $length; $i++) {
            $plaintext .= chr(
                hexdec(substr($ciphertext, $i * 2, 2)) ^
                hexdec(substr($keystream, $i * 2, 2))
            );
        }

        return $plaintext;
    }
}
?>