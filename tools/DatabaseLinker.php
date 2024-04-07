<?php 

class DatabaseLinker{

	private static $URL = 'mysql:host=localhost; dbname=dtblocation; charset=utf8';
    private static $username = 'root';
    private static $password = '';
    private static $dtb;


    //Fonction getConnexion
    static function getConnexion() {
        if (DatabaseLinker::$dtb == NULL)
            DatabaseLinker::$dtb = new PDO(DatabaseLinker::$URL, DatabaseLinker::$username, DatabaseLinker::$password);
        return DatabaseLinker::$dtb;
    }
}