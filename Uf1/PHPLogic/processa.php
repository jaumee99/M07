<?php 
session_start();

function comprovar(){
    $paraula = $_POST["paraula"];
    $funcions = get_defined_functions();
    $rand = strtolower(implode($_SESSION['lletres']));
    $rand2 = strtolower($_SESSION['lletraMig']);
    $regex = "/^[". $rand ."]*[" . $rand2 . "]+[". $rand ."]*$/";

    if (preg_match($regex, $paraula)) {
        if(in_array($_SESSION['lletraMig'], $funcions["internal"])){
            if(in_array($_SESSION['lletres'], $funcions["internal"])){

            } else {
                $_SESSION["error"] = "ja hi es";
            }
        } else {
            $_SESSION["error"] = "no existeix la funcio";
        }
    } else {
        $_SESSION["error"] = "no te la lletra del mig";
    }
}

comprovar();

?>