<?php

//1

$sp = "kfhxivrozziuortghrvxrrkcrozxlwflrh";
$mr = " hv ovxozwozv vj o vfrfjvivfj h vmzvlo e hrxvhlmov oz ozx.vw z xve hv loqvn il hv lmnlg izxvwrhrvml ,hv b lh mv,rhhv mf w zrxvlrh.m";
$alphabet = range('a', 'z');
$reverse_alphabet = array_reverse($alphabet);

echo decrypt($sp);
echo "<br>";
echo decrypt($mr);

function decrypt($s){
      $arr1 = str_split($s, 3);
      foreach ($arr1 as $string) {
        $string = strrev($string);
        $string = Contrari($string);
        echo $string; 
      }

}

function Contrari($arr1){
    $final_string = "";
    global $alphabet, $reverse_alphabet;

    $array_char = str_split($arr1);
    foreach ($array_char as $string) {
        $pos = array_search($string, $alphabet);
        if ($pos != false){
            $string = $reverse_alphabet[$pos];
            $final_string .= $string;
        } else{
            $final_string .= $string;
        }
    }
    return $final_string;
}

//2

$simple_string = "Hola bon dia";

//  Mostrant la string original 
echo "String Original: " . $simple_string . "<br>";

// Storingthe cipher method 
$ciphering = "AES-128-CTR";

// Utilitzant OpenSSl Encryption method 
$iv_length = openssl_cipher_iv_length($ciphering);
$options   = 0;

// Non-NULL Initialization Vector for encryption 
$encryption_iv = '1234567891011121';

// Storing the encryption key 
$encryption_key = "W3docs";

// Using openssl_encrypt() funcio cap a encriptar data 
$encryption = openssl_encrypt($simple_string, $ciphering, $encryption_key, $options, $encryption_iv);

// Mostrant la string encriptada 
echo "String Encriptada: " . $encryption . "<br>";

// Non-NULL Initialization Vector for decryption 
$decryption_iv = '1234567891011121';

// Guardant la decryption key 
$decryption_key = "W3docs";

// Fent servir openssl_decrypt() funcio cap a desencriptar data 
$decryption = openssl_decrypt($encryption, $ciphering, $decryption_key, $options, $decryption_iv);

// Desencripta string 
echo "Decrypted String: " . $decryption."<br>";


//3

    $Misatge = "Vull ser encriptat";
    echo "Original: ".$Misatge."<br>";    
    echo xifrar($Misatge);

    function xifrar($b) {
        $arr2 = str_split($b, 5);
        foreach ($arr2 as $strin) {
          $strin = strrev($strin);
          $strin = Contrari($strin);
          echo $strin; 
    }
    }

?>