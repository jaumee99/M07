<?php
require_once './login.class.php';

$nuevoSingleton = Login::singleton_login();
 
if(isset($_POST['nom']))
{
    $nom = $_POST['nom'];
    $password = $_POST['password'];
    $usuario = $nuevoSingleton->login_usuaris($nom,$password);
    
    if($usuario == TRUE)
    {
        header("Location:/M07/Uf3/Concurs_Gossos/admin.php?");
    }
}
?>