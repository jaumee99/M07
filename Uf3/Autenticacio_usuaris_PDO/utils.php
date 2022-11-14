<?php
const SELECT_USERS = "select * from users";
const SELECT_CONNECTION = "select * from connections";

//Conectar-se a la base de dades
function Connect()
{
    try {
        $hostname = "localhost";
        $dbname = "dwes_jaumecasamitjana_autpdo";
        $username = "dwes_jaume";
        $pw = "dwes_jaume";
        $pdo = new PDO("mysql:host=$hostname;dbname=$dbname","$username","$pw");
        return $pdo;
    } catch (PDOException $e) {
        echo "Failed to get DB handle: " . $e->getMessage() . "\n";
        exit;
    }
}

/**
 * Llegeix les dades del fitxer. Si el document no existeix torna un array buit.
 *
 * @param string $file
 * @return array
 */
function llegeix(string $select) : array
{
    $pdo = Connect();
    $query = $pdo->prepare($select);
    $query->execute();

    return $query->fetch();
}

/**
 * Guarda les dades a un fitxer
 *
 * @param array $dades
 * @param string $file
 */
function escriuUser(string $email, string $password, string $name): void
{
    $pdo = Connect();    

    $sql = "INSERT INTO users (`email`, `password`, `name`) VALUES(?, MD5(?), ?)";
    $stmt = $pdo->prepare($sql);
    $stmt->execute(array($email, $password, $name));
}

function escriuConection(string $ip, string $email, string $time, string $status): void
{
    $pdo = Connect();    

    $sql = "INSERT INTO connections (`ip`, `email`, `time`, `status`) VALUES(?, ?, ?, ?)";
    $stmt = $pdo->prepare($sql);
    $stmt->execute(array($ip, $email, $time, $status));
}

/**
 * Mostra les connexions d'un usuari amb status success
 *
 * @param string $email
 * @return string
 */
function print_conns(string $email): string{
    $output = "";
    $data = llegeix(SELECT_CONNECTION);

    foreach ($data as $vals){
        if($vals["email"] == $email && str_contains($vals["status"], "success"))
            $output .= "Connexió des de " . $vals["ip"] . " amb data " . $vals["time"]. "<br>\n";
    }

    return $output;
}
