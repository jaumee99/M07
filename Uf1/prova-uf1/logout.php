<?php
session_start();

//hauria de borrar les dades de sessio i tornar a index
unset($_SESSION['sessio']);
header('http://localhost/prova-uf1/index.php');

?>