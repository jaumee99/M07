<?php

class UserService
{
    protected $_name;
    protected $_password;

    protected $_db;       // guarda database
    protected $_user;     // guarda user data

    public function __construct(PDO $db, $name, $password) 
    {
       $this->_db = $db;
       $this->_name = $name;
       $this->_password = $password;
    }

    public function login()
    {
        $user = $this->_comporvarExist();
        if ($user) {
            $this->_user = $user;
            $_SESSION['user_id'] = $user['id'];
            return $user['id'];
        }
        return false;
    }

    protected function _comporvarExist()
    {
        $stmt = $this->_db->prepare('SELECT * FROM users WHERE name=?');
        $stmt->execute(array($this->name));
        if ($stmt->rowCount() > 0) {
            $user = $stmt->fetch(PDO::FETCH_ASSOC);
            $submitted_pass = sha1($user['salt'] . $this->_password);
            if ($submitted_pass == $user['password']) {
                return $user;
            }
        }
        return false;
    }

    public function getUser()
    {
        return $this->_user;
    }
}

?>