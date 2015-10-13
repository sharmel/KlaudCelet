<?php
class DBClass {

    private static $DB_CONNECTIONSTRING ='providers';
    private static $DB_HOST ='localhost:8889';
    //'sqlite:/Applications/MAMP/htdocs/Thesis_Project/db/providers.db';
    private static $DB_USERNAME = 'root';
    private static $DB_PASSWORD = 'root';

    private static $db = null;

    protected static function connect() {
        self::$db = new PDO('mysql:host=' . self::$DB_HOST . ';dbname=' . self::$DB_CONNECTIONSTRING, self::$DB_USERNAME, self::$DB_PASSWORD);
            
            //self::$DB_CONNECTIONSTRING, self::$DB_USERNAME, self::$DB_PASSWORD);
    }

     public static function execute($sql, $values = array()) {
        if (self::$db === null) {
            self::connect();
        }
        $statement = self::$db->prepare($sql);
        $statement->execute($values);
            
        return $statement;
    }

    public static function query($sql, $values = array()) {
        $statement = self::execute($sql, $values);
        return $statement->fetchAll(PDO::FETCH_CLASS);

    
    }

}