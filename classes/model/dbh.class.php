<?php

class Dbh{

    static private $instance = null;

    private $servername;
    private $username;
    private $password;
    private $dbname;
    private $charset;

    protected function connect(){

        $this->servername = DB_SERVERNAME;
        $this->username = DB_USERNAME;
        $this->password = DB_PASSWORD;
        $this->dbname = DB_NAME;
        $this->charset = "utf8mb4";

        if (!self::$instance) {
            try{
                $dsn = "mysql:host=".$this->servername.";dbname=".$this->dbname.";charset=".$this->charset;
                $pdo = new PDO($dsn, $this->username, $this->password);
                $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                $pdo->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);

                self::$instance = $pdo;
            
            }catch (PDOException $e){
                echo "Connection failed: ".$e->getMessage();
            }
        }

        return self::$instance;
    }

}

?>