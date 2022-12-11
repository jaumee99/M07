<?php
class Conexion{
	    
    private static $instancia;
    private $dbh;
 
    private function __construct()
    {
        try {
            $hostname = "localhost";
            $dbname = "concurs_gossos";
            $username = "root";
            $pw = "";
            $this->dbh = new PDO("mysql:host=$hostname;dbname=$dbname","$username","$pw");
            
        } catch (PDOException $e) {
            echo "Failed to get DB handle: " . $e->getMessage() . "\n";
            exit;
        }
    }
 
    public function prepare($sql)
    {
 
        return $this->dbh->prepare($sql);
 
    }
 
    public static function singleton_conexion()
    {
 
        if (!isset(self::$instancia)) {
            $miclase = __CLASS__;
            self::$instancia = new $miclase;
 
        }
 
        return self::$instancia;
        
    }
 
}
?>
