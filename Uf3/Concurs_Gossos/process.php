<?php
require_once './conexio.class.php';
session_start();

if($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['sumbit'])) {
    $conn = Conexion::singleton_conexion();
    if(isset($_POST['idGos']) && isset($_POST['nom']) && isset($_POST['img']) && isset($_POST['amo']) && isset($_POST['raza'])) {
        $idGos = $_POST['idGos'];
        $nom = $_POST['nom'];
        $img = $_POST['img'];
        $amo = $_POST['amo'];
        $raza = $_POST['raza'];

        $sql= "INSERT INTO `users` (`idGos`, `nom`, `img`, `amo`, `raza`) VALUES ('$idGos', '$nom', '$img', '$amo', '$raza')";

        $query = mysqli_query($conn,$sql);

    }
}

?>