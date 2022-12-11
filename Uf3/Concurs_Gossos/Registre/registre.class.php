<?php
    require_once '../conexio.class.php';
    session_start();
    class Registre
    {
     
        private static $instancia;
        private $dbh;
     
        private function __construct()
        {
     
            $this->dbh = Conexion::singleton_conexion();
     
        }
     
        public static function singleton_Registre()
        {
     
            if (!isset(self::$instancia)) {
     
                $miclase = __CLASS__;
                self::$instancia = new $miclase;
     
            }
     
            return self::$instancia;
     
        }
    
        public function registre_usuaris($nom,$password)
        {
          if (isset($_POST['register'])) {

                $nom = $_POST['nom'];
                $password = $_POST['password'];
             
                $query = $this->dbh->prepare("SELECT * FROM usuaris WHERE NOM=:nom");
                $query->bindParam("nom", $nom, PDO::PARAM_STR);
                $query->execute();
             
                if ($query->rowCount() > 0) {
                    echo '<p class="error">El nom ja ha sigut registrat!</p>';
                }
             
                if ($query->rowCount() == 0) {
                    $query = $this->dbh->prepare("INSERT INTO usuaris(nom,password) VALUES (:nom,:password)");
                    $query->bindParam("nom", $nom, PDO::PARAM_STR);
                    $query->bindParam("password", $password, PDO::PARAM_STR);
                    $result = $query->execute();
             
                    if ($result) {
                        echo '<p class="success">Your registration was successful!</p>';
                    } else {
                        echo '<p class="error">Something went wrong!</p>';
                    }
                }
            }
        }
 
    }
?>