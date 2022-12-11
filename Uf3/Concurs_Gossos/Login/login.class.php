<?php
    require_once '../conexio.class.php';
    session_start();
    class Login
    {
     
        private static $instancia;
        private $dbh;
     
        private function __construct()
        {
     
            $this->dbh = Conexion::singleton_conexion();
     
        }
     
        public static function singleton_login()
        {
     
            if (!isset(self::$instancia)) {
     
                $miclase = __CLASS__;
                self::$instancia = new $miclase;
     
            }
     
            return self::$instancia;
     
        }
    
        public function login_usuaris($nom,$password)
        {
            
            try {
                
                $sql = "SELECT * from usuaris WHERE nom = ? AND password = ?";
                $query = $this->dbh->prepare($sql);
                $query->bindParam(1,$nom);
                $query->bindParam(2,$password);
                $query->execute();
                $this->dbh = null;
     
                //si existeix l'usuario
                if($query->rowCount() == 1)
                {
                     $fila  = $query->fetch();
                     $_SESSION['nom'] = $fila['nom'];                 
                     return TRUE;
        
                }
                
            }catch(PDOException $e){
                
                print "Error!: " . $e->getMessage();
                
            }        
            
        }
 
    }
?>
