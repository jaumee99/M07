<?php
require_once './registre.class.php';

$nuevoSingleton = Registre::singleton_Registre();
 
if(isset($_POST['nom']))
{
    $nom = $_POST['nom'];
    $password = $_POST['password'];
    $usuario = $nuevoSingleton->registre_usuaris($nom,$password);
    
    if($usuario == TRUE)
    {
        header("Location:/M07/Uf3/Concurs_Gossos/admin.php?");
    }
}
?>