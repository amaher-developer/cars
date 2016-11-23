<?php


abstract class Database {

    static private $connection;
    
    static public function connect($server, $username, $password, $database){
        Database::$connection = mysqli_connect($server, $username, $password, $database);
        //mysql_select_db($database, Database::$connection);
    }
    static public function getConnection(){
        return self::$connection;
    }
    static public function query($query){
	//echo $query;
        $result = mysqli_query(self::$connection, $query);
        if(!$result)
            die($query.'<br />'.mysqli_error(self::$connection));
        return $result;
    }
    static public function insertID(){
        return mysqli_insert_id(self::$connection);
    }
    static public function real_escape_string($str){
        if(!Database::getConnection()){
            Database::connect(
            Globals::$databaseServer,
            Globals::$databaseUserName,
            Globals::$databasePassword,
            Globals::$databaseName
        );
        }
        return mysql_real_escape_string($str);
    }
}

?>