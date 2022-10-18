<?php 
session_start();

function comprovar(){
    $paraula = $_POST["paraula"];
    $funcions = get_defined_functions();
    if($paraula == $funcions["internal"]) {
    }
}

comprovar();

?>