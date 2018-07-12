<?php

class Security {
    
    private static $seed = 'dyson4b3t3rl1fe';

    static public function getSeed() {
        return self::$seed;
    }

    static function chiffrer($texte_en_clair) {
        $texte_chiffre = hash('sha256', $texte_en_clair . Security::getSeed());
        return $texte_chiffre;
    }
	
	static function generateRandomHex() {
		// Generate a 32 digits hexadecimal number
		$numbytes = 16; // Because 32 digits hexadecimal = 16 bytes
		$bytes = openssl_random_pseudo_bytes($numbytes); 
		$hex   = bin2hex($bytes);
		return $hex;
	}
    
}

?>